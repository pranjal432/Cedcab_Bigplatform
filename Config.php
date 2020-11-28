<?php

    class Config {

        private $siteurl="http://localhost/training/MIS%20Application/Cedcab/";

        private $dbhost;
        private $dbuser;
        private $dbpass;
        private $dbname;
        public $con;

        function __construct($dbhost,$dbuser,$dbpass,$dbname) {

            $this->con=new mysqli($dbhost, $dbuser, $dbpass, $dbname);
            if ($this->con->connect_error) {

                die("Connection Failed: ".$this->con->connect_error);
            }
            else
            {
                //echo "connnnnnnnneeecteddd";
            }

        }

    }

    

    






?>