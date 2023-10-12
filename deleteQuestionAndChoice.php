<?php

$id=" ";
include 'connect.php';
if(isset($_GET['name'])){
$name=$_GET['name'];
}
$querry=" DELETE FROM `choice` WHERE   `question_name`='$name'";
$result=$conn->query($querry);
if(!$result){
echo  mysqli_error($conn);
    exit;
}else{

$querry=" DELETE FROM `question` WHERE   `name`='$name'";
$result=$conn->query($querry);
if(!$result){
echo  mysqli_error($conn);
    exit;
}else{
echo "Successifuly ";

header( 'Location:questionsAndChoices.php' ) ;


}

}
mysqli_close($conn);
?>