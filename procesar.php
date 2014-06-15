<?php

ini_set('max_execution_time', 300);
$db_ContHist = dbase_open ('Goldmine DB/ContHist.DBF', 0);
$db_Contact1 = dbase_open ('Goldmine DB/Contact1.DBF', 0);
$db_Contact2 = dbase_open ('Goldmine DB/Contact2.DBF', 0);
error_reporting(E_ERROR | E_WARNING | E_PARSE);
$accountno = array();


$primervalor = $_POST['inicio'];
$segundovalor = $_POST['fin'];

//CONTHIST CONTHIST CONTHIST CONTHIST CONTHIST CONTHIST CONTHIST CONTHIST CONTHIST CONTHIST CONTHIST

echo '<table style="vertical-align: top;"><td><table border=2px solid black>';


$Record_ContHist = dbase_get_record_with_names ($db_ContHist, $primervalor);
$Record_Contact1 = dbase_get_record_with_names ($db_Contact1, $num_reg_Contact1);
echo '<tr><th>Contador Propio</th>';
foreach ($Record_ContHist as $Key_ContHist => $Value_ContHist){

    if ($Key_ContHist == 'ACTVCODE' or $Key_ContHist == 'ACCOUNTNO'){
        echo '<th>'.$Key_ContHist.'</th>';
    }
}


echo '</tr>';

for ($primervalor; $primervalor <= $segundovalor; $primervalor++) {
    $Record_ContHist = dbase_get_record_with_names ($db_ContHist, $primervalor);


    foreach ($Record_ContHist as $Key_ContHist => $Value_ContHist){
        if ($Value_ContHist == "120") {
            echo '<td>'.$primervalor.'</td>';
            $Accountno_ContHist = $Record_ContHist ["ACCOUNTNO"];
            array_push($accountno, $Record_ContHist ["ACCOUNTNO"]);

            echo '<td>'.$Accountno_ContHist.'</td>';
            echo '<td>'.$Value_ContHist.'</td>';
        }




        echo '</tr>';
    }


}


echo '</table></td>';

//CONTACT1 CONTACT1 CONTACT1 CONTACT1 CONTACT1 CONTACT1 CONTACT1 CONTACT1 CONTACT1 CONTACT1

echo '<td><table border=2px solid black>';
$Record_Contact1 = dbase_get_record_with_names ($db_Contact1, $num_reg_Contact1);

foreach ($Record_Contact1 as $Key_Contact1 => $Value_Contact1){

    if ($Key_Contact1 == 'CONTACT' or $Key_Contact1 == 'ACCOUNTNO'){
        echo '<th>'.$Key_Contact1.'</th>';
    }
}

for ($i = 0; $i <= count($accountno); $i++) {
    for ($num_reg_Contact1 = dbase_numrecords ($db_Contact1); $num_reg_Contact1 >= 1; $num_reg_Contact1--) {
        $Record_Contact1 = dbase_get_record_with_names ($db_Contact1, $num_reg_Contact1);

        foreach ($Record_Contact1 as $Key_Contact1 => $Value_Contact1){

            if ($Value_Contact1 === $accountno[$i]) {

                echo '<td>'.$Value_Contact1.'</td>';
                echo '<td>'.$Record_Contact1 ["CONTACT"].'</td>';

            }echo '</tr>';
        }

    }
}
echo '</table></td>';

//CONTACT2 CONTACT2 CONTACT2 CONTACT2 CONTACT2 CONTACT2 CONTACT2 CONTACT2 CONTACT2 CONTACT2

echo '<td><table border=2px solid black>';
$Record_Contact2 = dbase_get_record_with_names ($db_Contact2, $num_reg_Contact2);

foreach ($Record_Contact2 as $Key_Contact2 => $Value_Contact2){

    if ($Key_Contact2 == 'PREVRESULT' or $Key_Contact2 == 'ACCOUNTNO'){
        echo '<th>'.$Key_Contact2.'</th>';
    }
}

for ($i = 0; $i <= count($accountno); $i++) {
    for ($num_reg_Contact2 = dbase_numrecords ($db_Contact2); $num_reg_Contact2 >= 1; $num_reg_Contact2--) {
        $Record_Contact2 = dbase_get_record_with_names ($db_Contact2, $num_reg_Contact2);

        foreach ($Record_Contact2 as $Key_Contact2 => $Value_Contact2){

            if ($Value_Contact2 === $accountno[$i]) {

                echo '<td>'.$Value_Contact2.'</td>';
                echo '<td>'.$Record_Contact2 ["PREVRESULT"].'</td>';

            }echo '</tr>';
        }

    }
}
echo '</table></td></table>';



print_r($accountno);
?>
<style type="text/css">
    table {border-collapse: collapse;}
    tr:nth-child(odd) { background-color:#D2EAE8; }

    tr:nth-of-type(odd) { background-color:#FFFFFF; }

    tr:nth-of-type(even) { background-color:#D2EAE8; }
    td {text-align: center; vertical-align: middle;}

</style>