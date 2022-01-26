<?php

class auth{
    public function token(){
        //Generate a random string.
         $token = openssl_random_pseudo_bytes(32);
 
 //Convert the binary data into hexadecimal representation.
             $token = bin2hex($token);
 
 //Print it out for example purposes.
             return $token;
    }
     function  login(){
        $token = $this->token();
        $username = $_POST['username'];
        $password = $_POST['password'];
        $query1 =db::sql("select * from users where username = ? and password = ?",array($username,$password),0,"");
        if($query1->rowCount() ==1){
            $rows=$query1->fetchAll(PDO::FETCH_ASSOC);
            foreach($rows as $row){
                
                $id = $row['id'];
               
            }
            $query2=db::sql("update users set token =? where id = ?",array($token,$id),0,"");
             setcookie("token",$token,time()+ ( 365 * 24 * 60 * 60)) ;
            header("location:index.php");
            exit;
            
        }
    }
    function signup(){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $query1 =db::sql("select * from users where username = ?  and email=?",array($username,$email),0,"");
        if($query1->rowCount() > 0){
            echo"username or email already used";
        }else{
        $query = db::sql("INSERT INTO `users`(`username`, `password`, `email`, `permession`, `token`) VALUES (?,?,?,0,'')",array($username,$password,$email),0,"");
       
            header("location:login.php");
            exit;
        
    }
    }
}

?>