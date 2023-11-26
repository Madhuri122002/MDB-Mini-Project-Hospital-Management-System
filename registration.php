<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <?php
        if (isset($_POST["submit"])) 
        {
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $dob = $_POST["dob"];
        $address = $_POST["address"];
        $phone_no = $_POST["phone_no"];
        $email = $_POST["email"];
        $emergency_contact_name = $_POST["emergency_contact_name"];
        $emergency_contact_number = $_POST["emergency_contact_number"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $repeat_password = $_POST["repeat_password"];

        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        $errors = array();
           
        if (empty($first_name) OR empty($last_name) OR empty($dob) OR empty($phone_no) OR empty($email) OR empty($username) OR empty($username) OR empty($password) OR empty($repeat_password)) 
        {
            array_push($errors,"All fields are required");
           }
           if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "Email is not valid");
           }
           if (strlen($password)<8) {
            array_push($errors,"Password must be at least 8 charactes long");
           }
           if ($password!==$repeat_password) {
            array_push($errors,"Password does not match");
           }
           require_once "database.php";
           $sql = "SELECT * FROM patients WHERE email = '$email'";
           $result = mysqli_query($connect, $sql);
           $rowCount = mysqli_num_rows($result);
           if ($rowCount>0) {
            array_push($errors,"Email already exists!");
           }
           if (count($errors)>0) {
            foreach ($errors as  $error) {
                echo "<div class='alert alert-danger'>$error</div>";
            }
           }else{
            $sql = "INSERT INTO patients (First_Name,Last_Name,Date_of_Birth,Address,Phone_Number,Email,Emergency_Contact_Name,Emergency_Contact_Number,Username,Password) VALUES (? ,?, ?,?,?,?,?,?,?,?)";
            $stmt = mysqli_stmt_init($connect);
            $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
            if ($prepareStmt) {
                mysqli_stmt_bind_param($stmt,"ssssssssss",$first_name, $last_name, $dob,$address,$phone_no,$email,$emergency_contact_name,$emergency_contact_number,$username,$passwordHash);
                mysqli_stmt_execute($stmt);
                echo "<div class='alert alert-success'>You are registered successfully.</div>";
            }else{
                die("Something went wrong");
            }
           }
          

        }
        ?>
        <form action="registration.php" method="post">
        <div class="form-group">
                <input type="text" class="form-control" name="first_name" placeholder="First Name:">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="last_name" placeholder="Last Name:">
            </div>
            <div class="form-group">
                DOB:
                <input type="date" class="form-control" name="dob" placeholder="DOB:">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="address" placeholder="Address:">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="phone_no" placeholder="Phone Number:">
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email:">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="emergency_contact_name" placeholder="Emergency Contact Name:">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="emergency_contact_number" placeholder="Emergency Contact Number:">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="username" placeholder="User Name:">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password:">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="repeat_password" placeholder="Repeat_password:">
            </div>
            <div class="form-btn">
                <input type="submit" class="btn btn-primary" value="Register" name="submit">
            </div>
        </form>
        <div>
        <div><p>Already Registered <a href="login.php">Login Here</a></p></div>
      </div>
    </div>
</body>
</html>