<?php
    require_once("details.php");                                //From details.php get currency name ($symbolDetails)
    require_once("classBitfinex.php");
    require_once __DIR__ . "/../vendor/autoload.php";

    use GuzzleHttp\Client;                                      // Use Guzzle

    $webSocket = new Bitfinex(new Client);                      // Instance of Bitfinex class

    $symbols = "symbols";                                       // Parameter for request

    if($symbolDetails !== null)
    {
        $specificPair = "pubticker/$symbolDetails";             // Parameter for request 
        $specific = $webSocket -> getData($specificPair);       // Get data for specific currency pair

    }

    $name = $webSocket -> getData($symbols);                    // Get data for first 5 currency pairs


?>