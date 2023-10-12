<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap -->
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<title>Create question</title>
<head>
    
</head>

<div class="container" style="background-color:WHITE">


<div id="target"></div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function () {
    $("#target").load("menu.html");
  });
</script>



<body>

<div id="login">
<h2 align ="center"> Create Question From Here!</h2>
<table border ="0" align="center">

<form action="createQuestion.php" method="POST">
  
    <tr>
      <td>Name:</td>
      <td><input type="text" name="name" required="required" class="form-control"><br></td>
    </tr>
    <tr>
      <td>Title:</td>
      <td><input type="text" name="title" required="required" class="form-control"><br></td>
    </tr>
    <tr>
      <td>Type:</td>
      <td>
        <select name="type" required="required" class="form-control" onchange="toggleInputVisibility()">
          <option value="radiogroup">Radiogroup</option>
          <option value="checkbox">Checkbox 2</option>
          <option value="text">Text</option>
          <option value="ranking">Ranking</option>
          <option value="boolean">Boolean</option>
          <option value="dropdown">Dropdown</option>
        </select>
      </td>
    </tr>
    <tr>
      <td>Required:</td>
      <td>
        <select name="is_required" required="required" class="form-control">
          <option value="true">True</option>
          <option value="false">False</option>
        </select>
      </td>
    </tr>
    <tr>
      <td>Flag:</td>
      <td><input type="text" name="flag" required="required" class="form-control"><br></td>
    </tr>
    <tr>
      <td>Description:</td>
      <td><input type="text" name="description" required="required" class="form-control"><br></td>
    </tr>
    <tr>
      <td>Group:</td>
      <td><input type="text" name="groupe" required="required" class="form-control"><br></td>
    </tr>
    <tr>
      <td>Category:</td>
      <td><input type="text" name="category" required="required" class="form-control"><br></td>
    </tr>
    <tr>
      <td>Visible If:</td>
      <td>
        <label for="input1">Question:</label>
        <input type="text" id="input1" name="visible" placeholder="Question to depends">
        <br><br>
        <label for="input2">Answer:</label>
        <input type="text" id="input2" name="visibleMessage" placeholder="Answer depends ">
      </td>
    </tr>
    <tr>
      <td>Show Other Button:</td>
      <td>
        <select name="show_other" required="required" class="form-control" id="showOtherSelect">
          <option value="true">True</option>
          <option value="false">False</option>
        </select>
      </td>
    </tr>
    <tr>
      <td></td>
      <td></br>
        <input type="SUBMIT" name="send" value="send" required="required" class="btn btn-success"><br>
      </td>
    </tr>
  
</form>

<script>
  function toggleInputVisibility() {
    var typeSelect = document.querySelector('select[name="type"]');
    var showOtherSelect = document.querySelector('#showOtherSelect');

    if ((typeSelect.value === 'text')||(typeSelect.value === 'boolean')) {
      showOtherSelect.value = 'false';
      showOtherSelect.disabled = true;
    } else {
      showOtherSelect.disabled = false;
    }
  }
</script>


<?php
if(isset($_REQUEST['send'])){

 $name=$_POST['name'];
 $title=$_POST['title'];
 $type=$_POST['type'];
 $is_required=$_POST['is_required'];
 $flag=$_POST['flag'];
 $description=$_POST['description'];
 $groupe=$_POST['groupe'];
 $category=$_POST['category'];

 $visible = $_POST['visible'];
 $visibleMessage = $_POST['visibleMessage'];
 $show_other = $_POST['show_other'];
 
 $visibility = '{' . $visible . '} = \'' . $visibleMessage . '\'';

$visibility1 = addslashes($visibility);
include 'connect.php';
$querry="INSERT INTO `question`(`name`, `title`, `type`,`is_required`,`flag`,`description`,`groupe`,`category`,`visible_if`,`show_other`) 
                      VALUES ('$name','$title','$type','$is_required','$flag','$description','$groupe','$category','$visibility1','$show_other')";
$result=$conn->query($querry);
if(!$result){
echo  mysqli_error($conn);
    exit;
}
else{
    if(($type == "text")||($type == "boolean")){
        $querry="INSERT INTO `choice`( `question_name`) 
        VALUES ('$name')";
        $result=$conn->query($querry);
        if(!$result){
        echo  mysqli_error($conn);
            exit;
        }
        else{
        echo "Querry run successifully";
        }
    }else{

        $encodedName = urlencode($name);
       // echo '<a href="addChoices.php?name=' . $encodedName . '">&nbspCreate choices</a><br>';
        header("Location:addChoices.php?name=" . $encodedName);
        exit;
        
        
    }

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