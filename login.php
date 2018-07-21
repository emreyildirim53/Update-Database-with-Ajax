<?php
  session_start();
  include ("connect.php"); // Veritabanı bağlantı bilgilerinin sayfaya dahil edilmesi.

  // Dışarıdan erişimi engellemek açısından http post kontrolleri
  if(isset($_POST['username']) && isset($_POST['password']) ){
  	// * Sayfanın gönderilmesi (submit button) gelen session bilgileri *
    $username=$_POST['username'];
    $password=$_POST['password'];

    // Kullanıcı bilgilerinin veritabanı içerisinde kontrol edilmesi    
    $row = $db->query("SELECT * FROM hasta WHERE hid ='".$username."' and sifre ='".$password."'")->fetch();
    if(!$row) echo "Username or password incorrect.";
    else{
        $_SESSION["username"] = $username;
        $_SESSION["password"] = $password;
        $_SESSION["time"] = $row[10];
        header('Location: view.php');
        exit;
    }
  }else echo "Lütfen alanları doldurunuz.";
?>
