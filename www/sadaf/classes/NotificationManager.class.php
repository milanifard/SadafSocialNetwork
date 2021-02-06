<?php
class notification
{
    public $id;
    public $text;
    public $timestamp;

    public function __construct($id, $text, $timestamp)
    {
        $this->id = $id;
        $this->text = $text;
        $this->$timestamp = $timestamp;
    }
}

class result2
{
    public $list;
    public $total_count;

    public function __construct($list, $total_count)
    {
        $this->list = $list;
        $this->total_count = $total_count;
    }
}


class notification_manager{
        public static function get_notifications($user_id, $items_count, $from_rec)
        {
            if (!is_numeric($items_count) && !is_numeric($from_rec)) {
                return null;
            }

            $query = "
            SELECT id, text, time FROM notifications where user_id = ? order by time desc
                    limit " . $items_count . " offset " . $from_rec;

            $mysql = pdodb::getInstance();
            $mysql->Prepare($query);
            $result = $mysql->ExecuteStatement(array($user_id));

            $notif_list = [];
            while ($row = $result->fetch()) {
                $notif = new notification($row["id"], $row["text"], $row["time"]);
                array_push($notif_list, $notif);
            }

            $result = $mysql->Execute("SELECT FOUND_ROWS() as count;");
            $count = intval($result->fetch()["count"]);

            return new result2($notif_list, $count);
        }
    }
?>