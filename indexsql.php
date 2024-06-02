<?php
// معلومات اتصال قاعدة البيانات
$servername = "اسم_الخادم";
$username = "اسم_المستخدم";
$password = "كلمة_المرور";
$dbname = "اسم_قاعدة_البيانات";

// إعداد اتصال PDO
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // تحديد وضع الخطأ للحصول على تقارير الأخطاء
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // البيانات التي تحتاج إلى حفظها
    $productName = "COLOMBIA (10p)";
    $productDescription = "Coffee from Colombia.";
    $productImageURL = "images/c1.png";
    $productPrice = 5.400;

    // استعلام SQL لإدراج البيانات في جدول المنتجات
    $sql = "INSERT INTO Products (Name, Description, ImageURL, Price) VALUES (:name, :description, :imageURL, :price)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $productName);
    $stmt->bindParam(':description', $productDescription);
    $stmt->bindParam(':imageURL', $productImageURL);
    $stmt->bindParam(':price', $productPrice);

    // تنفيذ الاستعلام
    $stmt->execute();

    echo "تم إدراج البيانات بنجاح.";
} catch (PDOException $e) {
    echo "فشل التواصل مع قاعدة البيانات: " . $e->getMessage();
}

// إغلاق اتصال PDO
$conn = null;
?>
