
<html>

    <head>
<meta charset="UTF-8">
    </head>
    <table class="table_index">
        <form method="post" action="procesar.php" target=”_blank”>
            <tr>
                <td>Mostrar registros de :</td>
                <td><input type="text" name="inicio"></td>
                <td>a</td>
                <td><input type="text" name="fin"></td>
                <td>(Máx.<?php $db = dbase_open ('Goldmine DB/ContHist.DBF', 0); $num_reg = dbase_numrecords ($db); echo $num_reg; ?>)</td>
                <td><input type="submit" value="Enviar"></td>
            </tr>

        </form>
    </table>
    <body>


    </body>
</html>

