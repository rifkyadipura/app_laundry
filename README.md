# LaundryManager

Proyek ini adalah aplikasi manajemen laundry berbasis **PHP Native** yang berjalan di **localhost**.

## 📌 Persyaratan
- XAMPP atau WAMP (Web Server)
- PHP 7.0 atau lebih baru
- MySQL Database

---

## 🚀 Cara Menjalankan Proyek
### 1. Clone Repository
Buka Terminal atau Command Prompt, lalu jalankan perintah berikut:
```bash
git clone https://github.com/rifkyadipura/app_laundry.git
```
Pindahkan folder hasil clone ke dalam direktori:
- XAMPP: `C:\xampp\htdocs\`
- WAMP: `C:\wamp64\www\`

---

### 2. Membuat Database
1. Jalankan XAMPP/WAMP dan aktifkan **Apache** & **MySQL**.
2. Buka browser dan akses:
   ```
   http://localhost/phpmyadmin/
   ```
3. Buat database baru dengan nama:
   ```
   rifky_laundry
   ```
4. Import file SQL yang terdapat di folder:
   ```
   database/rifky_laundry.sql
   ```

---

### 3. Konfigurasi Database
Pastikan file konfigurasi koneksi database ada di:
```
rifky_koneksi.php
```
Kode koneksi database:
```php
<?php
    $hostName = "localhost";
    $username = "root";
    $password = "";
    $database = "rifky_laundry";

    $dbConn = mysqli_connect($hostName, $username, $password, $database);

    if (!$dbConn) {
        echo "Terjadi error pada koneksi";
        die;
    }
    function kode($fieldkey, $table, $tag){
        global $dbConn;

        $querycount = "SELECT count($fieldkey) AS LastID FROM `$table`";
        $result = mysqli_query($dbConn, $querycount) or die(mysqli_error($dbConn));
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $id = $row['LastID'];

        $num = $id + 1; switch (strlen($num)) {
            case 1: $NoTrans = "$tag" . "000" . $num;break;
            case 2: $NoTrans = "$tag" . "00"  . $num;break;
            case 3: $NoTrans = "$tag" . "0"   . $num;break;
            default: $NoTrans = $num; break;
        }
        return $NoTrans;
    };
?>
```

---

### 4. Menjalankan Aplikasi
Akses aplikasi melalui browser:
```
http://localhost/app_laundry/
```

---

## ⚠️ Catatan
- Jika ada error, pastikan semua service Apache & MySQL sedang berjalan.
- Gunakan PHP versi 7.x untuk kompatibilitas.

---

### 📧 Kontak
Dibuat oleh: **Rifky Najra Adipura**  
GitHub: [rifkyadipura](https://github.com/rifkyadipura)  
Email: rifkyadipura@gmail.com
