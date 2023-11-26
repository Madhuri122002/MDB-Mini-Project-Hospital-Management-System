<?php 
include("templates/header.php");
?>
        <div class="create-form w-100 mx-auto p-4" style="max-width:700px;">
            <form action="doctor_process.php" method="post">
                <div class="form-field mb-4">
                    <input type="text" class="form-control" name="patient_id" id="" placeholder="Patient ID:">
                </div>
                <div class="form-field mb-4">
                    <input type="text" class="form-control" name="doctor_id" id="" placeholder="Doctor ID:">
                </div>    
                <div class="form-field mb-4">
                    <input type="text" class="form-control" name="diagnosis" id="" placeholder="Diagnosis:">
                </div>
                <div class="form-field mb-4">
                    <textarea name="treatement_plan"  class="form-control" id="" cols="30" rows="10" placeholder="Enter Treatement Plan:"></textarea>
                </div>
                <div class="form-field mb-4">
                    <textarea name="medication" class="form-control" id="" cols="30" rows="10" placeholder="Enter Medications:"></textarea>
                </div>
                <div class="form-field mb-4">
                    <textarea name="allergy" class="form-control" id="" cols="30" rows="10" placeholder="Enter If any allergies:"></textarea>
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