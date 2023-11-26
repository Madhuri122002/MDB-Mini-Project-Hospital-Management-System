<?php
include("templates/header.php");
?>
<div class="create-form w-100 mx-auto p-4" style="max-width:700px;">
    <form action="process.php" method="post">
    <div class="form-field mb-4">
    Appointment Date:<input type="date" class="form-control" name="date" id="" placeholder="Appointment Date:">
    </div>
    <div class="form-field mb-4">
    Appointment Time:<input type="time" name="time"  class="form-control" id="" placeholder="Appointment Time:">
    </div>
    <div class="form-field mb-4">
        Appointment For:
    <select name="app_for" class="form-control" id=""> 
        <option>Select</option>
        <option>General Surgeon</option>
        <option>Physiotherapist</option>
        <option>Dermatologist</option>
        <option>Paediatrician</option>
        <option>Spine surgeon</option>
        <option>Cardiac Surgeon</option>
        <option>Radiologist</option>
        <option>Oncologist</option>
        <option>Psychiatrist</option>
        <option>Physiologist</option>
    </select>
    </div>
    <input type="hidden" name="date" value="<?php echo date("Y/m/d"); ?>">

    <div class="form-field">
        <input type="submit" class="btn btn-primary" value="Submit" name="create">
    </div>
     </form>
</div>
<?php
include("templates/footer.php");
?>