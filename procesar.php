<?php

$db = dbase_open ('Goldmine DB/Contact2.DBF', 0);

$primervalor = $_POST['inicio'];
$segundovalor = $_POST['fin'];

$inicio = $primervalor;

    echo '<table border=1px solid black width="100%">';

    $Record = dbase_get_record_with_names ($db, $primervalor);
    echo '<tr><th>Contador Propio</th>';


        foreach ($Record as $key => $value){

            echo '<th>'.$key.'</th>';


        }

    echo '</tr>';

    for ($primervalor; $primervalor <= $segundovalor; $primervalor++) {
        $Record = dbase_get_record_with_names ($db, $primervalor);
        echo '<tr>';
        echo '<td>'.$primervalor.'</td>';
        foreach ($Record as $key => $value){

                echo '<td>'.$value.'</td>';


        }

        echo '</tr>';
    }

    echo '</table>';

?>
    <style type="text/css">
        }
        tr:nth-child(odd) { background-color:#D2EAE8; }

        tr:nth-of-type(odd) { background-color:#FFFFFF; }

        tr:nth-of-type(even) { background-color:#D2EAE8; }
        td {border: 1px solid ; border-color: black; text-align: center;}

    </style>