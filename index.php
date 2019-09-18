<?php
include_once 'db_function/insurance_func.php';
include_once 'db_function/patient_func.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>PWL-02 Rumah Sakit</title>
        <meta charset="UTF-8">
        <meta name="author" content="Kafka Febian - 1772012">
        <meta name="Description" content="Database Rumah Sakit">
        <script type="text/javascript" charset="UTF-8" src="view\datatables.js"></script>
        <link rel="stylesheet" type="text/css" href="view\datatables.css">

    </head>
    <body>
        <div class="page">
            <header>Rumah Sakit</header>
            <nav>
                <ul>
                    <li><a href="?menu=p">Patient</a></li>
                    <li><a href="?menu=i">Insurance</a></li>
                </ul>
            </nav>
            <main>
                <?php
                $targetMenu = filter_input(INPUT_GET, 'menu');
                switch ($targetMenu) {
                    case 'p':
                        include_once 'view/patient.php';
                        break;
                    case 'i':
                        include_once 'view/insurance.php';
                        break;
                    default;
                }
                ?>
            </main>
            <footer>Pemrograman Web 2 &copy;2019</footer>
        </div>
    </body>

    <script>
        $(document).ready(function () {
            $('#patient').DataTable();
            $('#insurance').DataTable();
        });
    </script>

</html>
