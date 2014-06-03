<?php

$db = dbase_open ('Goldmine DB/Contact2.DBF', 0);



$num_reg = dbase_numrecords ($db);

echo '<table border=1px solid black>';
$i = 1;
    $Record = dbase_get_record_with_names ($db, $i);

    foreach ($Record as $key => $value){
        if ($key == 'ACCOUNTNO') {

        echo '<td>'.$key.'</td>';

    }
    }
for ($i =1; $i < 100; $i++) {
    $Record = dbase_get_record_with_names ($db, $i);
echo '<tr>';
    foreach ($Record as $key => $value){
       if ($key == 'ACCOUNTNO') {

            echo '<td>'.$value.'</td>';

       }
    }
    echo '</tr>';
}

echo '</table>';