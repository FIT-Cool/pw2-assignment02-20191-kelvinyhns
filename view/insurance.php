<?php
$submit = filter_input(INPUT_POST, 'btnSubmit');
if (isset($submit)) {
    $id = filter_input(INPUT_POST, 'txtId');
    $name = filter_input(INPUT_POST, 'txtName');
    addInsurance($id, $name);
}
?>

<form method="post" id="usrform">
    <fieldset>
        <legend>New Insurance</legend>
        <label for="txtNameIdx" class="form-label"></label>

        <b>ID</b><br>
        <input type="text" id="txtNameIdx" name="txtId" placeholder="ID" autofocus required class="form-input" size="80"><br><br>
        <b>Class Name</b><br>
        <input type="text" id="txtNameIdx" name="txtName" placeholder="Class Name" autofocus required class="form-input" size="80"><br><br>
        <br>

        <input type="submit" name="btnSubmit" value="Add Insurance" class="button-primary">
</fieldset>
</form>

<table id="insurance" class="display">
    <thead>
        <tr>
            <th>ID</th>
            <th>Class Name</th>
        </tr>
    </thead>

    <tbody>
        <?php
        $insurances = getAllInsurance();
        foreach ($insurances as $insurance) {
            echo '<tr>';
            echo '<td>' . $insurance['id'] . '</td>';
            echo '<td>' . $insurance['name_class'] . '</td>';
            echo '</tr>';
        }
        ?>
    </tbody>
</table>