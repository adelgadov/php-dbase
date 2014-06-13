<?php

class db {
    function conectar_db() {
        $db = dbase_open ('Goldmine DB/ContHist.DBF', 0);
        return $db;
    }

}