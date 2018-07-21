<?php

	$ip = "localhost";	//Database Host Ip
	$user = "root";		//Database Username
	$password = "";		//Database Password
	$db = "hastane";	//Database Name

	/*
		Bağlantı PDO (sql incejtion açıkları engellenmiş bir şekilde) bağlantısı üzerinden açılmıştır.
		Latin alfabesi baz alınarak kurulmuştur. 
		Lütfen veritabanı ayarlarıyla uyuşmasına özen gösteriniz.
	*/

	try{
		$db = new PDO("mysql:host=$ip;dbname=$db",$user,$password);
		$db->exec("SET NAMES 'utf8'; SET CHARSET 'utf8'");
	}catch(PDOException $e){
		echo $e;
	}

?>
