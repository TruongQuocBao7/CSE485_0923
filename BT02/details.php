<div class="details h-100 mt-5">
    <?php
    include('connection.php');
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }
    ?>
    <form method="post" class="h-100" id="detail-form" action="<?php echo "reset_save.php?id=" . $id ?>">
        <?php
        $sql = "select * from users where id = $id";
        $result = $conn->query($sql);
        if ($result) {
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                ?>
                <div id="img" class="mb-3" style="left:100px"><img src="<?php echo $row['img'] ?>" width="100%" height="100%">
                </div>
                <input type="text" class="detail-input" name="fullname" placeholder="Full name" style="top:300px; left:100px">
                <input type="text" class="detail-input" name="email" placeholder="Email" style="top:300px; right:200px">
                <input type="text" class="detail-input" name="gender" placeholder="Gender" style="top:400px; left:100px">
                <input type="text" class="detail-input" name="current_group" placeholder="Group" style="top:400px; right:200px">
                <input type="text" class="detail-input" name="mobiel" placeholder="Mobiel" style="top:500px; left:100px">
                <input type="text" class="detail-input" name="birthday" placeholder="Date of Birth"
                    style="top:500px; right:200px">
                <?php
                $fullname = $row['fullname'];
                $email = $row['email'];
                $gender = $row['gender'];
                $current_group = $row['current_group'];
                $mobiel = $row['mobiel'];
                $birthday = $row['birthday'];
                echo "<script type=\"text/javascript\">
                document.querySelector('input[name=\"fullname\"]').value = '$fullname';
                document.querySelector('input[name=\"email\"]').value = '$email';
                document.querySelector('input[name=\"gender\"]').value = '$gender';
                document.querySelector('input[name=\"current_group\"]').value = '$current_group';
                document.querySelector('input[name=\"mobiel\"]').value = '$mobiel';
                document.querySelector('input[name=\"birthday\"]').value = '$birthday';
                </script>";

            }
        } else {
            echo "Lỗi truy vấn: " . $conn->error;
        }
        $conn->close();
        ?>
        <button type="button" class=" btn mb-1 btn-outline-primary" id="reset" style="top:600px; right:300px" onclick="resetValue('<?php echo $fullname ?>',
            '<?php echo $email ?>', 
            '<?php echo $gender ?>', 
            '<?php echo $current_group ?>', 
            '<?php echo $mobiel ?>', 
            '<?php echo $birthday ?>')">Reset</button>

        <button type="submit" class=" btn mb-1 btn-primary" id="save" name="submit"
            style="top:600px; right:200px">Save</button>
    </form>
</div>