<?php
    class Db {
        public $con;
        private $servername = 'localhost';
        private $username = 'root';
        private $password = '';
        private $dbname = 'antelov';
      	
        private $servername_2 = 'sql310.epizy.com';
        private $username_2 = 'epiz_29175059';
        private $password_2 = 'vKPOB0mE0h';
        private $dbname_2 = 'epiz_29175059_giordins';

        public function con() {
            $server = $_SERVER['SERVER_NAME'];
            if($server == 'localhost') {
                $con = new mysqli(
                    $this->servername, 
                    $this->username, 
                    $this->password, 
                    $this->dbname
                );
            } else {
                $con = new mysqli(
                    $this->servername_2, 
                    $this->username_2, 
                    $this->password_2, 
                    $this->dbname_2
                );
            }
            // Check connection
            if ($con->connect_error) {
                die("Connection failed: " . $con->connect_error);
            }
            return $con;
        }
    }
?>