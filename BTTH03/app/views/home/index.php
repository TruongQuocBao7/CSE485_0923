<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sinh viên</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  </head>
<body>

<header class="bg-light-subtle w-80 mx-5 p-4 shadow">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <h3>Administration</h3>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="DOMAIN">Trang chủ</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?controller=home&action=index">Sinh viên</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/BTTH03/app/views/home/classList.php">Danh sách lớp</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
</header>
<div class="container">
        <h3>Danh sách sinh viên</h3>
        <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Tên sinh viên</th>
      <th scope="col">Email</th>
      <th scope="col">Ngày sinh</th>
      <th scope="col">ID lớp</th>
      <th scope="col">Chỉnh sửa</th>
      <th scope="col">Xóa</th>
    </tr>
  </thead>
  <tbody>
    <?php
        foreach($students as $student){
    ?>
    <tr>
      <th scope="row"><?=$student->getID(); ?></th>
      <td><?=$student->getTenSinhvien();?></td>
      <td><?=$student->getEmail();?></td>
      <td ><?=$student->getNgaySinh();?></td>
      <td ><?=$student->getIdLop();?></td>
      <td>
        <a class="fs-4 color-primary" href="http://localhost/BTTH03/admin/edit_song.php?admin=true&id=<?php echo $student->getId(); ?>">
            <i class="bi bi-journal-plus"></i>
            </a>
      </td>
      <td>
        <a class="fs-4 color-primary user-delete-link" href="" data-bs-toggle="modal" data-bs-target="#modal<?php echo $student->getId();?>">
          <i class="bi bi-trash-fill"></i>
        </a>
      </td>
        <div class="modal fade" id="modal<?php echo $student->getId();?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">DELETE User</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Bạn có chắc chắn muốn xóa sinh viên có id: <?php echo $student->getId();?>?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <a href="http://localhost/BTTH03/post/post_delete_song.php?admin=true&id=<?php echo $student->getId();?>"><button type="button" class="btn btn-primary">Yes</button></a>
                        </div>
                    </div>
                </div>
            </div>        
    </tr>
    <?php
        }
    ?>
  </tbody>
</table>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>