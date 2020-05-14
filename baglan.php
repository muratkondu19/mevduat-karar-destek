<?php
try {
	$db = new PDO ("mysql:host=localhost;dbname=karar_destek;charset=UTF8","root","12345678");
	//echo "Veritabanı bağlanma işlemi başarılı";
}
catch (PDOExpception $e) { //hata yakalama
	echo $e->getMessage();
}
?>

