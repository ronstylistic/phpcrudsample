<?php include_once('header.php'); ?>
<?php require_once('database.php'); ?>

<?php 
    
    $id = isset($_GET['id']) ? $_GET['id'] : "";
    
    if(isset($_POST['delete'])){

        $sql = "DELETE FROM tbl_student WHERE id='$id'";

        if( $conn->query($sql) === TRUE){
             header('Location: index.php');
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

            <div class="col-lg-6 col-md-6">

                <div class="card border-0">
                
                    <div class="card-body">
                
                        <h3 class="font-weight-bold">Are you sure you want to delete?</h3>

                        <form action="delete.php?id=<?php echo $id ?>" method="post">
                        
                            <?php if(isset($error)): ?>
                                <div class="alert alert-error"><?php echo $error; ?></div>
                            <?php endif; ?>

                            <div class="form-group row">
                                <label for="firstname" class="col-lg-3 col-md-3 col-sm-3">Firstname</label>
                                <div class="col-sm-9">
                                   <p class="font-weight-bold"><?php echo $row["firstname"] ?></p>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="firstname" class="col-lg-3 col-md-3 col-sm-3">Middlename</label>
                                <div class="col-sm-9">
                                   <p class="font-weight-bold"><?php echo $row["middlename"] ?></p>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="firstname" class="col-lg-3 col-md-3 col-sm-3">Lastname</label>
                                <div class="col-sm-9">
                                   <p class="font-weight-bold"><?php echo $row["lastname"] ?></p>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="firstname" class="col-lg-3 col-md-3 col-sm-3">Address</label>
                                <div class="col-sm-9">
                                   <p class="font-weight-bold"><?php echo $row["address"] ?></p>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="firstname" class="col-lg-3 col-md-3 col-sm-3">Age</label>
                                <div class="col-sm-9">
                                   <p class="font-weight-bold"><?php echo $row["age"] ?></p>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="firstname" class="col-lg-3 col-md-3 col-sm-3">Gender</label>
                                <div class="col-sm-9">
                                   <p class="font-weight-bold"><?php echo $row["gender"] ?></p>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="firstname" class="col-lg-3 col-md-3 col-sm-3">Contact</label>
                                <div class="col-sm-9">
                                   <p class="font-weight-bold"><?php echo $row["contact"] ?></p>
                                </div>
                            </div>
                           
                            <button type="submit" name="delete" class="btn btn-danger">Confirm</button>

                            <a href="index.php" class="btn btn-light float-right">Back</a>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>

<?php include_once('footer.php'); ?>
