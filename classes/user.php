<?php

class user{
    public $userid;
    public $per;
    public $username;
    function __construct()
    {
        $this->userid=db::sql("select * from users where token = ?",array($_COOKIE['token']),1,"id");
        $this->per=db::sql("select * from users where token = ?",array($_COOKIE['token']),1,"permession");
        $this->username=db::sql("select * from users where token = ?",array($_COOKIE['token']),1,"username");
    }

}


?>