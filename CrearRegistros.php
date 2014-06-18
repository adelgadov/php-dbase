<?php
ini_set('max_execution_time', 1000000);
$db_ContHist = dbase_open ('Goldmine DB/ContHist.DBF', 2);
$db_Contact1 = dbase_open ('Goldmine DB/Contact1.DBF', 2);
$db_Contact2 = dbase_open ('Goldmine DB/Contact2.DBF', 2);

$dia = array('01','02','03','04','05', '06', '07', '08', '09', '10', '11','12', '13', '14', '15', '16', '17', '18', '19', '20',
				'21', '22', '23', '24', '25', '26', '27', '28', '29', '30');
$dia_total = count($dia) - 1;
$mes = array('01','02','03','04','05', '06', '07', '08', '09', '10', '11','12');

$mes_total = count($mes) - 1;
$anio = array ('2002', '2003', '2004', '2005', '2006', '2007', '2008', '2009', '2010', '2011', '2012', '2013', '2014');
$anio_total = count($anio) - 1;



if (dbase_numrecords($db_ContHist) == 0) {
	for ($i = 1; $i <= 600001; $i++) {
		$random_day = rand(0, $dia_total);
		$random_month = rand(0, $mes_total);
		$random_year = rand(0, $anio_total);
		$actvcode = rand (110, 130);
		$aleatorio20 = substr( md5(microtime()), 1, 20);
		dbase_add_record($db_ContHist, array($i, $aleatorio20, $anio[$random_year].$mes[$random_month].$dia[$random_day], $actvcode));

	}
}



for ($i = 1;$i <= 80001; $i++){
	$aleatorio8 = substr( md5(microtime()), 1, 8);
	$Registro_ContHist = rand(1,600000);
	$Record_ContHist = dbase_get_record_with_names ($db_ContHist, $Registro_ContHist);

		dbase_add_record($db_Contact1, array($i, $Record_ContHist["ACCOUNTNO"], $aleatorio8));
		$c = 0;


}

for ($i = 1; $i <= 80001; $i++){
	$aleatorio6 = substr( md5(microtime()), 1, 6);

	$Record_Contact1 = dbase_get_record_with_names ($db_Contact1, $i);

	dbase_add_record($db_Contact2, array($i, $Record_Contact1["ACCOUNTNO"], $aleatorio6));



}