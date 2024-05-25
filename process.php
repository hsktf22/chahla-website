<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bakery";

// إنشاء اتصال
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $product = $_POST['product'];
    $quantity = $_POST['quantity'];

    $sql = "INSERT INTO orders (name, email, product, quantity) VALUES ('$name', '$email', '$product', '$quantity')";

    if ($conn->query($sql) === TRUE) {
        echo "تم إرسال الطلب بنجاح";
    } else {
        echo "خطأ: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
