
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
                    </tr>
                    <tr>
                        <td>Mostrar registros de :</td>
                        <td><input type="text" name="inicio"></td>
                        <td>a</td>
                        <td><input type="text" name="fin"</td>
                        <td>(Máx.<?php $db = dbase_open ('Goldmine DB/ContHist.DBF', 0); $num_reg = dbase_numrecords ($db); echo $num_reg; ?>)</td>
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

