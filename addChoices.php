<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap -->
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<title>Add User From Here</title>
<head>

<div class="container" style="background-color:WHITE">
<?php
include 'menu.html';
?>

<body >

<div id="login">
<h2 align ="center"> Add Question Choises From Here!</h2>
<table border ="0" align="center">

<form action="addChoices.php" method="POST" >

<tr><td>
 Question name<br>
<td/>
<input type="text" name="question_name" required="required" class="form-control" value="<?php if(isset($_GET['name'])){echo $_GET['name'];}?>" readonly><br>
</td></tr>
<tr><td>
Name<br>
<td/>
<input type="text" name="name" required="required" class="form-control"><br>
</td></tr>

<tr><td>
<input type="SUBMIT" name="send" value="send"required="required" class="btn btn-success"><br>
</td></tr>
</table>
</form>

<?php
if(isset($_REQUEST['send'])){

 $question_name=$_POST['question_name'];
 $name=$_POST['name'];

include 'connect.php';
$querry="INSERT INTO `choice`( `question_name`, `choice_name`) 
                      VALUES ('$question_name','$name')";
$result=$conn->query($querry);
if(!$result){
echo  mysqli_error($conn);
    exit;
}
else{
echo "Querry run successifully";
header( 'Location:questionsAndChoices.php' ) ;
}

    mysqli_close($conn);
}
?>
<?php

?>
</div>
<div id="footer">

</div>
</div>
</body>
</html>

<?php

?>