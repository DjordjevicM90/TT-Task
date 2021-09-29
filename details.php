<?php
    require_once("function.php");
    include_once("_header.php");
    require_once("classPHP/classBase.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src = "JavaScript/jquery-3.6.0.js"></script>    
    <script src = "JavaScript/config.js"></script>          

    <link href = "css/style.css" rel="stylesheet" >         
    <title>Details Page</title>
</head>
<body>

<?php                                               /* DETAILS PAGE SHOWS DETAILS FOR SPECIFIC CURRENCY */
if(isset($_GET['id']))
    {
        $symbolDetails = $_GET['id'];               /* Currency name */

        require_once("classPHP/guzzle.php");        /* Using API from bitfinex documentation to get data for the specific currency pair */

        echo "<table>";                             

            echo "<tr>";                            

                echo "<th>Name</th>";
                echo "<th>Last Price</th>"; 
                echo "<th>High</th>"; 
                echo "<th>Low</th>";    
                
            echo "</tr>";                           

            echo "<tr>";                            

                echo "<td>".strtoupper($symbolDetails)."</td>";                 /* Symbol name */
                echo "<td>".$specific->last_price."</td>";                      /* Last Price */
                echo "<td>".$specific->high."</td>";                            /* Daily High */
                echo "<td>".$specific->low."</td>";                             /* Daily Low */

            echo "</tr>";                           

        echo "</table>";                            

        if(login())                                 /* If user login then show ADD or REMOVE button */
        {
            try{
                $db = new DB();                     /* Connection DB */

                $table = "favorites";
                $column = "symbol_name";

                $symbolName = null;

                $row = $db->select($table, $column, $symbolDetails);    /* Check if user has favorite currency in DB */
               
                foreach($row as $obj)
                {
                    $symbolName = $obj->symbol_name;
                }
                
                if($symbolName !== null)        /* If user has specific currency as favorite, then show remove button */
                {
                    echo "<button type='button' id='btn-remove' data-symbol='".$symbolDetails."'>Remove to favorites</button>";
                }
                else                            /* If user has not specific currency as favorite, then show add button */
                {
                    echo "<button type='button' id='btn-add' data-symbol='".$symbolDetails."'>Add to favorites</button>";
                    
                }

            }catch(Exception $e){
                echo $e->getMessage();
            }
        }

    }
    
?>
    <div id="answer-details"></div>         <!-- Message query error  -->
</body>
</html>