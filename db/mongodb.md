# MongoDB Notlar

## Terminology

### Database/Veritabanı
Koleksiyonlar için bir kapsayıcı. Bu, SQL'deki bir veritabanı ile aynıdır ve genellikle her projenin farklı koleksiyonlarla dolu kendi veritabanı olacaktır.

### Collection/Koleksiyon
Bir veritabanı içindeki belgelerin gruplandırılması. Bu, SQL'deki bir tabloyla aynıdır ve genellikle her veri türü (kullanıcılar, gönderiler, ürünler) kendi koleksiyonuna sahip olacaktır.

### Document/Belge
SQL tablolarındaki satır gibi düşünülebilir. Bir belge aslında yalnızca bir JSON nesnesidir.

### Field
Bir belge içindeki bir anahtar değer çifti. SQL'deki bir sütunla aynıdır. Her belgede ad, adres, hobiler vb. gibi bilgileri içeren bir dizi alan olacaktır. SQL ve MongoDB arasındaki önemli bir fark, bir alanın yalnızca dizeler, sayı, booleanlar yerine JSON nesneleri ve diziler gibi değerler içerebilmesidir.

## Basic Commands

```
mongosh
```
Local MongoDB'nizde bir bağlantı açmanızı sağlar. Diğer tüm komutlar bu `mongosh` bağlantısı içinde çalıştırılacaktır.
```
show dbs
```
Geçerli MongoDB bağlantınızdaki tüm veritabanlarını gösterir.
```
use <dbname>
```
<dbname> isimli veritabanına geçiş yapmanızı sağlar. Yoksa oluşturulur.
```
db
```
Geçerli veritabanını gösterir.
```
cls
```
Terminal ekranını temizler.
```
show collections
```
Geçerli veritabanını içerisindeki koleksiyonları listeler.
```
db.dropDatabase()
```
Geçerli veritabanını siler.
```
exit
```
MongoDB'nizde `mongosh` ile başlattığınız oturumu kapatır.



