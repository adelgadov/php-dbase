<?php

ini_set('max_execution_time', 1000000);
$db_ContHist = dbase_open ('Goldmine DB/ContHist.DBF', 0);
$db_Contact1 = dbase_open ('Goldmine DB/Contact1.DBF', 0);
$db_Contact2 = dbase_open ('Goldmine DB/Contact2.DBF', 0);
error_reporting(0);

$accountno = array();
$array_accountno = array();
$ordenar = array();



$finalizar_Contact1 = array();
$finalizar_Contact2 = array();

$Registro = $_POST ["registros"];


//Traducir fecha insertada al formato que usa dbase.
$valoruno = str_replace("/","", $_POST['inicio']);
$valordos =str_replace("/","",$_POST['fin']);
explode("/",$valoruno);
explode("/", $valordos);
$primervalor = $valoruno[4].$valoruno[5].$valoruno[6].$valoruno[7].$valoruno[2].$valoruno[3].$valoruno[0].$valoruno[1];
$segundovalor = $valordos[4].$valordos[5].$valordos[6].$valordos[7].$valordos[2].$valordos[3].$valordos[0].$valordos[1];




//CONTHIST CONTHIST CONTHIST CONTHIST CONTHIST CONTHIST CONTHIST CONTHIST CONTHIST CONTHIST CONTHIST

?><div style="position: absolute;width: 150%;">
    <td>
        <table style="position: absolute;border-collapse: collapse; border-spacing: 0; padding: 0; margin: 0">
            <td style="vertical-align: top; border-collapse: collapse; border-spacing: 0; padding: 0">
                <table>  <?php

            $ord = 0;


                        ?>  <th style="border: 1px solid black">ACCOUNTNO</th>  <?php
                        ?>  <th style="border: 1px solid black">ACTVCODE</th>   <?php
                        ?>  <th style="border: 1px solid black">ONDATE</th> <?php

                        ?>  </tr>   <?php

                    for ($i, $num_reg_ContHist = dbase_numrecords ($db_ContHist); $Registro <= $num_reg_ContHist; $Registro++) {
                        $Record_ContHist = dbase_get_record_with_names ($db_ContHist, $Registro);

                        if ($Record_ContHist["ACTVCODE"] == "120") {
                            if ($Record_ContHist["ONDATE"] >= $primervalor && $Record_ContHist ["ONDATE"] <= $segundovalor) {

                                    $Accountno_ContHist = $Record_ContHist ["ACCOUNTNO"];
                                    array_push($array_accountno, $Record_ContHist ["ACCOUNTNO"]);
                                    $ordenar[]= array('ACCOUNTNO' => $Record_ContHist ["ACCOUNTNO"],'ACTVCODE' => $Record_ContHist["ACTVCODE"], 'ONDATE' => $Record_ContHist ["ONDATE"]);



							}
                        }
                    }

					array_multisort($accountno, SORT_DESC, $dateon, SORT_DESC, $actvcode, SORT_DESC);
					for ($i = 0; $i < count($ordenar); $i++){
						explode("-",$ordenar[$i]["ONDATE"]);


						?><tr><td style="border: 1px solid black">    <?php echo $ordenar[$i]["ACCOUNTNO"] ?>   </td>
						<td style="border: 1px solid black">    <?php echo $ordenar[$i]["ACTVCODE"] ?>   </td>

						<td style="border: 1px solid black">    <?php echo $ordenar[$i]["ONDATE"][6].$ordenar[$i]["ONDATE"][7]."/".$ordenar[$i]["ONDATE"][4].$ordenar[$i]["ONDATE"][5]."/".
								$ordenar[$i]["ONDATE"][0].$ordenar[$i]["ONDATE"][1].$ordenar[$i]["ONDATE"][2].$ordenar[$i]["ONDATE"][3] ?>  </td></tr>


					<?php
					}

                    ?></table>
            </td><?php
            dbase_close($db_ContHist);
            $accountno = array_unique($array_accountno, $SORT_STRING = SORT_REGULAR);

            //CONTACT1 CONTACT1 CONTACT1 CONTACT1 CONTACT1 CONTACT1 CONTACT1 CONTACT1 CONTACT1 CONTACT1

            ?>     <td style="vertical-align: top; border-collapse: collapse; border-spacing: 0; padding: 0"><table>  <?php

                    $Record_Contact1 = dbase_get_record_with_names ($db_Contact1, $num_reg_Contact1);

                    ?>  <tr><th style="border: 1px solid black"> CONTACT </th></tr><?php

                for ($i = 0; $i <= count($accountno); $i++) {
                    for ($num_reg_Contact1 = dbase_numrecords ($db_Contact1);$Record_Contact1 ["ACCOUNTNO"] != $accountno [$i]; $num_reg_Contact1--) {
                        $Record_Contact1 = dbase_get_record_with_names ($db_Contact1, $num_reg_Contact1);


                        if ($Record_Contact1["ACCOUNTNO"] === $accountno[$i]) {
                            if (strlen(trim($Record_Contact1["CONTACT"], " ")) == 0){
                                ?>  <tr><td style="border: 1px solid black">.</td></tr>  <?php
                            }
                            else {
                                ?>  <tr><td style="border: 1px solid black">    <?php   echo $Record_Contact1["CONTACT"] ?>      </td></tr>     <?php
                            }
                            array_push($finalizar_Contact1, $Record_Contact1 ["ACCOUNTNO"]);

                        }
                        ?>  </tr>   <?php

                        if (count($finalizar_Contact1) == count($accountno)) {
                            break;
                        }

                    }continue;

                }
                ?>  </table>
    </td>   <?php
    dbase_close($db_Contact1);

            //CONTACT2 CONTACT2 CONTACT2 CONTACT2 CONTACT2 CONTACT2 CONTACT2 CONTACT2 CONTACT2 CONTACT2

            ?>  <td style="vertical-align: top; border-collapse: collapse; border-spacing: 0; padding: 0">
                <table>  <?php
                    $Record_Contact2 = dbase_get_record_with_names ($db_Contact2, $num_reg_Contact2);

                    ?>  <th style="border: 1px solid black"> PREVRESULT </th>   <?php

                    for ($i = 0; $i <= count($accountno); $i++) {
                        for ($num_reg_Contact2 = dbase_numrecords ($db_Contact2);$Record_Contact2 ["ACCOUNTNO"] != $accountno [$i]; $num_reg_Contact2--) {
                            $Record_Contact2 = dbase_get_record_with_names ($db_Contact2, $num_reg_Contact2);


                            if ($Record_Contact2["ACCOUNTNO"] === $accountno[$i]) {
                                if (strlen(trim($Record_Contact2["PREVRESULT"], " ")) == 0){
                                    ?>  <tr><td style="border: 1px solid black">.</td></tr>  <?php
                                }
                                else {
                                    ?>  <tr><td style="border: 1px solid black">    <?php   echo $Record_Contact2["PREVRESULT"] ?>      </td></tr>     <?php
                                }
                                array_push($finalizar_Contact2, $Record_Contact2 ["ACCOUNTNO"]);

                            }
                            ?>  </tr>   <?php

                            if (count($finalizar_Contact2) == count($accountno)) {
                                break;
                            }

                        }continue;
                    }
                    ?>  </table></td></table></div>     <?php

dbase_close($db_Contact2);

?>
<style type="text/css">
    table {border-collapse: collapse;}
    tr:nth-child(odd) { background-color:#D2EAE8; }

    tr:nth-of-type(odd) { background-color:#FFFFFF; }

    tr:nth-of-type(even) { background-color:#D2EAE8; }
    body {background-image: URL("http://boletin.esy.es/boletin/body_bg.png")}


</style>