<?php
    class DB{
        private $_pdo;
        private $_query;
        private $_error = false;
        private $_results;

        public function __construct()
        {
            try{
                $this->_pdo = new PDO ("mysql:host=localhost; dbname=bitfinex", "root", "");   /* Connection on bitfinex database */
            }catch(PDOException $e) {
                die($e->getMessage());
            }
        }

        public function query($sql, $params = array())        /* Query method */
        {
            $this->error = false;
            $this->_query = $this->_pdo->prepare($sql);
            if($this->_query) {
                $x=1;
                if(count($params)) {
                    foreach($params as $param){
                        $this->_query->bindValue($x, $param);
                        $x++;
                    }
                }
                
                if($this->_query->execute()){  
                                   
                    $this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
                    $this->_count = $this->_query->rowCount();
                } else{
                    $this->_error = true;
                }
            }
            return $this;
        }

        public function select($table, $column, $value)        /* Select method */
        {
            if($value !== null && $column !== null)
            {
                $sql = "SELECT * FROM $table WHERE $column = '$value'";  
            }
            else
            {
                $sql = "SELECT * FROM $table"; 
            }
            
            if(!$this->query($sql)->getError())
            {
                return $this->_results;       
            }  
            return false;
        }

        public function insert($table, $column, $value)         /* Insert method */
        {
            $sql = "INSERT INTO $table ($column) VALUES ('$value')";
            
            if(!$this->query($sql)->getError())
            {
                return true;       
            }  
            return false;
        }

        public function delete($table, $column, $value)         /* Delete method */
        {
            $sql = "DELETE FROM $table WHERE $column = '$value'";
            
            if(!$this->query($sql)->getError())
            {
                return true;       
            }  
            return false;
        }

        public function getError()                              /* getError method */
        {
            return $this->_error;
        }

    }
?>