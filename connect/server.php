<?php session_start();

    define("DB_host", "localhost");
    define("DB_user", "root");
    define("DB_pass", "");
    define("DB_name", "LazyFood");

    class DB_conn {

        public $conn;

        function __construct() {
            $conn = mysqli_connect(DB_host, DB_user, DB_pass, DB_name);
            
            if (!$conn) {
                echo "Connected Failed" . mysqli_connect_error();
            }
        }

    }

    $conn = new DB_conn();