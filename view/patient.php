<?php
$submit = filter_input(INPUT_POST, 'btnSubmit');
if (isset($submit)) {
    $medical = filter_input(INPUT_POST, 'txtMedRecNum');
    $citizen = filter_input(INPUT_POST, 'txtCitid');
    $name = filter_input(INPUT_POST, 'txtName');
    $address = filter_input(INPUT_POST, 'txtAddress');
    $birthplace = filter_input(INPUT_POST, 'txtBirpla');
    $birthdate = filter_input(INPUT_POST, 'txtBirdate');
    $id = filter_input(INPUT_POST, 'txtId');
    addPatient($medical, $citizen, $name, $address, $birthplace, $birthdate, $id);
}
?>

<form method="post" id="usrform">
    <fieldset>
        <legend>New Patient</legend>
        <label for="txtNameIdx" class="form-label"></label>

        <b>Medical Record Number</b><br>
        <input type="text" id="txtNameIdx" name="txtMedRecNum" placeholder="Record Number" autofocus required class="form-input" size="80"><br><br>
        <b>Citizen ID Number</b><br>
        <input type="text" id="txtNameIdx" name="txtCitid" placeholder="Citizen ID Number" autofocus required class="form-input" size="80"><br><br>
        <b>Name</b><br>
        <input type="text" id="txtNameIdx" name="txtName" placeholder="Name" autofocus required class="form-input" size="80"><br><br>
        <b>Address</b><br>
        <input type="text" id="txtNameIdx" name="txtAddress" placeholder="Address" autofocus required class="form-input" size="80"><br><br>
        <b>Birth Place</b><br>
        <input type="text" id="txtNameIdx" name="txtBirpla" placeholder="Birth Place" autofocus required class="form-input" size="80"><br><br>
        <b>Birth Date</b><br>
        <input type="date" id="txtNameIdx" name="txtBirdate" placeholder="Birthdate" autofocus required class="form-input" size="80"><br><br>
        <b>Insurance</b><br>
        <input type="number" id="txtNameIdx" name="txtId" placeholder="Insurance" autofocus required class="form-input" size="80"><br><br>
        <br>

        <input type="submit" name="btnSubmit" value="Add Patient" class="button-primary">
    </fieldset>
</form>

<table id="patient" class="display">
    <thead>
        <tr>
            <th>Medical Record Number</th>
            <th>Citizen ID Number</th>
            <th>Name</th>
            <th>Address</th>
            <th>Birth Place</th>
            <th>Birth Date</th>
            <th>Insurance</th>
        </tr>
    </thead>

    <tbody>
        <?php
        $patients = getAllPatient();
        foreach ($patients as $patient) {
            echo '<tr>';
            echo '<td>' . $patient['med_record_number'] . '</td>';
            echo '<td>' . $patient['citizen_id_number'] . '</td>';
            echo '<td>' . $patient['name'] . '</td>';
            echo '<td>' . $patient['address'] . '</td>';
            echo '<td>' . $patient['birth_place'] . '</td>';
            echo '<td>' . date_format(date_create($patient['birth_date']), "d M Y") . '</td>';
            echo '<td>' . $patient['name_class'] . '</td>';
            echo '</tr>';
        }
        ?>
    </tbody>

</table>