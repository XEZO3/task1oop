<?php
class db{
  
    private static function connect(){
        $dsn = "mysql:host =localhost;dbname=task1";
        $con= new PDO ($dsn,"root","");
       
        return $con;
    }
    static function sql($sql,$parm,$type,$whattoreturn){
        $query = self::connect()->prepare($sql);
        $query->execute($parm);
        //one value return
        if($type==1 && !empty($whattoreturn)){
            if($query->rowCount() > 0){
                $rows=$query->fetchAll(PDO::FETCH_ASSOC);
                    foreach($rows as $row){
                        $return = $row[$whattoreturn];
                        return $return;
                    }
                }
        }elseif($type==0){
            return $query;
        }
        
    }
}
?>