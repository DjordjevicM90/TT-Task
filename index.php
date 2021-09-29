
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src = "JavaScript/jquery-3.6.0.js"></script>    
    <script src = "JavaScript/webSocket.js"></script>       
    <script src = "JavaScript/config.js"></script>          

    <link href = "css/style.css" rel="stylesheet" >         

    <title>WebSocket</title>

</head>
<body>

    <?php 

    $symbolDetails = null;
    require_once("classPHP/guzzle.php");
    require_once("function.php");
    include_once("_header.php");
    
    ?>       
    
    <table>                                     
            <tr>                                
                <th>Name</th>
                <th>Last</th>
                <th>Change</th>
                <th>Change Percent</th>
                <th>High</th>
                <th>Low</th>
            </tr>                               

<?php                                /* Create <tr> and <td> tags and fill them dynamically with data  */                 

    $n = 0;

    foreach($name as $data)        /* Run through first 5 currency pairs */    
    {
        if($n == 5) break;

        echo "<tr>";                /* Start row of table */

            echo "<td class = 'name'><a href = 'details.php?id=".$data."'>".strtoupper($data)."</a></td>"; /* If user click on currency name it will be redirect to details */
            echo "<td id = 'last$data'> </td>";                 /* Data form WebSocket - check file webSocket.js */
            echo "<td id = 'change$data'> </td>";               /* -||- */
            echo "<td id = 'change-per$data'> </td>";           /* -||- */
            echo "<td id = 'high$data'> </td>";                 /* -||- */
            echo "<td id = 'low$data'> </td>";                  /* -||- */

        echo "</tr>";               /* End of row  */

        $n++;
    }
?>                                  <!-- End of PHP tag -->

    </table>                        

    <div id = "answer"></div>       <!-- Message login error -->

    
</body>
</html>
