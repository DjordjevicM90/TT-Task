<?php
  use GuzzleHttp\Client; 

    class Bitfinex
    {
        private $client;
        const BASE_URI = "https://api.bitfinex.com/v1/";
        const METHOD = "GET";

        public function __construct(Client $client)     
        {
            $this->client = $client;
        }
        
        public function getData($methodName)            // getData method 
        {

            try {
                // Request method - Send a request to:
                $request =  $this->client->request(self::METHOD, self::BASE_URI . $methodName);

            if ($request->getStatusCode() !== 200) {     // Check StatusCode
                throw new Exception("Error from Bitfinex API");
            }

            return json_decode($request->getBody());    // Return data as object

            } catch(Exception $e){
                return $e->getMessage();
            }

        }   // Еnd of getData method

    }       // End of Bitfinex class

?>