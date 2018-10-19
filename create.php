<?php include_once('header.php'); ?>
<?php require_once('database.php'); ?>

<?php 
    if(isset($_POST['create_new'])){
        
        $firstname = $conn->real_escape_string($_POST['firstname']);
        $middlename = $conn->real_escape_string($_POST['middlename']);
        $lastname = $conn->real_escape_string($_POST['lastname']);
        $address = $conn->real_escape_string($_POST['address']);
        $age = $conn->real_escape_string($_POST['age']);
        $gender = $conn->real_escape_string($_POST['gender']);
        $contact = $conn->real_escape_string($_POST['contact']);

        $sql = "INSERT INTO tbl_student(firstname, middlename, lastname, address, age, gender, contact) VALUES('$firstname', '$middlename', '$lastname', '$address', '$age', '$gender', '$contact')";

        if( $conn->query($sql) === TRUE){
            $msg = "success";
        }
        else{
            $error =  "Error: " . $conn->error;
        }
    }
?>
    <div class="container">

        <div class="row">

            <div class="col-lg-12 col-md-12">

                <div class="card border-0">
                
                    <div class="card-body">
                
                        <h3 class="font-weight-bold">Create New</h3>
                        <hr/>

                        <form action="create.php" method="post">

                            <?php if(isset($msg)): ?>
                                <div class="alert alert-success">You successfully saved.</div>
                            <?php endif; ?>

                            <?php if(isset($error)): ?>
                                <div class="alert alert-error"><?php echo $error; ?></div>
                            <?php endif; ?>

                            <div class="form-row mb-3">
                                <div class="col-4">
                                    <label for="firstname">Firstname</label>
                                    <input type="text" class="form-control"  name="firstname" id="firstname" placeholder="Enter firstname" required>
                                </div>

                                <div class="col-4">
                                    <label for="middlename">Middlename</label>
                                    <input type="text" class="form-control" name="middlename" id="middlename" placeholder="Enter middlename">
                                </div>

                                <div class="col-4">
                                    <label for="lastname">Lastname</label>
                                    <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Enter lastname" required>
                                </div>
                            </div>

                            <div class="form-row mb-3">
                                <div class="col-12">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control"  name="address" id="address" placeholder="Enter address" required>
                                </div>
                            </div>

                            <div class="form-row mb-5">
                                <div class="col-4">                               
                                    <label for="age">Age</label>
                                    <input type="text" class="form-control" name="age" id="age" placeholder="Enter age" required>
                                </div>

                                <div class="col-4">
                                    <label for="gender">Gender</label>
                                    <select class="custom-select" name="gender" id="gender" required>
                                        <option selected>Choose...</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>

                                <div class="col-4">
                                    <label for="contact">Contact</label>
                                    <input type="text" class="form-control" name="contact" id="contact" placeholder="Enter contact" required>
                                </div>
                            </div>

                            <hr/>
                            <button type="submit" name="create_new" class="btn btn-primary float-right">Submit</button>

                            <a href="index.php" class="btn btn-light">Back</a>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>

<?php include_once('footer.php'); ?>
