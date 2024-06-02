<?php
// اتصال بقاعدة البيانات
$host = "localhost";
$username = "اسم_المستخدم";
$password = "كلمة_المرور";
$database = "اسم_قاعدة_البيانات";

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// التحقق من عملية تسجيل الدخول
if (isset($_POST['login_submit'])) {
    $login_username = $_POST['login_username'];
    $login_password = $_POST['login_password'];

    // تنفيذ استعلام SQL للتحقق من صحة بيانات تسجيل الدخول
    $login_query = "SELECT * FROM users WHERE username = '$login_username' AND password = '$login_password'";
    $result = mysqli_query($conn, $login_query);

    if (mysqli_num_rows($result) == 1) {
        // نجاح تسجيل الدخول
        echo "Login successful!";
    } else {
        // فشل تسجيل الدخول
        echo "Invalid login credentials.";
    }
}

// التحقق من عملية التسجيل
if (isset($_POST['register_submit'])) {
    $register_username = $_POST['register_username'];
    $register_email = $_POST['register_email'];
    $register_password = $_POST['register_password'];

    // تنفيذ استعلام SQL لتسجيل مستخدم جديد
    $register_query = "INSERT INTO users (username, email, password) VALUES ('$register_username', '$register_email', '$register_password')";
    $result = mysqli_query($conn, $register_query);

    if ($result) {
        // نجاح عملية التسجيل
        echo "Registration successful!";
    } else {
        // فشل عملية التسجيل
        echo "Registration failed.";
    }
}

// إغلاق اتصال قاعدة البيانات
mysqli_close($conn);
?>
