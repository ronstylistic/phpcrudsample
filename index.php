<?php include_once('header.php'); ?>
<?php include_once('database.php'); ?>
<?php
  
  $sql = "SELECT * FROM tbl_student";
  $result = $conn->query($sql);

?>
    <div class="container">

        <a href="create.php" class="btn btn-primary mt-3 mb-3">Create New</a>
        
    <table id="studentTable" class="table">
  <thead>
    <tr>
      <th>Firstname</th>
      <th>Middlename</th>
      <th>Lastname</th>
      <th>Address</th>
      <th>Age</th>
      <th>Gender</th>
      <th>Contact</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php if($result->num_rows > 0 ): ?>
    <?php while($row = $result->fetch_assoc()) : ?>
    <tr>
      <td><a href="edit.php?id=<?php echo $row["id"] ?>"><?php echo $row["firstname"] ?></a></td>
      <td><?php echo $row["middlename"] ?></td>
      <td><?php echo $row["lastname" ]?></td>
      <td><?php echo $row["address" ]?></td>
      <td><?php echo $row["age" ]?></td>
      <td><?php echo $row["gender" ]?></td>
      <td><?php echo $row["contact" ]?></td>
      <td><a href="delete.php?id=<?php echo $row["id"] ?>" class="btn btn-danger">Delete</a></td>
    </tr>
    <?php endwhile; ?>
    <?php endif; ?>
  </tbody>

  <tfoot>
            <tr>
                 <th>Firstname</th>
      <th>Middlename</th>
      <th>Lastname</th>
      <th>Address</th>
      <th>Age</th>
      <th>Gender</th>
      <th>Contact</th>
      <th>Action</th>
            </tr>
        </tfoot>
</table>

    </div>

<?php include_once('footer.php'); ?>
