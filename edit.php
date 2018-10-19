<?php include_once('header.php'); ?>
<?php require_once('database.php'); ?>

<?php 
    
    $id = isset($_GET['id']) ? $_GET['id'] : "";
    
    if(isset($_POST['update'])){
        
        $firstname = $conn->real_escape_string($_POST['firstname']);
        $middlename = $conn->real_escape_string($_POST['middlename']);
        $lastname = $conn->real_escape_string($_POST['lastname']);
        $address = $conn->real_escape_string($_POST['address']);
        $age = $conn->real_escape_string($_POST['age']);
        $gender = $conn->real_escape_string($_POST['gender']);
        $contact = $conn->real_escape_string($_POST['contact']);

        $sql = "UPDATE tbl_student 
        SET firstname='$firstname', 
            middlename='$middlename', 
            lastname='$lastname', 
            address='$address', 
            age='$age', gender='$gender', contact='$contact' WHERE id='$id'";
        
        if( $conn->query($sql) === TRUE){
            $msg = "success";
        }
        else{
            $error =  "Error: " . $conn->error;
        }
    }

    if( !empty($id)){
        $sql = "SELECT * FROM tbl_student WHERE id='$id'";
        $result = $conn->query($sql);

        if( $result->num_rows > 0){
            $row = $result->fetch_assoc();
        }
        else{
            header('Location: index.php');
        }
    }

?>
    <div class="container">

        <div class="row">

            <div class="col-lg-12 col-md-12">

                <div class="card border-0">
                
                    <div class="card-body">
                
                        <h3 class="font-weight-bold">Update</h3>
                        <hr/>

                        <form action="edit.php?id=<?php echo $id ?>" method="post">

                            <?php if(isset($msg)): ?>
                                <div class="alert alert-success">You successfully saved.</div>
                            <?php endif; ?>

                            <?php if(isset($error)): ?>
                                <div class="alert alert-error"><?php echo $error; ?></div>
                            <?php endif; ?>

                            <div class="form-row mb-3">
                                <div class="col-4">
                                    <label for="firstname">Firstname</label>
                                    <input type="text" value="<?php echo $row["firstname"] ?>" class="form-control"  name="firstname" id="firstname" placeholder="Enter firstname" required>
                                </div>

                                <div class="col-4">
                                    <label for="middlename">Middlename</label>
                                    <input type="text" value="<?php echo $row["middlename"] ?>" class="form-control" name="middlename" id="middlename" placeholder="Enter middlename">
                                </div>

                                <div class="col-4">
                                    <label for="lastname">Lastname</label>
                                    <input type="text" value="<?php echo $row["lastname"] ?>" class="form-control" name="lastname" id="lastname" placeholder="Enter lastname" required>
                                </div>
                            </div>

                            <div class="form-row mb-3">
                                <div class="col-12">
                                    <label for="address">Address</label>
                                    <input type="text" value="<?php echo $row["address"] ?>" class="form-control"  name="address" id="address" placeholder="Enter address" required>
                                </div>
                            </div>
                            
                            <div class="form-row mb-5">
                                <div class="col-4">                               
                                    <label for="age">Age</label>
                                    <input type="text" value="<?php echo $row["age"] ?>" class="form-control" name="age" id="age" placeholder="Enter age" required>
                                </div>

                                <div class="col-4">
                                    <label for="gender">Gender</label>
                                    <select class="custom-select" name="gender" id="gender" required>
                                        <option selected>Choose...</option>
                                        <option <?php if($row["gender"] == 'Male') echo 'selected' ?> value="Male">Male</option>
                                        <option <?php if($row["gender"] == 'Female') echo 'selected' ?> value="Female">Female</option>
                                    </select>
                                </div>

                                <div class="col-4">
                                    <label for="contact">Contact</label>
                                    <input type="text" value="<?php echo $row["contact"] ?>" class="form-control" name="contact" id="contact" placeholder="Enter contact" required>
                                </div>

                            </div>

                            <hr/>
                            <button type="submit" name="update" class="btn btn-primary float-right">Update</button>
                            <a href="index.php" class="btn btn-light">Back</a>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>

<?php include_once('footer.php'); ?>
