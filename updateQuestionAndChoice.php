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

<body style="background-color:#cdeeff">

<div id="login">
<h2 align ="center"> Create Question From Here!</h2>
<table border ="0" align="center">

<form action="updateQuestionAndChoice.php" method="POST" >
<tr><td>
 NO :<br>
<td/>
<input type="text" name="row_counter" required="required" class="form-control" value="<?php if(isset($_GET['row_counter'])){echo $_GET['row_counter'];}?>"><br>
</td></tr>
<tr><td>
 Name :<br>
<td/>
<input type="text" name="name" required="required" class="form-control" value="<?php if(isset($_GET['name'])){echo $_GET['name'];}?>"><br>
</td></tr>
<tr><td>
 Title<br>
<td/>
<input type="text" name="title" required="required" class="form-control" value="<?php if(isset($_GET['title'])){echo $_GET['title'];}?>"><br>
</td></tr>
<tr><td>
Type<br>
<td/>
<input type="text" name="type" required="required" class="form-control" value="<?php if(isset($_GET['type'])){echo $_GET['type'];}?>"><br>
</td></tr>

<tr><td>
Required<br>
<td/>
<input type="text" name="is_required" required="required" class="form-control" value="<?php if(isset($_GET['row_counter'])){echo $_GET['row_counter'];}?>"><br>
</td></tr>

<tr><td>
Flag<br>
<td/>
<input type="text" name="flag" required="required" class="form-control" value="<?php if(isset($_GET['row_counter'])){echo $_GET['row_counter'];}?>"><br>
</td></tr>
<tr><td>
Description<br>
<td/>
<input type="text" name="description" required="required" class="form-control" value="<?php if(isset($_GET['row_counter'])){echo $_GET['row_counter'];}?>"><br>
</td></tr>
<tr><td>
Group<br>
<td/>
<input type="text" name="groupe" required="required" class="form-control" value="<?php if(isset($_GET['row_counter'])){echo $_GET['row_counter'];}?>"><br>
</td></tr>
<tr><td>
Category<br>
<td/>
<input type="text" name="category" required="required" class="form-control" value="<?php if(isset($_GET['row_counter'])){echo $_GET['row_counter'];}?>"><br>
</td></tr>

<tr><td>
Choices<br>
<td/>
<input type="text" name="choice_name" required="required" class="form-control" value="<?php if(isset($_GET['choice_name'])){echo $_GET['choice_name'];}?>"><br>
</td></tr>

<tr><td>
<input type="SUBMIT" name="send" value="send"required="required" class="btn btn-success"><br>
</td></tr>
</table>
</form>

<?php
if(isset($_REQUEST['send'])){
 $row_counter=$_POST['row_counter'];
 $name=$_POST['name'];
 $title=$_POST['title'];
 $type=$_POST['type'];
 $is_required=$_POST['is_required'];
 $flag=$_POST['flag'];
 $description=$_POST['description'];
 $groupe=$_POST['groupe'];
 $category=$_POST['category'];
 $choice_name=$_POST['choice_name'];

include 'connect.php';
$querry="UPDATE `question` SET `title`='$title',`type`='$type',`is_required`='$is_required',`flag`='$flag',`description`='$description',`groupe`='$groupe',`category`='$category' WHERE row_counter='$row_counter'";

$result=$conn->query($querry);
if(!$result){
echo  mysqli_error($conn);
    exit;
}
else{
// echo "Querry run successifully";
// echo '<a href='."addChoices.php?name=$name".'>'.'&nbspCreate choices'.'</a><br>';


$querry="UPDATE `choice` SET `choice_name`='$choice_name'WHERE question_name='$name'";

$result=$conn->query($querry);
if(!$result){
echo  mysqli_error($conn);
    exit;
}
else{
echo "Querry run successifully";
// echo '<a href='."addChoices.php?name=$name".'>'.'&nbspCreate choices'.'</a><br>';

}

    //mysqli_close($conn);


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