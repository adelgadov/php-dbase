<?php
include "clases/db.php";
$conectar = new db();
$db = $conectar -> conectar_db();

$primervalor = $_POST['inicio'];
$segundovalor = $_POST['fin'];



echo '<table border=2px solid black">';

if ($primervalor < $segundovalor) {
    $Record = dbase_get_record_with_names ($db, $primervalor);

    foreach ($Record as $key => $value){

    if ($key = "ACTVCODE") {
        echo '<th>'.$key.'</th>';

    }
    }

    echo '</tr>';

    for ($primervalor; $primervalor <= $segundovalor; $primervalor++) {
        $Record = dbase_get_record_with_names ($db, $primervalor);
        echo '<tr><th>Contador Propio</th>';
        echo '<td>'.$primervalor.'</td>';
        foreach ($Record as $key => $value){
            if ($key = "ACTVCODE") {

                echo '<td>'.$value.'</td>';


}
        }

        echo '</tr>';
    }
} else {
    $Record = dbase_get_record_with_names ($db, $segundovalor);
    echo '<tr>';


    foreach ($Record as $key => $value){
        if ($key == "ACTVCODE") {
        echo '<th>'.$key.'</th>';


    }}

    echo '</tr>';

    for ($primervalor; $primervalor >= $segundovalor; $primervalor--) {
        $Record = dbase_get_record_with_names ($db, $primervalor);
        echo '<td>'.$primervalor.'</td>';

        foreach ($Record as $key => $value){
            if ($key == "ACTVCODE") {
                echo '<td>'.$value.'</td>';



        }}

        echo '</tr>';
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