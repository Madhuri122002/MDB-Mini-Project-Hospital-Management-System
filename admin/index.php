<?php
include("templates/header.php");
?>
<div class="posts-list w-100 p-5">
    <h1>Your Appointments:</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th style="width:25%;">Appointment Date</th>
                <th style="width:25%;">Appointment Time</th>
                <th style="width:25%;">Appointment For</th>
                <th style="width:25%;">Appointment With</th>
            </tr>
        </thead>
        <tbody>
            <?php
            session_start();
            include('../database.php');
            $user=$_SESSION['USER'];
            $sqlSelect = "SELECT * FROM appointments where Patient_ID = '$user'";
            $result = mysqli_query($connect,$sqlSelect);
            while($data = mysqli_fetch_array($result)){
            ?>
            <tr>
            <td><?php echo $data["Appointment_Date"]?></td>
            <td><?php echo $data["Appointment_time"]?></td>
            <td><?php echo $data["Appointment_for"]?></td>
            <td><?php echo $data["Doctor"]?></td>
            </tr>
            <?php
            }
            ?>
           
        </tbody>
    </table>
</div>
<?php
include("templates/footer.php")
?>