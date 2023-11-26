<?php
session_start();
$user=$_SESSION['USER'];
if (isset($_POST["create"])) {
    include("../database.php");
    $date = mysqli_real_escape_string($connect, $_POST["date"]);
    $time = mysqli_real_escape_string($connect, $_POST["time"]);
    $app_for = mysqli_real_escape_string($connect, $_POST["app_for"]);
    $sql = "SELECT * FROM doctors WHERE Specialization = '$app_for'";
    $result = mysqli_query($connect, $sql);
    $doctor = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $doctor_id=$doctor['Doctor_ID'];
    $doctor_name=$doctor['First_name']." ".$doctor['Last_name']." ".$doctor['Qualifications'];
    $sqlInsert = "INSERT INTO appointments (Patient_ID, Doctor_id, Doctor, Appointment_Date, Appointment_time,Appointment_for) VALUES ('$user','$doctor_id','$doctor_name','$date', '$time', '$app_for' )";
    if(mysqli_query($connect, $sqlInsert)){
        header("Location:index.php");
    }else{
        die("Data is not inserted!");
    }
}
?>