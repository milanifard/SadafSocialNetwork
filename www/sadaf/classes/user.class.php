<?php

class user
{
    public $id;
    public $username;
    public $name;
    public $lastName;
    public $email;
    public $friend_status;
    public $bio;
    public $image;

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

class profile
{
    public $id;
    public $username;
    public $name;
    public $lastName;
    public $email;
    public $bio;
    public $image;

    public function __construct($id, $username, $name, $lastName, $email, $bio, $image)
    {
        $this->id = $id;
        $this->username = $username;
        $this->name = $name;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->bio = $bio;
        $this->image = $image;
    }
}

class result
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
                                                                         (select * from (select p.PersonID as id, pfname as fname, plname as lname, AccountSpecs.UserID as username, email from AccountSpecs inner join persons p on AccountSpecs.PersonID = p.PersonID left join users us on us.id = p.PersonID) as u where u.username = ?) 
                                                                         union
                                                                         (select * from (select p.PersonID as id, pfname as fname, plname as lname, AccountSpecs.UserID as username, email from AccountSpecs inner join persons p on AccountSpecs.PersonID = p.PersonID left join users us on us.id = p.PersonID) as u where u.username like ?)
                                                                         union
                                                                         (select * from (select p.PersonID as id, pfname as fname, plname as lname, AccountSpecs.UserID as username, email from AccountSpecs inner join persons p on AccountSpecs.PersonID = p.PersonID left join users us on us.id = p.PersonID) as u where u.username like ?)
                                                                     ) ss
                 ) s
                     left join
                 (
                     select to_user, status from friend_requests where from_user = ?
                 ) f
                 on s.id = f.to_user
            where s.id != ?
            order by lname asc 
                    limit " . $items_count . " offset " . $from_rec;

        $mysql = pdodb::getInstance();
        $mysql->Prepare($query);
        $result = $mysql->ExecuteStatement(array($username, $username . "%", "%" . $username . "%", $user_id, $user_id));

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

        return new result($user_list, $count);
    }

    public static function get_events($user_id, $items_count, $from_rec)
    {
        if (!is_numeric($items_count) && !is_numeric($from_rec)) {
            return null;
        }

        $query = "
            select SQL_CALC_FOUND_ROWS f.id as id, status, CONCAT(pfname, ' ', plname) as name
            from ((select * from friend_requests inner join persons p on PersonID = from_user
            where friend_requests.status = 0 and to_user = ?) union (select * from friend_requests inner join persons p on PersonID = to_user
            where friend_requests.status = 1 and from_user = ?)) as f order by last_update desc
                    limit " . $items_count . " offset " . $from_rec;

        $mysql = pdodb::getInstance();
        $mysql->Prepare($query);
        $result = $mysql->ExecuteStatement(array($user_id, $user_id));

        $req_list = [];
        while ($row = $result->fetch()) {
            $req = new friend_request_event($row["id"], $row["name"], $row["status"]);
            array_push($req_list, $req);
        }

        $result = $mysql->Execute("SELECT FOUND_ROWS() as count;");
        $count = intval($result->fetch()["count"]);

        return new result($req_list, $count);
    }

    public static function get_user_data($user_id)
    {
        $query = "select u.*, email, bio, TO_BASE64(image) as image
                  from (select AccountSpecs.PersonID as id, UserID, pfname as fname, plname as lname
                  from AccountSpecs
                  inner join persons p on AccountSpecs.PersonID = p.PersonID) u
                  left join users on u.id = users.id
                  where u.id = ?";

        $mysql = pdodb::getInstance();
        $mysql->Prepare($query);
        $result = $mysql->ExecuteStatement(array($user_id));
        $row = $result->fetch();
        return new profile($row['id'], $row['UserID'], $row['fname'], $row['lname'], $row['email'], $row['bio'], $row['image']);
    }

    public static function set_propic($user_id, $img)
    {

        $query = "UPDATE users SET image = FROM_BASE64(?) WHERE id = ?";

        $mysql = pdodb::getInstance();
        $mysql->Prepare($query);
        $result = $mysql->ExecuteStatement(array($img, $user_id));
        return 1;
    }

    public static function get_friends($user_id){
        $query = "select UserID as username
                  from AccountSpecs
                  where AccountSpecs.PersonID in (select to_user from friend_requests where from_user = ? and status = 1)";
        $mysql = pdodb::getInstance();
        $mysql->Prepare($query);
        $result = $mysql->ExecuteStatement(array($user_id));
        $req_list = [];
        while ($row = $result->fetch()) {
            array_push($req_list, $row['username']);
        }

        $result = $mysql->Execute("SELECT FOUND_ROWS() as count;");
        $count = intval($result->fetch()["count"]);
        return new result($req_list, $count);
    }
}
