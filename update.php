<?php
  session_start();
  include ("connect.php"); // Veritabanı bağlantı bilgilerinin sayfaya dahil edilmesi.


  // Dışarıdan erişimi engellemek açısından http post kontrolleri
  if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['time'])){
  	// * Sayfanın yüklenmesiyle gelen session bilgileri *
    $username=$_POST['username'];
    $password=$_POST['password'];
    $time=$_POST['time'];

    /*  
    	Hasta görüntüleme sayfasında sayfa yenilenirse mevcut sessionda kalan en son veri kullanılacaktır.
		Sistemde oluşan bu bug sessionun sunucu tarafında güncellenmesiyle giderilmiştir.
		Bu satırda yapılacak değişiklik güvenlik açısından önem arz etmektedir. 
    */
    $_SESSION['time']=$time; 
    


    /*	
		Veritabanından güncel hali getirilip 1 dakika sonra indirgenen süre değeri veritabanında güncellenmiştir.
		Şayet güncelleme başarılıysa veritabanından en son hali çekilip sisteme aktarılmıştır.
		Burada veritabanından en son kaydın çekilmesi. Bu sayfayı okuyacak olan geliştiriciye kanıt sağlamak için yazılmıştır.
		Doğrudan indirgenmiş olan session bilgisi geri döndürülebilirdi. 
		Amaç veritabanında kayıt işleminin gerçekleştirildiğine emin olmak ve sonraki geliştirmelerde örnek teşkil etmesidir.
    */
    $update = $db->query("UPDATE hasta SET sure ='".$time."' WHERE hid='".$username."'and sifre ='".$password."'");
    if(!$update) echo "Güncelleme başarısız.";
    else{
      $rows = $db->query("SELECT * FROM hasta WHERE hid ='".$username."' and sifre ='".$password."'")->fetch();
      echo $rows[10];
    }
  }

?>
