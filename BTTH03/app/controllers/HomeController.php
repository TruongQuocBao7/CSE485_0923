<?php
require_once APP_ROOT.'/app/services/studentService.php';
class HomeController{
    public function index(){
        //goi du lieu tu studentService
        $studentService = new studentService();
        $students = $studentService->getAllstudent();
        //render du lieu lay dc ra tu homepage
        include APP_ROOT.'/app/views/home/index.php';
    }
}