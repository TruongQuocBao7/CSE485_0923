<?php
require_once('../app/config/config.php');
require_once APP_ROOT.'app/controllers/HomeController.php';

$homecontroller = new HomeController();
$homecontroller->index(); // -> no load students tu cai nay nen trong view moi co bien' $students
// còn nếu ko có thì nó load thẳng view, như cái url: http://localhost/BTTH03/app/views/home/index.php
// thì khi load thẳng nó sẽ ko có biến nào là $students được truyền vào cả bởi $students phải truyền từ 
// controller, nên chỗ này nó mới gọi controller ra

// tóm lại là, nó gọi controller => load biến students => render view => $students có trong view
// ko load thì ko có
// render http://localhost/BTTH03/app/views/home/index.php => ko gọi controller 
// render http://localhost/BTTH03/public/ => gọi controller, là chính cái file đang viết đây này
// hieu ma oge
// lỗi xàm l :D
// mất thời gian vl bvưqoibqưobưqibơiqbưqibjwqbq=
// cũng hay =))) =))

