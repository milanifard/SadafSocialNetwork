<?php

class friend_request
{
    public $fromUser;
    public $toUser;
    public $status;

    public function __construct($fromUser, $toUser, $status)
    {
        $this->fromUser = $fromUser;
        $this->toUser = $toUser;
        $this->status = $status;
    }


}

class friend_request_event
{
    public $friendRequestId;
    public $fromName;

    public function __construct($friendRequestId, $fromName)
    {
        $this->friendRequestId = $friendRequestId;
        $this->fromName = $fromName;
    }
}

class manage_friend_request
{
    public static function add($fromUser, $toUser)
    {
        // check if no request has been submitted
        $query = "select id from friend_requests where from_user = ? and to_user = ?";

        $mysql = pdodb::getInstance();
        $mysql->Prepare($query);
        $result = $mysql->ExecuteStatement(array($fromUser, $toUser));

        if ($result->fetch()) {
            return;
        }

        // add request
        $query = "insert into friend_requests(from_user, to_user, status) values (?, ?, ?)";
        $mysql->Prepare($query);
        $mysql->ExecuteStatement(array($fromUser, $toUser, 0));
    }

    public static function remove($fromUser, $toUser) {
        $query = "delete from friend_requests where from_user = ? and to_user = ?";

        $mysql = pdodb::getInstance();
        $mysql->Prepare($query);
        $result = $mysql->ExecuteStatement(array($fromUser, $toUser));
    }
}