// View sayfası yüklenmesiyle bir kereye mahsus çalışacak olan fonksiyon.
function updateTime(username,password,time){ 
        
		//Güncellenmek üzere update.php sayfasına yollanacak olan veri objesi
        var data = {
          username: username,
          password: password,
          time: time
        };

        var timeReduce=1; // Kaç dakikada bir güncelleme yapılması gerektiğinin parametrik bilgisi. Default 1;

        /*
			Veri bilgisi içerisindeki süre bilgisine göre alınan kontrol ve y önlendirme.
			Bu aşamada sadece süre kontrolü yapılmıştır. 
			Geliştiriciye not: Gün bazlı kontrol için bu kısımda gün kontrolü yapması gerekmektedir.
			(data.time>0 olabilir fakat gün farklı bir tarihi gösterebilir.)
        */
        if(data.time==0)msgTimeOut();

        /*
			Verilen milisaniye cinsinden zaman döngülerinde barındırdığı kodu çalıştırmaktadır.
			Default olarak 1 dakika belirlenmiştir. (timeReduce)
        */
        setInterval(function() {
          if(data.time>0){
            data.time-=timeReduce;
            $.ajax({
              type: "POST",
              url: "update.php",
              data: data,
              success: function(data) {
                  $(".infoTime").html("Oturum "+data+" dakika sonra son bulacaktır.");
              },
              error: function(err) {
                console.log("Login failed!"+err);
              }
            });
          }else msgTimeOut();
  }, timeReduce*60000);
}

// Süre sonunda yapılacak işlemlerin fonksiyonu
function msgTimeOut(){
  alert('The time is over.');
  window.location.replace("index.html");
}
