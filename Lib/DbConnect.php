<?php 

try {

	$db=new PDO("mysql:host=localhost;dbname=vivense;charset=utf8",'root','');
	$db->exec("SET NAME UT8");
	$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	//echo "veritabanı bağlantısı başarılı";
}

catch (PDOException $e)
{
	echo $e->getMessage();
}

$db = null;
