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

        // Login
        public function loginfunc($username) {
            $sql = "SELECT * FROM User WHERE u_username = '$username'";
            $result = mysqli_query($this->dbconn, $sql);
            return $result;
        }

        // Read User Rank
        public function readuserrank($rank, $page = 1, $recordsPerPage = 10) {
            $username = $_SESSION['name'];
        
            // นับบันทึกทั้งหมด
            $totalRecordsQuery = "SELECT COUNT(*) as total FROM User WHERE u_rank = '$rank'";
            $totalRecordsResult = mysqli_query($this->dbconn, $totalRecordsQuery);
            $totalRecordsRow = mysqli_fetch_assoc($totalRecordsResult);
            $totalRecords = $totalRecordsRow['total'];
        
            // คำนวณจำนวนหน้าทั้งหมด
            $totalPages = ceil($totalRecords / $recordsPerPage);
        
            // Ensure $page is within valid range
            $page = max(1, min($page, $totalPages));
        
            // ตรวจสอบให้แน่ใจว่า $page อยู่ในช่วงที่ถูกต้อง
            $start = ($page - 1) * $recordsPerPage;
        
            // ดึงข้อมูลบันทึกสำหรับหน้าปัจจุบัน
            $sql = "SELECT * FROM User WHERE u_rank = '$rank' AND u_username != '$username' LIMIT $start, $recordsPerPage";
            $result = mysqli_query($this->dbconn, $sql);
        
            return [
                'result' => $result,
                'totalPages' => $totalPages
            ];
        }
        
        // Read User ID 
        public function readuserid($userid) {
            $sql = "SELECT * FROM User WHERE u_id = '$userid'";
            $result = mysqli_query($this->dbconn, $sql);
            return $result;
        }

        // Edit User
        public function edituser($fname, $username, $email, $rank, $userid) {
            $sql = "UPDATE User SET 
            u_fname = '$fname',
            u_username = '$username',
            u_email = '$email',
            u_rank = '$rank' WHERE u_id = '$userid'";
            $result = mysqli_query($this->dbconn, $sql);
            return $result;
        }

        // Delete User
        public function deleteuser($userid) {
            $sql = "DELETE FROM User WHERE u_id = '$userid'";
            $result = mysqli_query($this->dbconn, $sql);
            return $result;
        }

    }