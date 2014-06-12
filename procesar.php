<?php

$db = dbase_open ('Goldmine DB/Contact2.DBF', 0);

$primervalor = $_POST['inicio'];
$segundovalor = $_POST['fin'];

$inicio = $primervalor;
$num_reg = dbase_numrecords ($db);
echo $num_reg;
echo '<table border=1px solid black>';

$Record = dbase_get_record_with_names ($db, $primervalor);
echo '<th>Contador Propio</th>';


foreach ($Record as $key => $value){


        echo '<th>'.$key.'</th>';


}
for ($inicio = $primervalor; $inicio <= $segundovalor; $inicio++) {
    $Record = dbase_get_record_with_names ($db, $inicio);
    echo '<tr>';

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
    td {border: 1px solid ; border-color: black}

</style>