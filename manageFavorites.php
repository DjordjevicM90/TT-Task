<?php

require_once("function.php");
require_once("classPHP/classBase.php");

$output['error'] = "";
$output['data'] = "";

if(isset($_GET['add-symbolName']))                /* Add currency pair in favorites page*/
{
    $table = "favorites";
    $column = "symbol_name";
    $symbolName = $_POST['symbolName'];

    try{

$db = new DB();                                                         /* Connection DB */

        $row = $db->insert($table, $column, $symbolName);               /* Insert currency name in favorites table */
        
        if(!$row)
        {
            $output['error'] = "Query error";
        }
        else $output['data'] = "details.php?id=$symbolName";             /* Redirect user on Details page (refresh the page) */
        
        
        echo JSON_encode($output, 256);

    }catch(Exception $e){
        echo $e->getMessage();
    }

}

if(isset($_GET['remove-symbolName']))             /* Remove currency pair form favorites page */
{
    $table = "favorites";
    $column = "symbol_name";
    $symbolName = $_POST['symbolName'];

    try{

        $db = new DB();

        $row = $db->delete($table, $column, $symbolName);       /* Delete currency name in favorites table */
        
        if(!$row)
        {
            $output['error'] = "Query error";
        }
        else $output['data'] = "details.php?id=$symbolName";    /* Redirect user on Details page (refresh the page) */
        
        
        echo JSON_encode($output, 256);

    }catch(Exception $e){
        echo $e->getMessage();
    }
}
?>