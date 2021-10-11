# SE CLI

PHP geliştirme esnasında işlemleri hızlandırmak için geliştirilmiş bir komut satırı uygulaması.

### Yükleme/Kullanma

``se`` dosyasını ve ``se_cli`` klasörünü proje anadizinize kopyalayın.
Terminalinizi açın ve komutu çalıştırın.

### Kullanılabilir Komutlar:

*İç içe dizin yaratır*

```
php se make:dir --dir 'dirname/dirname'
```
*İstenilen dizin/dizinler içerisinde bir php dosyası yaratır.*
```
php se make:php  --dir 'dirname/dirname'  --filename 'filename'
```
*İstenilen dizin/dizinler içerisinde PDO bağlantı dosyası yaratır*
```
php se make:pdoconnection --dir 'dirname/dirname' --filename 'filename' --host 'host/IP' --dbname 'your_dbname' --user 'your_db_user' --pass 'your_db_password'
```


