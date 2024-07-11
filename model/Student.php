<?php
    class Student {
        private $conn;

        public $id;
        public $HoTen;
        public $DiaChi;
        public $Email;

        public function __construct($db) {
            $this->conn = $db;
        }

        public function read(){
            $query = 'SELECT * FROM sinhvien';
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt;
        }

        public function get() {
            $query = 'SELECT * FROM sinhvien WHERE id = ? LIMIT 1';
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $this->id);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->HoTen = $row['HoTen'];
            $this->DiaChi = $row['DiaChi'];
            $this->Email = $row['Email'];
        }

        public function create() {
            $query = 'INSERT INTO sinhvien SET HoTen = :HoTen, DiaChi = :DiaChi, Email = :Email';
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':HoTen', $this->HoTen); // gán giá trị cho các tham số
            $stmt->bindParam(':DiaChi', $this->DiaChi);
            $stmt->bindParam(':Email', $this->Email);
            if ($stmt->execute()) {
                return true;
            }
            printf("Error: %s.\n", $stmt->error);
            return false;
        }

        public function update() {
            $query = 'UPDATE sinhvien SET HoTen = :HoTen, DiaChi = :DiaChi, Email = :Email WHERE id = :id';
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $this->id);
            $stmt->bindParam(':HoTen', $this->HoTen); // gán giá trị cho các tham số
            $stmt->bindParam(':DiaChi', $this->DiaChi);
            $stmt->bindParam(':Email', $this->Email);
            if ($stmt->execute()) {
                return true;
            }
            printf("Error: %s.\n", $stmt->error);
            return false;
        }
        
        public function delete() {
            $query = 'DELETE FROM sinhvien WHERE id = :id';
            $stmt = $this->conn->prepare($query);
           $stmt->bindParam(':id', $this->id);
            if ($stmt->execute()) {
                return true;
            }
            printf("Error: %s.\n", $stmt->error);
            return false;
        }
    }
?>