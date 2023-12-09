<?php require_once '../connect/server.php';

    class Menu_DB extends DB_conn {

        // Check Menu Name
        public function checkmenuname($name) {
            $sql = "SELECT * FROM Menu WHERE m_name = '$name'";
            $result = mysqli_query($this->dbconn, $sql);
            $nums = mysqli_num_rows($result);
            return $nums;
        }

        // Read Menu
        public function readmenu() {
            $sql = "SELECT * FROM Menu";
            $result = mysqli_query($this->dbconn, $sql);
            return $result;
        }

        // Read Menu Promotion ORDER 
        public function readmenupromotion() {
            $sql = "SELECT * FROM Menu ORDER BY m_promotion DESC";
            $result = mysqli_query($this->dbconn, $sql);
            return $result;
        }

        // Read Menu Type
        public function readmenutype($type, $page = 1, $recordsPerPage = 5) {

            // คำนวณหาจำนวนเรคคอร์ดทั้งหมด
            $totalRecordsQuery = "SELECT COUNT(*) as total FROM Menu WHERE m_type = '$type'";
            $totalRecordsResult = mysqli_query($this->dbconn, $totalRecordsQuery);
            $totalRecordsRow = mysqli_fetch_assoc($totalRecordsResult);
            $totalRecords = $totalRecordsRow['total'];
        
            // คำนวณหาจำนวนหน้า
            $totalPages = ceil($totalRecords / $recordsPerPage);
            // กำหนดจำนวนหน้าสูงสุด
            $page = max(1, min($page, $totalPages));
            // กำหนด offset
            $offset = ($page - 1) * $recordsPerPage;;
        
            $sql = "SELECT * FROM Menu WHERE m_type = '$type' LIMIT $offset, $recordsPerPage";
            $result = mysqli_query($this->dbconn, $sql);
        
            return [
                'result' => $result,
                'totalPages' => $totalPages,
            ];
        }
        
        // Read Menu
        public function readmenubyid($id) {
            $sql = "SELECT * FROM Menu WHERE m_id = '$id'";
            $result = mysqli_query($this->dbconn, $sql);
            return $result;
        }

        // Add Menu
        public function addmenu($name, $price, $type, $image, $promotion) {
            $sql = "INSERT INTO Menu (m_name, m_price, m_type, m_image, m_promotion) VALUES ('$name', '$price', '$type', '$image', '$promotion')";
            $result = mysqli_query($this->dbconn, $sql);
            return $result;
        }

        // Edit Menu
        public function editmenu($name, $price, $type, $image, $promotion, $id) {
            $sql = "UPDATE Menu SET m_name = '$name', m_price = '$price', m_type = '$type', m_image = '$image', m_promotion = '$promotion' WHERE m_id = '$id'";
            $result = mysqli_query($this->dbconn, $sql);
            return $result;
        }

        // Delete Menu
        public function deletemenu($id) {
            $sql = "DELETE FROM Menu WHERE m_id = '$id'";
            $result = mysqli_query($this->dbconn, $sql);
            return $result;
        }

        // Update Promotion
        public function updatepromotion($id, $promotion) {
            $sql = "UPDATE Menu SET m_promotion = '$promotion' WHERE m_id = '$id'";
            $result = mysqli_query($this->dbconn, $sql);
            return $result;
        }

        // -------------------------------------------------- Chart --------------------------------------------------

        // Read Menu Type
        public function readmenutypechart($type) {
            $sql = "SELECT * FROM Menu WHERE m_type = '$type'";
            $result = mysqli_query($this->dbconn, $sql);
            $nums = mysqli_num_rows($result);
            return $nums;
        }

        // Read Menu Type Average
        public function readmenutypechartaverage($type) {
            $sql = "SELECT AVG(m_price) as average FROM Menu WHERE m_type = '$type'";
            $result = mysqli_query($this->dbconn, $sql);
            $row = mysqli_fetch_assoc($result);
            $average = $row['average'];
            return $average;
        }

    }