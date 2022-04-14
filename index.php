<!DOCTYPE html>
<html lang="en">
<head>
  <title>Crud</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<?php require_once 'process.php'; ?>
<div class="container">

<?php
 $mysqli = new mysqli('localhost','root','','crud') or die(mysqli_error($mysqli));
 $result = $mysqli->query("SELECT * FROM data");
?>
<div class = "row justify-content-center">
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>location</th>
                <th>image</th>
                <th colspan="2">Action</th>
            </tr>
</thead>
<?php  while($row = $result->fetch_assoc()): ?>
    <tr>
        <td><?php echo $row['name'] ?></td>
        <td><?php echo $row['location'] ?></td>
        <td><?php echo $row['image'] ?></td>
        <td>
            <a href="process.php?edit=<?php echo $row['id']; ?> "
            class ="btn btn-info">edit</a>
            <a href="process.php?delete=<?php echo $row['id']; ?> "
            class ="btn btn-danger">delete</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>

<div class="container-fluid">
    <div class="row justify-content-center">
  <form action="process.php" method="POST" enctype="multipart/form-data">
      <div class="form-group">
      <lable>Name</lable>
    <input type="text" name="name" class="form-control" value=" <?php echo $name; ?>" >
</div>
<div class="form-group">
   <lable>location</lable>
  <input type ="text" name="location" class="form-control" value=" <?php echo $location; ?>" >
</div>
       <input type="file" name="file"  class="form-control" >
<div class="form-group">
  <button type="submit" name="save">Save</button>
</div>
</div>
</div>
</div>
</form>
</body>
</html>