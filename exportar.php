<?php
ini_set('max_execution_time', 300); //300 seconds = 5 minutes
$db = dbase_open ('Goldmine DB/Contact2.DBF', 0);



$num_reg = dbase_numrecords ($db);
echo $num_reg;
echo '<table border=1px solid black>';
$i = 1;
$Record = dbase_get_record_with_names ($db, $i);

$link = mysql_connect('127.0.0.1', 'root', '')
or die('No se pudo conectar: ' . mysql_error());
mysql_select_db('bdatos') or die('No se pudo seleccionar la base de datos');




echo 'Connected successfully';
foreach ($Record as $key => $value){


        echo '<th>'.$key.'</th>';
            //$query = "alter table bdatos add column $key varchar (50) NOT NULL";
            //$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
}
for ($i =1; $i < 100; $i++) {
    $Record = dbase_get_record_with_names ($db, $i);
    echo '<tr>';
    foreach ($Record as $key => $value){


            echo '<td>'.$value.'</td>';

        $query = "INSERT INTO bdatos ($key) VALUES ($value)";
        $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
    }
    echo '</tr>';
}

echo '</table>';