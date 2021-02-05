<?php
/**
 * Created by A. Goldani (Galiold)
 * Date: 2/4/2021
 */

include 'user.class.php';

class Message
{
    public $sender_id;
    public $receiver_id;
    public $content;

    public function __construct($sender_id, $receiver_id, $content)
    {
        $this->sender_id = $sender_id;
        $this->receiver_id = $receiver_id;
        $this->content = $content;
    }
}

class MsgDelivery
{
    public static function getRecipients($user_id)
    {
        $query = "SELECT * from persons where PersonID in (
            select to_user
            from friend_requests fr inner join persons p on fr.from_user = p.PersonID
            where p.PersonID = ? and fr.status = 1
            union
            select from_user
            from friend_requests fr inner join persons p on fr.to_user = p.PersonID
            where p.PersonID = ? and fr.status = 1)";

        $mysql = pdodb::getInstance();
        $mysql->Prepare($query);
        $result = $mysql->ExecuteStatement(array($user_id, $user_id));

        $recipients = [];
        while ($row = $result->fetch()) {
            array_push($recipients, new user($row['PersonID'], null, $row['pfname'], $row['plname'], null, null));
        }

        return $recipients;
    }

    public static function getMessages($sender, $receiver)
    {
        $query = "select m.* from messages m where (m.sender = ? and m.receiver = ?) or (m.sender = ? and m.receiver = ?) order by m.sent_at";

        $mysql = pdodb::getInstance();
        $mysql->Prepare($query);
        $result = $mysql->ExecuteStatement(array($sender, $receiver, $receiver, $sender));

        $messages = [];
        while ($row = $result->fetch()) {
            array_push($messages, new Message($row['sender'], $row['receiver'], $row['content']));
        }

        return $messages;
    }

    public static function sendMessages($sender, $receiver, $content)
    {
        $query = "insert into messages(sender, receiver, content) values (?, ?, ?)";

        $mysql = pdodb::getInstance();
        $mysql->Prepare($query);
        $mysql->ExecuteStatement(array($sender, $receiver, $content));

    }
}