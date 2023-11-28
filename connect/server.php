<?php session_start();

    define("DB_host", "localhost");
    define("DB_user", "root");
    define("DB_pass", "");
    define("DB_name", "LazyFood");

    class DB_conn {

        public $dbconn;

        function __construct() {
            $conn = mysqli_connect(DB_host, DB_user, DB_pass, DB_name);
            $this->dbconn = $conn;
            
            if (!$conn) {
                echo "Connected Failed" . mysqli_connect_error();
            }
        }

    }

    $connDB = new DB_conn();