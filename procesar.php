<?php
include "clases/db.php";
$conectar = new db();
$db = $conectar -> conectar_db();

$primervalor = $_POST['inicio'];
$segundovalor = $_POST['fin'];



echo '<table border=2px solid black">';

if ($primervalor < $segundovalor) {
    $Record = dbase_get_record_with_names ($db, $primervalor);
    echo '<tr><th>Contador Propio</th>';
    foreach ($Record as $key => $value){


            echo '<th>'.$key.'</th>';


    }

    echo '</tr>';

    for ($primervalor; $primervalor <= $segundovalor; $primervalor++) {
        $Record = dbase_get_record_with_names ($db, $primervalor);


        foreach ($Record as $key => $value){
            if ($value == "120") {
                echo '<td>'.$primervalor.'</td>';

                    foreach ($Record as $key => $value){
                        echo '<td>'.$value.'</td>';


                }

            }
        }

        echo '</tr>';
    }
} else {
    $Record = dbase_get_record_with_names ($db, $segundovalor);
    echo '<tr>';
    echo '<tr><th>Contador Propio</th>';

    foreach ($Record as $key => $value){

            echo '<th>'.$key.'</th>';


        }

    echo '</tr>';

    for ($primervalor; $primervalor >= $segundovalor; $primervalor--) {
        $Record = dbase_get_record_with_names ($db, $primervalor);

        echo '<tr>';
        foreach ($Record as $key => $value){
            if ($value == "120") {
                echo '<td>'.$primervalor.'</td>';

                foreach ($Record as $key => $value){
                    echo '<td>'.$value.'</td>';


                }

            }

            echo '</tr>';
        }

    }


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