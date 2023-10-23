<?php
require_once('../app/config/config.php');
require_once APP_ROOT . 'app/models/student.php';

class studentService
{
    public function getAllStudent()
    {
        //Ket noi SQL
        try {
            $conn = new PDO("mysql:host=localhost;dbname=quanlysinhvien", "root", "123");
            $sql = "SELECT * FROM sinhvien";
            $stmt = $conn->query($sql);
            //xy ly kq
            $students = [];

            while ($row = $stmt->fetch()) {
                $student = new Student($row['ID'], $row['tenSinhvien'], $row['email'], $row['ngaySinh'], $row['idLop']);
                $students[] = $student;
            }

            return $students;
        } catch (PDOException $e) {
            echo $e;
            return $students = [];
        }
    }
}