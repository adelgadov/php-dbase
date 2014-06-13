<?php
ini_set('max_execution_time', 300);
$db_ContHist = dbase_open ('Goldmine DB/ContHist.DBF', 0);
$db_Contact1 = dbase_open ('Goldmine DB/Contact1.DBF', 0);
$db_Contact2 = dbase_open ('Goldmine DB/Contact2.DBF', 0);
$i = 1;
echo $i;
$num_reg_Contact1 = dbase_numrecords ($db_Contact1);

$primervalor = $_POST['inicio'];
$segundovalor = $_POST['fin'];



echo '<table border=2px solid black">';

if ($primervalor < $segundovalor) {
    $Record_ContHist = dbase_get_record_with_names ($db_ContHist, $primervalor);

    echo '<tr><th>Contador Propio</th>';
    foreach ($Record_ContHist as $Key_ContHist => $Value_ContHist){


            echo '<th>'.$Key_ContHist.'</th>';
    }

    echo '</tr>';

    for ($primervalor; $primervalor <= $segundovalor; $primervalor++) {
        $Record_ContHist = dbase_get_record_with_names ($db_ContHist, $primervalor);


        foreach ($Record_ContHist as $Key_ContHist => $Value_ContHist){
            if ($Value_ContHist == "120") {
                echo '<td>'.$primervalor.'</td>';

                        $contact1 = dbase_open ('Goldmine DB/Contact1.DBF', 0);
                    foreach ($Record_ContHist as $Key_ContHist => $Value_ContHist){
                        $i = $num_reg_Contact1;
                        $Accountno = $Record_ContHist ["ACCOUNTNO"];
                        echo '<td>'.$Value_ContHist.'</td>';

                    do {

                        $Record_Contact1 = dbase_get_record_with_names ($db_Contact1, $i);
                        if ($Record_Contact1["ACCOUNTNO"] == $Accountno){
                            echo "<td>$Accountno</td>";
                                $i = 1;
                    }

                    $i--;
                    }while ($i >= 1 or $Record_Contact1["ACCOUNTNO"] == $Accountno);



            }
        }

        echo '</tr>';
    }
}
}else {
    $Record_ContHist = dbase_get_record_with_names ($db_ContHist, $segundovalor);
    echo '<tr>';
    echo '<tr><th>Contador Propio</th>';

    foreach ($Record_ContHist as $Key_ContHist => $Value_ContHist){

            echo '<th>'.$Key_ContHist.'</th>';


        }

    echo '</tr>';

    for ($primervalor; $primervalor >= $segundovalor; $primervalor--) {
        $Record_ContHist = dbase_get_record_with_names ($db_ContHist, $primervalor);

        echo '<tr>';
        foreach ($Record_ContHist as $Key_ContHist => $Value_ContHist){
            if ($Value_ContHist == "120") {
                echo '<td>'.$primervalor.'</td>';

                foreach ($Record_ContHist as $Key_ContHist => $Value_ContHist){
                    echo '<td>'.$Value_ContHist.'</td>';


                }

            }

            echo '</tr>';
        }

    }


    }
echo '</table>';
echo $Record_Contact1["ACCOUNTNO"];
var_dump($Record_Contact1);
?>
<style type="text/css">
    table {border-collapse: collapse;}
    tr:nth-child(odd) { background-color:#D2EAE8; }

    tr:nth-of-type(odd) { background-color:#FFFFFF; }

    tr:nth-of-type(even) { background-color:#D2EAE8; }
    td {text-align: center; vertical-align: middle;}

</style>