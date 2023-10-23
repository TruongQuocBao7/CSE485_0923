<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music For Life</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/homepage.css">
</head>

<body class="mx-5">
    
    <?php include('header.php'); ?>
    
    <div class="m-5">
        <div class="d-flex justify-content-center align-items-center">
            <div style="width:25rem; height:23.5rem">
                <form class="login rounded-2" action="post/post_forget_pass.php" method="post">

                    <div class="d-flex align-items-center header_menu justify-content-between">
                        <h4 class="text-white ms-3">Forget password</h4>
                        <div class="d-icon">
                            <img src="img/icons8-facebook-50.png" alt="" class="icon">
                            <img src="img/icons8-google-plus-squared-48.png" alt="" class="icon">
                            <img src="img/icons8-twitter-squared-30.png" alt="" class="icon">
                        </div>
                    </div>

                    <div class="p-3">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="bi bi-person-fill"></i>
                            </span>
                            <input type="text" class="form-control" placeholder="username or email" aria-label="username" aria-describedby="basic-addon1" name="username">
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="submit" class="btn btn-primary bg-warning text-dark border-0 px-4">
                                Check
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="card-footer text-center border-top border-3 border-dark mx-5">
        <span class="fs-5">TLU'S MUSIC GARDEN</span>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script>
    var element = document.getElementById('dangnhap');
    element.className = 'nav-link active';
</script>
</html>
