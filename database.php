<?php
$host_name="localhost";
$db_user="root";
$db_password="";
$db_name="hospital_db";
$connect=mysqli_connect($host_name,$db_user,$db_password,$db_name);
if(!$connect)
{
    die("Somethong went wrong!!!");
}
?>