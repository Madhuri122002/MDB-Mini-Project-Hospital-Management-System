<?php
include("templates/header.php");
?>
<body>
<div class="post w-100 bg-light p-5">
    <?php
    session_start();
    $user=$_SESSION['USER'];
    include("../database.php");
    $sqlSelectPost = "SELECT * FROM medical_records WHERE Patient_id = $user";
    $result = mysqli_query($connect, $sqlSelectPost);
    if($result){
        while ($data = mysqli_fetch_array($result)) {
            echo "<h1>".$data['Record_date']."</h1>";
            echo "<p>"."<b>"."Diagnosis: "."</b>".$data['Diagnosis']."</p>";
            echo "<p>"."<b>"."Treatement Plan: "."</b>".$data['Treatement_plan']."</p>";
            echo "<p>"."<b>"."Medications: "."</b>".$data['Medications']."</p>";
            echo "<p>"."<b>"."Allergies: "."</b>".$data['Allergies']."</p>";
            echo "<hr/>";
            }
    }
    else{
        echo "Records Not Found";
    }

    ?>
</div>
</body>
<?php
include("templates/footer.php");
?>