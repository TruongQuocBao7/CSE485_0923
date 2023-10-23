<div class="main-content mt-3 vh-100">
    <div id="filter" class="d-flex align-items-end justify-content-between">
        <input type="text" placeholder="Email" style="width:200px;">
        <input type="text" placeholder="Phone" style="width:200px;">
        <select class="form-select" aria-label="Default select example" style="width:200px;">
            <option selected>Group</option>
            <option value="1">Female</option>
            <option value="2">Genderqueer</option>
            <option value="3">Male</option>
            <option value="3">Polygender</option>
            <option value="3">Bigender</option>
        </select>
        <button type="button" class="btn btn-primary">
            <i class="bi bi-search"></i>
            Filter
        </button>
        <button type="button" class="btn btn-outline-primary">
            Clear
        </button>
    </div>

    <div id="table" class="mt-5">
        <div class="d-flex justify-content-end">
            <button type="button" class=" btn mb-1 btn-outline-primary mx-5" id="delete">Delete</button>
            <button type="button" class=" btn mb-1 btn-primary" id="add">
                <a href="add-user.php">Add</a>
                
            </button>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault_0"></th>
                    <th></th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Group</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Date of Birth</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <?php
            include('connection.php');

            if (isset($_GET['key'])) {
                $key = $_GET['key'];
            } else {
                $key = 1;
            }
            $offset = ($key - 1) * 10;
            if ($key == 1) {
                $previous = $key;
                $next = $key + 1;
            } else if ($key == 3) {
                $previous = $key - 1;
                $next = $key;
            } else {
                $previous = $key - 1;
                $next = $key + 1;
            }
            $sql = "select * from users limit $offset, 10";
            $result = $conn->query($sql);
            ?>
            <tbody>
                <?php if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><input class="form-check-input" type="checkbox" value=""
                                    id="flexCheckDefault_<?php echo $row["id"] ?>"></td>
                            <td><img src=" <?php echo $row["img"] ?> " alt="" width="30px" height="30px"
                                    style="border-radius:50%"></td>
                            <td>
                                <?php echo $row["fullname"] ?>

                            </td>
                            <td>
                                <?php echo $row["email"] ?>
                            </td>
                            <td>
                                <?php echo $row["gender"] ?>
                            </td>
                            <td>
                                <?php echo $row["current_group"] ?>
                            </td>
                            <td>
                                <?php echo $row["mobiel"] ?>
                            </td>
                            <td>
                                <?php echo $row["birthday"] ?>
                            </td>
                            <td class="table-action">
                                <a href="view-details-user.php?id=<?php echo $row["id"] ?>"><i class="bi bi-pen-fill"></i></a>


                                <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-trash-fill"></i></a>
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                     <div class="modal-dialog">
                                        <div class="modal-content">
                                         <div class="modal-header">
                                         <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                         </div>
                                         <div class="modal-body">
                                            ...
                                         </div>
                                         <div class="modal-footer">
                                           <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                           <button type="button" class="btn btn-primary">Save changes</button>
                                         </div>
                                     </div>
                                     </div>
                                    </div>


                                    
                                <a href="view-details-user.php?id=<?php echo $row["id"] ?>"><i class="bi bi-eye-fill"></i></a>
                            </td>
                        </tr>
                        <?php
                    }
                }
                $conn->close();
                ?>
            </tbody>
        </table>

        <nav class="d-flex justify-content-end">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="index.php?key=<?php echo $previous ?>">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="index.php?key=1">1</a></li>
                <li class="page-item"><a class="page-link" href="index.php?key=2">2</a></li>
                <li class="page-item"><a class="page-link" href="index.php?key=3">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="index.php?key=<?php echo $next ?>">Next</a>
                </li>
            </ul>
        </nav>
    </div>
</div>