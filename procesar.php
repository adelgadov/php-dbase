<?php

ini_set('max_execution_time', 1000000);
$db_ContHist = dbase_open ('Goldmine DB/ContHist.DBF', 0);
$db_Contact1 = dbase_open ('Goldmine DB/Contact1.DBF', 0);
$db_Contact2 = dbase_open ('Goldmine DB/Contact2.DBF', 0);
error_reporting(0);
$accountno = array();
$finalizar_Contact1 = array();
$finalizar_Contact2 = array();



$primervalor = $_POST['inicio'];
$segundovalor = $_POST['fin'];

//CONTHIST CONTHIST CONTHIST CONTHIST CONTHIST CONTHIST CONTHIST CONTHIST CONTHIST CONTHIST CONTHIST

?><div style="position: absolute;width: 150%;">
    <td>
        <table style="position: absolute;border-collapse: collapse; border-spacing: 0; padding: 0; margin: 0">
            <td style="vertical-align: top; border-collapse: collapse; border-spacing: 0; padding: 0">
                <table border=2px solid black><?php

                    $Record_ContHist = dbase_get_record_with_names ($db_ContHist, $primervalor);
                    ?><tr><th>Contador Propio</th><?php

                            ?><th>ACCOUNTNO</th><?php
                            ?><th>ACTVCODE</th><?php

                            ?></tr><?php

                            for ($primervalor; $primervalor <= $segundovalor; $primervalor++) {
                                $Record_ContHist = dbase_get_record_with_names ($db_ContHist, $primervalor);



                                    if ($Record_ContHist["ACTVCODE"] == "120") {
                                        ?><td> <?php echo $primervalor ?></td>

                                    <?php
                                        $Accountno_ContHist = $Record_ContHist ["ACCOUNTNO"];
                                        array_push($accountno, $Record_ContHist ["ACCOUNTNO"]);

                                    ?><td><?php echo $Accountno_ContHist ?></td>
                                    <?php
                                    ?><td><?php echo $Record_ContHist["ACTVCODE"] ?></td>

                                    <?php
                                    }
                    ?></tr><?php



                            }


                ?></table>
            </td><?php
                    dbase_close($db_ContHist);

//CONTACT1 CONTACT1 CONTACT1 CONTACT1 CONTACT1 CONTACT1 CONTACT1 CONTACT1 CONTACT1 CONTACT1

            ?><td style="vertical-align: top; border-collapse: collapse; border-spacing: 0px; padding: 0px">
                <table border=2px solid black><?php
                     $Record_Contact1 = dbase_get_record_with_names ($db_Contact1, $num_reg_Contact1);

                    ?><th> CONTACT </th><?php

                    for ($i = 0; $i <= count($accountno); $i++) {
                        for ($num_reg_Contact1 = dbase_numrecords ($db_Contact1); $Record_Contact1 ["ACCOUNTNO"] != $accountno [$i]; $num_reg_Contact1--) {
                            $Record_Contact1 = dbase_get_record_with_names ($db_Contact1, $num_reg_Contact1);



                                if ($Record_Contact1["ACCOUNTNO"] === $accountno[$i]) {


                                    ?><td><?php echo $Record_Contact1 ["CONTACT"]?></td><?php
                                    array_push($finalizar_Contact1, $Record_Contact1 ["ACCOUNTNO"]);
                                }
                            ?></tr><?php
                            if (count($finalizar_Contact1) == count($accountno)) {
                                break;
                            }


                        }continue;
                    }
                ?></table>
            </td><?php
                    dbase_close($db_Contact1);

//CONTACT2 CONTACT2 CONTACT2 CONTACT2 CONTACT2 CONTACT2 CONTACT2 CONTACT2 CONTACT2 CONTACT2

            ?><td style="vertical-align: top; border-collapse: collapse; border-spacing: 0px; padding: 0px">
                <table border=2px solid black><?php
                    $Record_Contact2 = dbase_get_record_with_names ($db_Contact2, $num_reg_Contact2);

                    ?> <th> PREVRESULT </th><?php

                    for ($i = 0; $i <= count($accountno); $i++) {
                        for ($num_reg_Contact2 = dbase_numrecords ($db_Contact2);$Record_Contact2 ["ACCOUNTNO"] != $accountno [$i]; $num_reg_Contact2--) {
                            $Record_Contact2 = dbase_get_record_with_names ($db_Contact2, $num_reg_Contact2);


                            if ($Record_Contact2["ACCOUNTNO"] === $accountno[$i]) {

                                    ?><td><?php echo str_replace("                                                                 ", ".", $Record_Contact2 ["PREVRESULT"])?></td><?php
                                    array_push($finalizar_Contact2, $Record_Contact2 ["ACCOUNTNO"]);

                            }
                            ?></tr><?php

                            if (count($finalizar_Contact2) == count($accountno)) {
                                break;
                            }

                        }continue;
                    }
        ?></table></td></table></div><?php

                    dbase_close($db_Contact2);


        ?>
<style type="text/css">
    table {border-collapse: collapse;}
    tr:nth-child(odd) { background-color:#D2EAE8; }

    tr:nth-of-type(odd) { background-color:#FFFFFF; }

    tr:nth-of-type(even) { background-color:#D2EAE8; }
    body {background-image: URL("http://boletin.esy.es/boletin/body_bg.png")}

</style>