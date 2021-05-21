<?php

//Check if there is no session
if(!isset($_SESSION["userID"]) || is_null($_SESSION["userID"]))
{
    echo "<script>window.location.href='index.php';</script>";
    exit();
}
else //Check if first time login
{
    $result = $con->query("SELECT firstLogIn FROM user_information WHERE user_ID='".$_SESSION["userID"]."'");
    $data = $result->fetch_assoc();
    if($data["firstLogIn"] == "YES")
    {
        echo "<script>window.location.href='firstlogin.php';</script>";
        exit();
    }
}
