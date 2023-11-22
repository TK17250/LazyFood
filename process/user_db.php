<?php require_once '../connect/server.php';

    class User_DB extends DB_conn {

        // Check email
        public function checkemail($email) {
            $sql = "SELECT * FROM User WHERE u_email = '$email'";
            $result = mysqli_query($this->dbconn, $sql);
            $nums = mysqli_num_rows($result);
            return $nums;
        }

        // Check User
        public function checkusername($username) {
            $sql = "SELECT * FROM User WHERE u_username = '$username'";
            $result = mysqli_query($this->dbconn, $sql);
            $nums = mysqli_num_rows($result);
            return $nums;
        }

        // Register
        public function registerfunc($fname, $username, $email, $password, $rank) {
            $sql = "INSERT INTO User (u_fname, u_username, u_email, u_pass, u_rank) VALUES 
            ('$fname', '$username', '$email', '$password', '$rank')";
            $result = mysqli_query($this->dbconn, $sql);
            return $result;
        }

    }