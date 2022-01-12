<?php

session_start();
if(isset($_SESSION['email']))
{
        $email=$_SESSION['email'];
        $id=$_SESSION['id'];
        $username=$_SESSION['username'];
}
else
    {
        include('basic.php');
        switchto("index.php");
    }



?>