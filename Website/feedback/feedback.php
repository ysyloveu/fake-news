<?php
ob_start();
require 'config.php';

$regexEmail = "/^([a-zA-Z\d\._]+@[a-zA-Z\d\._]+\.[a-zA-Z\d\.]{2,}+|)$/";
$regexNum = "/^([\d\s+]{8,15}|)$/";
$regexName = "/^([a-zA-Z\s]+|)$/";

function e($string){
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}

if(isset($_POST['submit'])){
    if((preg_match($regexEmail,$_POST['email'])) && (preg_match($regexNum,$_POST['num'])) && (preg_match($regexName,$_POST['name']))) {
        $view = $_POST['view'];
        $name = $_POST['name'];
        $num = $_POST['num'];
        $email = $_POST['email'];
        $comments = $_POST['comments'];
        $newComments = e($comments);
        
        $query = mysqli_query($con, "INSERT INTO `poll`(`id`, `name`, `email`, `phone`, `feedback`, `suggestions`) VALUES ('','$name','$email','$num','$view','$newComments')");
        echo '<script>alert("Thank You..! Your Feedback is Valuable to Us"); location.replace(document.referrer);</script>';
        
    }else {
        echo '<script>alert("Wrong Name/Email/Number Format! Submit Feedback Again!"); location.replace(document.referrer);</script>';
    }
}

?>