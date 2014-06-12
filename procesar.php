<?php

$db = dbase_open ('Goldmine DB/Contact2.DBF', 0);

$primervalor = $_POST['inicio'];
$segundovalor = $_POST['fin'];

$inicio = $primervalor;

    echo '<table border=2px solid black">';

    $Record = dbase_get_record_with_names ($db, $primervalor);
    echo '<tr><th>Contador Propio</th>';

$cero = '';
        foreach ($Record as $key => $value){

            echo '<th>'.$key.'</th>';


        }

    echo '</tr>';

    for ($primervalor; $primervalor <= $segundovalor; $primervalor++) {
        $Record = dbase_get_record_with_names ($db, $primervalor);
        echo '<tr>';
        echo '<td>'.$primervalor.'</td>';
        foreach ($Record as $key => $value){
            if ($value === "        "){
                echo '<td>.</td>';
            }
            else {
                echo '<td>'.$value.'</td>';
            }


        }

        echo '</tr>';
    }

    echo '</table>';

?>
    <style type="text/css">
        table {border-collapse: collapse;}
        tr:nth-child(odd) { background-color:#D2EAE8; }

        tr:nth-of-type(odd) { background-color:#FFFFFF; }

        tr:nth-of-type(even) { background-color:#D2EAE8; }
        td {text-align: center; vertical-align: middle;}

    </style>