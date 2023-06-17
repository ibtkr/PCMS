<!DOCTYPE html>
<html>
<head>
    <title>Kayıt Ol</title>
</head>
<body>
    <h1>Kayıt Ol</h1>

    <?php
    // Veritabanı bağlantısı
    $servername = "localhost";
    $username = "veritabani_kullanici_adi";
    $password = "veritabani_sifre";
    $dbname = "veritabani_adi";

    // Veritabanı bağlantısını oluştur
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Bağlantıyı kontrol et
    if ($conn->connect_error) {
        die("Veritabanına bağlanırken bir hata oluştu: " . $conn->connect_error);
    }

    // Kayıt işlemi
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];

        // Kullanıcıyı veritabanına ekle
        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

        if ($conn->query($sql) === TRUE) {
            echo "<p>Kayıt başarıyla tamamlandı.</p>";
        } else {
            echo "<p>Kayıt oluşturulurken bir hata oluştu: " . $conn->error . "</p>";
        }
    }

    // Veritabanı bağlantısını kapat
    $conn->close();
    ?>

    <form method="POST" action="kayit_ol.php">
        <input type="text" name="username" placeholder="Kullanıcı Adı" required><br>
        <input type="password" name="password" placeholder="Şifre" required><br>
        <input type="submit" value="Kayıt Ol">
    </form>

</body>
</html>
