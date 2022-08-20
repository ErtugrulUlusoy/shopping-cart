<h1 align="center">Shopping Cart App</h1>


## İlk Bakış

Bu uygulama basit düzeyde admin paneli aracılığı ile ürün ekleme ve eklenen ürünlerin kullanıcı tarafından görüntülenip sepetine ekleyebileceği bir sistem sunar.

## Uygulamanın Çalıştırılması;
- .env dosyasından veritabanı bağlantısı kurulması.
- Migrationlar çalıştırılarak veritabanı tablolarının oluşturulması 
- UserSeeder seeder'ı çalıştırılarak veritabanına admin kullanıcısının eklenmesi

gereklidir.

## Kullanım

Uygulamanın çalıştırıldığı urle "/admin" linki eklenerek login sayfasına ulaşılabilir.  Bu sayfa içerisinde giriş yapıldığında bizi dashboard sayfası karşılar. Bu sayfada üst menüden ürünler sayfasına geçiş yapıp "Ürün Ekle" butonu ile ürün ekleyebiliriz. Eklediğimiz ürünleri ürünler sayfasından görüntüleyebiliriz. Kullanıcının tarafından kontrol etmek istediğimizde ise uygulamanın çalıştırıldığı ana dizine gitmemiz gerekir. Aynı zamanda ürünler sayfasından "Sil"  butonu ile eklenen ürünleri silebiliriz.

Kullanıcı tarafında; Ana dizin içerisinde eklenen ürünler listelenir. Sepete ekle butonu ile ürün sepete 1 adet olacak şekilde eklenir. Ürünün üzerine tıkladığımızda ürünün detay sayfasına ulaşılabilir ve sepete ekleyeceğimiz adeti bu sayfada ayarlayabilir ve ürünün varsa diğer görsellerini görüntüleyebiliriz. Sepet sayfasında sepete eklediğimiz ürünleri görüntüleyebilir veya bu ürünleri güncelleyebiliriz. Aynı zamanda bu düzenlemeyi sağ üstte yer alan butona basıldığında çıkan tablo içerisinden de yapabiliriz. 

## Admin Kullanıcı Bilgileri
**E-posta:** admin@example.com
**Şifre:** 123