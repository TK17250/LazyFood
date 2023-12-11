<?php

    class Client_DB extends DB_conn {

        // Read Menu
        public function readmenu() {
            $sql = "SELECT * FROM Menu";
            $result = mysqli_query($this->dbconn, $sql);
            return $result;
        }

        // Read Menu ID
        public function readmenuid($id) {
            $sql = "SELECT * FROM Menu WHERE m_id = '$id'";
            $result = mysqli_query($this->dbconn, $sql);
            return $result;
        }

        // Read Menu Type
        public function readmenutype($type) {
            $sql = "SELECT * FROM Menu WHERE m_type = '$type'";
            $result = mysqli_query($this->dbconn, $sql);
            return $result;
        }

        // Read Menu Type Count
        public function readmenutypecount($type) {
            $sql = "SELECT COUNT(*) FROM Menu WHERE m_type = '$type'";
            $result = mysqli_query($this->dbconn, $sql);
            $row = mysqli_fetch_array($result);
            return $row[0];
        }

        // Read Menu Promotion
        public function readmenupromotion() {
            $sql = "SELECT * FROM Menu WHERE m_promotion = '1'";
            $result = mysqli_query($this->dbconn, $sql);
            return $result;
        }

        // --------------------------------------------------------------------------------------------------------------------------------------------

        // Read Cart
        public function readcart() {
            $username = $_SESSION['name'];
            $sql = "SELECT * FROM Cart WHERE c_username = '$username'";
            $result = mysqli_query($this->dbconn, $sql);
            return $result;
        }

        // Read Cart ID
        public function readcartid($id) {
            $sql = "SELECT * FROM Cart WHERE c_id = '$id'";
            $result = mysqli_query($this->dbconn, $sql);
            return $result;
        }

        // Add to Cart
        private function addtocartprivate($menuid, $menuname, $menuquan) {
            $username = $_SESSION['name'];
            
            $readcart = "SELECT * FROM Cart WHERE c_username = '$username'";
            $resultcart = mysqli_query($this->dbconn, $readcart);
            
            while ($rowcart = mysqli_fetch_assoc($resultcart)) {
                if ($rowcart['c_menuname'] == $menuname) {
                    $newmenuquan = $rowcart['c_menuquan'] + $menuquan;
                    $sql = "UPDATE Cart SET c_menuquan = '$newmenuquan' WHERE c_username = '$username' AND c_menuid = '$menuid'";
                    $result = mysqli_query($this->dbconn, $sql);
                    return $result;
                    break;
                }
            }
            
            $sql = "INSERT INTO Cart (c_username, c_menuid, c_menuname, c_menuquan) VALUES ('$username', '$menuid', '$menuname', '$menuquan')";
            $result = mysqli_query($this->dbconn, $sql);
            return $result;
        }

        public function addtocart($menuid, $menuname, $menuquan) {
            return $this->addtocartprivate($menuid, $menuname, $menuquan);
        }

        // Delete Cart
        private function deletecartprivate($id) {
            $sql = "DELETE FROM Cart WHERE c_id = '$id'";
            $result = mysqli_query($this->dbconn, $sql);
            return $result;
        }

        public function deletecart($id) {
            return $this->deletecartprivate($id);
        }

    }