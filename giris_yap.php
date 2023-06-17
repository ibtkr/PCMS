<!DOCTYPE html>
<html>
<head>
    <title>Giriş Yap</title>
</head>
<body>
    <h1>Giriş Yap</h1>

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

    // Giriş işlemi
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];

        // Kullanıcıyı veritabanında kontrol et
        $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            echo "<p>Giriş başarılı. Hoş geldiniz, " . $username . "!</p>";
        } else {
            echo "<p>Giriş başarısız. Geçersiz kullanıcı adı veya şifre.</p>";
        }
    }

    // Veritabanı bağlantısını kapat
    $conn->close();
    ?>

    <form method="POST" action="giris_yap.php">
        <input type="text" name="username" placeholder="Kullanıcı Adı" required><br>
        <input type="password" name="password" placeholder="Şifre" required><br>
        <input type="submit" value="Giriş Yap">
    </form>

</body>
</html>
