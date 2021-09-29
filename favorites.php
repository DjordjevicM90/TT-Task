
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src = "JavaScript/jquery-3.6.0.js"></script>
    <script src = "JavaScript/webSocket.js"></script>
    <script src = "JavaScript/config.js"></script>

    <title>Favorites Page</title>

</head>
<body>

    <table>     
        <tr>
            <th>Name</th>
            <th>Last</th>
            <th>Change</th>
            <th>Change Percent</th>
            <th>High</th>
            <th>Low</th>
        </tr>

<?php                                           /* FAVORITES PAGE SHOWS USER FAVORITES CURRENCY PAIRS  */

    $symbolDetails = null;
    require_once("classPHP/guzzle.php");
    require_once("classPHP/classBase.php");

    try{
        $db = new DB();                         /* Connection DB */

        $table = "favorites";
        $column = null;
        $value = null;
        
        $row = $db->select($table, $column, $value);    /* Select all from favorites table */

        }catch(Exception $e){
            echo $e->getMessage();
        }

        foreach($name as $data)                 /* Run through all currency name */  
        {
            
            foreach($row as $obj)               /* Run through all data from favorites table */  
            {
                if($data === strtolower($obj->symbol_name))     /* If any currency name form first 5 currency pairs equal to currency name from favorites table, then show that currency pair */
                {
                   echo "<tr>";

                        echo "<td class = 'name'><a href = 'details.php?id=".$data."'>".strtoupper($data)."</a></td>";
                        echo "<td id = 'last$data'> </td>";
                        echo "<td id = 'change$data'> </td>";
                        echo "<td id = 'change-per$data'> </td>";
                        echo "<td id = 'high$data'> </td>";
                        echo "<td id = 'low$data'> </td>";
            
                    echo "</tr>"; 
                }
            }
        }
      
?>
    </table>

</body>
</html>