<?php $db_ContHist = dbase_open ('Goldmine DB/ContHist.DBF', 0);
$num_reg_ContHist = dbase_numrecords ($db_ContHist)?>
<html>

    <head>
<meta charset="UTF-8">
    </head>
        <body>
            <table class="table_index">
                <form method="post" action="procesar.php" target=”_blank”>
                    <tr>
                        <td></td>
                        <td align="center"><font color="gray">dd/mm/yyyy</font></td>
                        <td></td>
                        <td align="center"><font color="gray">dd/mm/yyyy</font></td>
                        <td></td>
                        <td align="center"><font color="gray">Máx.(<?php echo $num_reg_ContHist ?>)</font></td>
                    </tr>
                    <tr>
                        <td>Mostrar llamdas pendientes desde :</td>
                        <td><input type="text" name="inicio"></td>
                        <td>a</td>
                        <td><input type="text" name="fin" value="<?php echo date("d/m/Y"); ?>"></td>
                        <td> desde el registro: </td>
                        <td><input type="text" name="registros" value="<?php echo $num_reg_ContHist / 2 ?>"></td>
                        <td><input type="submit" value="Enviar"></td>
                    </tr>


                </form>
            </table>



    <style type="text/css">
         body {
             background-image: url("http://oi59.tinypic.com/2udysco.jpg");
         }
        </style>
    </body>

</html>

