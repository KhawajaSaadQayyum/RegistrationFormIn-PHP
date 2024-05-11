<?php
include 'connect.php';


if(isset($_POST['signUp'])){
    $firstName = $_POST['fName'];
    $lastName = $_POST['lName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password=md5($password);

    $checkEmail= "SELECT * FROM users WHERE email='$email'";
    $result = $connect->query($checkEmail);
    if($result->num_rows > 0){
        echo"email alrady exist";
}
}
else{
    $insertQuery= " INSERT INTO users (firstName, lastName, email, password) VALUES ('$firstName',
    '$lastName', '$emai', '$password') ";
    if($connect->query($insertQuery)==true){
        header("location :index.php");
    }else{
        echo "erroe". $connect->error;
    }
}
if(isset($_POST["sigin"])){
    $email= $_POST["email"];
    $password= $_POST["password"]; 
    $password=md5($password);
    $sql= " SELECT * FROM users WHERE email= '$email' and password='$password'";
    $result = $connect->query($sql);
    if( $result-> num_rows>0){
        session_start();
        $rows=$result->fetch_assoc();
        $_SESSION["email"] = $rows["email"];
        header("location : homepage.php");
        exit();
    } 
    else{
        echo"Not found Incorrect Email or password";
    }
}

