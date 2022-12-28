<?php

/**
 * database connection
 */
class Database
{
    private function connect() 
    {
        $string = DBDRIVER . ":host=" .DBHOST. ";dbname=" .DBNAME;
        if (!$con = new PDO($string,DBUSER,DBPASS)) {
           die("Database could not connect");
        }
        return $con;
    }

    public function query($query,$data = array(),$data_type = "object")
    {
        $con = $this->connect();
        $stmt = $con->prepare($query);
        if ($stmt) 
        {
            $check = $stmt->execute($data);
            if ($check) 
            {
               if ($data_type == "object") 
               {
                $data =  $stmt->fetchAll(PDO::FETCH_OBJ);
               }else {
                $data =  $stmt->fetchAll(PDO::FETCH_ASSOC);
               }

               if (is_array($data) && count($data) > 0) 
               {
                return $data;
               }
    
            }
        }
       return false;
    }

}
