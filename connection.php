<?php
$link = mysqli_connect("localhost", "diphantc_alzaibak", "@Abod0933", "diphantc_Online-notes");
if(mysqli_connect_error()){
    die('ERROR: Unable to connect:' . mysqli_connect_error()); 
    echo "<script>window.alert('Hi!')</script>";
}
    ?>