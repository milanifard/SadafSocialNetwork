<?php

class user
{
    public $id;
    public $username;
    public $name;
    public $lastName;
    public $email;
    public $friend_status;

    public function __construct($id, $username, $name, $lastName, $email, $friend_status)
    {
        $this->id = $id;
        $this->username = $username;
        $this->name = $name;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->friend_status = $friend_status;
    }
}

class search_result
{
    public $list;
    public $total_count;

    public function __construct($list, $total_count)
    {
        $this->list = $list;
        $this->total_count = $total_count;
    }
}

class manage_users
{
    public static function search_by_username($username, $user_id, $items_count, $from_rec)
    {
        if (!is_numeric($items_count) && !is_numeric($from_rec)) {
            return null;
        }

        $query = "
            select SQL_CALC_FOUND_ROWS s.*, f.status
            from (
                 select @rownum := @rownum + 1 as row, ss.* from (
                    select * from users where users.username = ?
                    union
                    select * from users where users.username like ?
                    union
                    select * from users where users.username like ?
                    ) ss
                ) s
                left join
                (
                    select to_user, status from friend_requests where from_user = ?
                ) f 
                    on s.id = f.to_user
                    where s.id != ?
                    order by s.row desc
                    limit " . $items_count . " offset " . $from_rec;

        $mysql = pdodb::getInstance();
        $mysql->Prepare($query);
        $result = $mysql->ExecuteStatement(array($username, $username."%", "%".$username."%", $user_id, $user_id));

        $user_list = [];
        while ($row = $result->fetch()) {
            $friend_status = -1;
            if (is_numeric($row["status"])) {
                $friend_status = $row["status"];
            }

            $user = new user($row["id"], $row["username"], $row["fname"], $row["lname"], $row["email"], $friend_status);
            array_push($user_list, $user);
        }

        $result = $mysql->Execute("SELECT FOUND_ROWS() as count;");
        $count = intval($result->fetch()["count"]);

        return new search_result($user_list, $count);
    }
}
