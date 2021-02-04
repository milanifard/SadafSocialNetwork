<?php
/**
 * Created by A. Goldani (Galiold)
 * Date: 2/4/2021
 */

include 'user.class.php';

class Message {
    public $sender_id;
    public $content;

    public function __construct($sender_id, $content) {
        $this->sender_id = $sender_id;
        $this->content = $content;
    }
}

class MsgDelivery
{
    public static function getRecipients($user_id)
    {
        $query = "SELECT * from users where id in (
            select to_user
            from friend_requests inner join users u on friend_requests.from_user = u.id
            where u.id = ? and status = 1
            union
            select from_user
            from friend_requests inner join users u on friend_requests.to_user = u.id
            where u.id = ? and status = 1)";

        $mysql = pdodb::getInstance();
        $mysql->Prepare($query);
        $result = $mysql->ExecuteStatement(array($user_id, $user_id));

        $recipients = [];
        while ($row = $result->fetch()) {
            array_push($recipients, new user($row['id'], $row['username'], $row['fname'], $row['lname'], $row['email'], null));
        }

        return $recipients;
    }

    public static function getConversation($sender, $receiver) {
        $query = "select m.* from messages m inner join conversations c on m.conv_id = c.id where c.sender = ? and c.receiver = ? order by m.sent_at";

        $mysql = pdodb::getInstance();
        $mysql->Prepare($query);
        $result = $mysql->ExecuteStatement(array($sender, $receiver));

        $messages = [];
        while ($row = $result->fetch()) {
            array_push($messages, new Message($row['sender'], $row['content']));
        }

        return $messages;
    }
}