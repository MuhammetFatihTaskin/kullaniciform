<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Kullanıcı Kaydı</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <script>
        function validateForm() {
            var email = document.forms["registerForm"]["email"].value;
            var password = document.forms["registerForm"]["password"].value;
            var confirmPassword = document.forms["registerForm"]["confirmPassword"].value;

            if (email == "" || password == "" || confirmPassword == "") {
                alert("Tüm alanlar doldurulmalıdır.");
                return false;
            }

            var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
            if (!emailPattern.test(email)) {
                alert("Geçerli bir e-posta adresi giriniz.");
                return false;
            }

            if (password.length < 6) {
                alert("Şifre en az 6 karakter olmalıdır.");
                return false;
            }

            if (password != confirmPassword) {
                alert("Şifreler eşleşmiyor.");
                return false;
            }
        }
    </script>
</head>
<body>
    <div class="container">
        <h2>Kullanıcı Kaydı</h2>
        <form name="registerForm" action="process.php" method="post" onsubmit="return validateForm()">
            <label for="firstName">İsim:</label>
            <input type="text" id="firstName" name="firstName" value="<?php echo isset($_POST['firstName']) ? htmlspecialchars($_POST['firstName']) : ''; ?>">
            
            <label for="lastName">Soyisim:</label>
            <input type="text" id="lastName" name="lastName" value="<?php echo isset($_POST['lastName']) ? htmlspecialchars($_POST['lastName']) : ''; ?>">
            
            <label for="email">E-posta:</label>
            <input type="email" id="email" name="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
            
            <label for="password">Şifre:</label>
            <input type="password" id="password" name="password">
            
            <label for="confirmPassword">Şifre Tekrar:</label>
            <input type="password" id="confirmPassword" name="confirmPassword">
            
            <label for="birthDate">Doğum Tarihi:</label>
            <input type="date" id="birthDate" name="birthDate" value="<?php echo isset($_POST['birthDate']) ? htmlspecialchars($_POST['birthDate']) : ''; ?>">
            
            <label for="gender">Cinsiyet:</label>
            <select id="gender" name="gender">
                <option value="male" <?php echo (isset($_POST['gender']) && $_POST['gender'] == 'male') ? 'selected' : ''; ?>>Erkek</option>
                <option value="female" <?php echo (isset($_POST['gender']) && $_POST['gender'] == 'female') ? 'selected' : ''; ?>>Kadın</option>
                <option value="other" <?php echo (isset($_POST['gender']) && $_POST['gender'] == 'other') ? 'selected' : ''; ?>>Diğer</option>
            </select>
            
            <input type="submit" value="Kaydet">
        </form>
    </div>
</body>
</html>
