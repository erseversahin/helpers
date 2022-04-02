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
$ mongosh
```
Local MongoDB'nizde bir bağlantı açmanızı sağlar. Diğer tüm komutlar bu `mongosh` bağlantısı içinde çalıştırılacaktır.

```
$ show dbs
```
Geçerli MongoDB bağlantınızdaki tüm veritabanlarını gösterir.

```
$ use <dbname>
```
<dbname> isimli veritabanına geçiş yapmanızı sağlar. Yoksa oluşturulur.

```
$ db
```
Geçerli veritabanını gösterir.

```
$ cls
```
Terminal ekranını temizler.

```
$ show collections
```
Geçerli veritabanını içerisindeki koleksiyonları listeler.

```
$ db.dropDatabase()
```
Geçerli veritabanını siler.

```
$ exit
```
MongoDB'nizde `mongosh` ile başlattığınız oturumu kapatır.



## Create
Bu komutların her biri belirli bir koleksiyonda çalıştırılır.<br>
```db.<collectionName>.<command>```

```
db.users.insertOne({ name: "Şahin" })
```
users koleksiyonunda name field'ı Şahin olan bir doküman oluşturur.
```
db.users.insertMany([{ name: "Şahin" }, { name: "Fatime" }])
```
users koleksiyonunda name field'ı Şahin ve Fatime olan 2 doküman oluşturur.



## Read
Bu komutların her biri belirli bir koleksiyonda çalıştırılır.<br>
```db.<collectionName>.<command>```

```
db.users.find()
```
users koleksiyonundaki tüm dokümanları getirir.

```
db.users.find({ name: "Şahin" })
```
users koleksiyonundaki name değeri "Şahin" olan dokümanları getirir.

```
db.users.find({ "address.city": "İstanbul" })
```
users koleksiyonundaki address field'ı içerisindeki city field'ının değeri "İstanbul" olan dokümanları getirir.

```
db.users.find({ name: "Şahin" }, { name: 1, age: 1 })
```
users koleksiyonundaki name değeri "Şahin" olan dokümanların sadece name ve age fieldları listeler.

```
db.users.find({}, { age: 0 })
```
users koleksiyonundaki tüm dokümanları getirir age field'ını getirmez.

```
db.users.findOne({ name: "Şahin" })
```
users koleksiyonundaki name değeri "Şahin" olan ilk dokümanı getirir.

```
db.users.count({ name: "Şahin" })
```
users koleksiyonundaki name değeri "Şahin" olan dokümanların sayısını getirir.


## Update
Bu komutların her biri belirli bir koleksiyonda çalıştırılır.<br>
```db.<collectionName>.<command>```

```
db.users.updateOne({ age: 20 }, { $set: { age: 21 } })
```
Yaşı 21 olan ilk kullanıcıyu 21 olarak günceller.
```
db.users.updateMany({ age: 12 }, { $inc: { age: 3 } })
```
12 yaşında olan tüm kullanıcıları yaşlarına 3 ekleyerek günceller
```
db.users.replaceOne({ age: 12 }, { age: 13 })
```
12 yaşında olan ilk kullanıcıyı, tek alanı 13 yaşında olan bir nesneyle değiştirir. Yani içerisinde name, address gibi field'lar varsa bunları siler sadece age kalır. Tüm objeyi replace etmiş olursunuz.

## Delete
Bu komutların her biri belirli bir koleksiyonda çalıştırılır.<br>
```db.<collectionName>.<command>```

```
db.users.deleteOne({ age: 20 })
```
Yaşı 20 olan ilk kullanıcıyı siler.
```
db.users.deleteMany({ age: 12 })
```
Yaşı 20 olan tüm kullanıcıları siler.

## Complex Filter Object

### $eq (Eşitse)

```
db.users.find({ name: { $eq: "Şahin" } })
```
İsmi Şahin olan tüm kullanıcıları getirir.

### $ne (Eşit Değilse)

```
db.users.find({ name: { $ne: "Şahin" } })
```
İsmi Şahin olmayan tüm kullanıcıları getirir.

### $gt / $gte (Büyükse / Büyük veya Eşitse)
```
db.users.find({ age: { $gt: 12 } })
```
Yaşı 12'den büyük olan kullanıcıları getirir.
```
db.users.find({ age: { $gte: 15 } })
```
Yaşı 13'den büyük veya eşit olan kullanıcıları getirir.

### $lt / $lte (Küçükse / Küçük veya Eşitse)
```
db.users.find({ age: { $lt: 12 } })
```
Yaşı 12'den küçük olan kullanıcıları getirir.
```
db.users.find({ age: { $lte: 15 } })
```
Yaşı 13'den küçük veya eşit olan kullanıcıları getirir.

### $in (Olan)
Bir değerin birçok değerden biri olup olmadığını kontrol etmenize olanak sağlar.
```
db.users.find({ name: { $in: ["Şahin", "Turgut"] } })
```
İsmi Şahin veya Turgut olan kullanıcıları getirir.

### $nin (Olmayan)
Bir değerin birçok değerden biri olup olmadığını kontrol etmenize olanak sağlar.
```
db.users.find({ name: { $nin: ["Şahin", "Turgut"] } })
```
İsmi Şahin veya Turgut olmayan kullanıcıları getirir.

### $and
```
db.users.find({ $and: [{ age: 12 }, { name: "Şahin" }] })
```
12 yaşında ve Şahin adındaki tüm kullanıcıları getirir
```
db.users.find({ age: 12, name: "Şahin" })
```
12 yaşında ve Şahin adındaki tüm kullanıcıları getirir

### $or
```
db.users.find({ $or: [{ age: 12 }, { name: "Şahin" }] })
```
12 yaşında veya Şahin adındaki tüm kullanıcıları getirir

### $not
```
db.users.find({ name: { $not: { $eq: "Şahin" } } })
```
Şahin dışında bir ada sahip tüm kullanıcıları getirir.

### $exists
```
db.users.find({ name: { $exists: true } })
```
Bir ad alanına sahip tüm kullanıcıları getirir

### $expr
Farklı alanlar arasında karşılaştırmalar yapar.
```
db.users.find({ $expr: { $gt: ["$balance", "$debt"] } })
```
Borçlarından daha fazla bakiyesi olan tüm kullanıcıları alın


## Complex Update Object

### $set
```
db.users.updateOne({ age: 12 }, { $set: { name: "Şahin" } })
```
12 yaşındaki ilk kullanıcının adını Şahin olarak günceller

### $inc

```
db.users.updateOne({ age: 12 }, { $inc: { age: 2 } })
```
12 yaşında olan ilk kullanıcının yaşına 2 ekler

### $rename

```
db.users.updateMany({}, { $rename: { age: "user_age" } })
```
Tüm kullanıcılar için age field'ını user_age olarak yeniden adlandırır.

### $unset
```
db.users.updateOne({ age: 12 }, { $unset: { age: "" } })
```
12 yaşında olan ilk kullanıcıdan yaş alanını kaldırır.

### $push
```
db.users.updateMany({}, { $push: { friends: "Fatime" } })
```
Fatime'yi tüm kullanıcılar için arkadaşlar dizisine ekleyin.

### $pull
```
db.users.updateMany({}, { $pull: { friends: "Fatime" } })
```
Fatime'yi tüm kullanıcılar için arkadaşlar dizisinden çıkarır.

## Read Modifiers

### sort
```
db.users.find().sort({ name: 1, age: -1 })
```
Tüm kullanıcıları ada göre alfabetik sıraya göre sıralayın ve ardından herhangi bir ad aynıysa yaşa göre ters sırada sıralayın

### limit
```
db.users.find().limit(2)
```
İlk 2 kullanıcı getirir.

### skip
```
db.users.find().skip(4)
```
Sonuçları döndürürken ilk 4 kullanıcıyı atlayın.

```
db.users.find().skip(4).limit(2)
```
İlk 4 kullanıcıdan sonraki 2 kullanıcıyı getirir.
