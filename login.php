<?php
    session_start();
    require_once("classPHP/classBase.php");
    require_once("function.php");

    $output['data'] = "";
    $output['error'] = "";
    
    try{

        $db = new DB();                 /* Connection DB */

        if(isset($_GET['login']))
        {

            $table = "user";
            $coulmn = "user_id";
            $id = 1;

            $row = $db->select($table, $coulmn, $id);       /* Get data from user table in bitfinex DB */

            if(!$row)
            {
                $output['error'] = "Data base error";
            }
            else
            {
                foreach($row as $obj)                       /* Run trough user data */
                {
                    $userId = $obj->user_id;
                    $userName = $obj->user_name;
                }

                createCookie($userId, $userName);           /* Create cookie for user and logged in forever */

                $output['data']="index.php";

            }
        }   

        echo JSON_encode($output, 256);                     

    }catch(Exception $e){
        echo $e->getMessage();
    }

?>