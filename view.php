<?php // Hasta görüntüleme sayfası
 session_start(); //Session bilgileri çekmek için hazırlandı.

 if(!isset($_SESSION['time'])) { // Süre bilgisi yoksa bu sayfaya dışarıdan erişilmeye çalışıyordur.
     header("Location: index.html"); // Erişim engellendi anasayfaya yönlendirildi.
     exit;
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>View</title>
  <script src="js/script.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<!-- onLoad fonksiyonu sayfa yüklenmesi ile birlikte çalıştırılır.
	 Sayfa yüklenmesiyle birlikte mevcut oturum (session) bilgileri işlenmek üzere ajaxa gönderilir.
	 Burada işlenecek olan bilgi kullanıcının süre bilgisidir.
	 Süre önceki sürümde veri tabanı üzerinde date olarak tutulmuştur.
	 İndirgeme işlemi yapabilmek için süre int türüne dönüştürülmüştür.
	 Usability açısından daha avantajlı hale gelmiştir.
	 Kullanıcı oluşturulduğu aşamadan max süre ataması yaplılabilir. 
	 Öneri/ Geliştirme:  Belki farklı birimlerde ki hastalara farklı süreler verilebilir.
 -->
<body onload='updateTime(<?php echo $_SESSION['username'].','.$_SESSION['password'].',"'.$_SESSION['time'].'"'?>)'>

  <!--Oturumun güncel olarak update edilmesi ve güncellenmiş verinin veritabanından çekilmesi işlemi-->
  <div class="infoTime">Oturum <?php echo $_SESSION['time']?> dakika sonra son bulacaktır.</div>
  <?php
    echo "Username: ".$_SESSION['username']."<br>";
    echo "Password: ".$_SESSION['password']."<br>";
    echo "Time: latest ".$_SESSION['time']."<br>";
  ?>

</body>
</html>
