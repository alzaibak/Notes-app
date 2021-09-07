
<?php
session_start();
include('connection.php');

$missinginput = '<p><strong>The textarea should not be empty</strong></p>';

if(empty($_GET["notearea"])){
    $errors .= $missinginput; 
};

if($errors){
    $resultMessage = "<div class='alert alert-danger'>$errors</div>";
    echo $resultMessage;   
}else {
    //get user_id
$user_id = $_SESSION['id'];
//get the current time
$time = time();
$note = $_POST['notearea'];
$usernote = mysqli_real_escape_string($link, $note);
//run a query to create new note
$sql = "INSERT INTO notes (`user_id`, `note`, `time`) VALUES ($user_id, '$usernote', '$time')";
$result = mysqli_query($link, $sql);
if(!$result){
    echo 'error';
}else{
    //mysqli_insert_id returns the auto generated id used in the last query
    echo mysqli_insert_id($link);
       
}
}

?>