<?php
if (isset($_POST["create"])) {
    include("../database.php");
    $date = mysqli_real_escape_string($connect, $_POST["date"]);
    $patient = mysqli_real_escape_string($connect, $_POST["patient_id"]);
    $doctor = mysqli_real_escape_string($connect, $_POST["doctor_id"]);
    $diagnosis = mysqli_real_escape_string($connect, $_POST["diagnosis"]);
    $treatement = mysqli_real_escape_string($connect, $_POST["treatement_plan"]);
    $medications = mysqli_real_escape_string($connect, $_POST["medication"]);
    $allergy = mysqli_real_escape_string($connect, $_POST["allergy"]);
    $sqlInsert = "INSERT INTO medical_records (Patient_ID, Doctor_id, Record_date, Diagnosis, Treatement_plan, Medications, Allergies) VALUES ('$patient','$doctor','$date','$diagnosis','$treatement', '$medications', '$allergy' )";
    if(mysqli_query($connect, $sqlInsert)){
        echo "Uploaded succesfully";
    }else{
        die("Data is not inserted!");
    }
}
?>