<?php

if(!isset($con))
{
    $con = new mysqli("localhost", "root", "", "kadwa");
	if($con->connect_error)
    {
        die("Connection failed: ".$con->connect_error);
    }
}   