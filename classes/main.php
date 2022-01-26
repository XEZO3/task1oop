<?php

class main{
    function __construct()
    {
        if(isset($_COOKIE['token']) &&!empty($_COOKIE['token'])){
           $query =db::sql("select * from users where token =?",array($_COOKIE['token']),1,"token");
           if($query ==null || empty($query)){
               setcookie("token","",time()-1);
            header("location:login.php");
            exit;
           }
        }else{
            setcookie("token","",time()-1);
            header("location:login.php");
            exit; 
        }
    }
}

?>