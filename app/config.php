<?php
session_start();
// get info users

include("./languages/langConfig.php");
include_once ('UserInformation.php');
include_once ('get.php');
    $ip = UserInfo::get_ip();    
    $os = UserInfo::get_os();
    $device = UserInfo::get_device();
    $browser = UserInfo::get_browser();
    $os = substr($uos,30,13);
$errors = array();
//error_reporting(0);
define('DB_SERVER', 'sql308.infinityfree.com'); //databases host
define('DB_USERNAME', 'if0_40869000'); //  databases username 
define('DB_PASSWORD', 'eDXQyT1kGVFE');     // databases password 
define('DB_NAME', 'if0_40869000_resume'); // databases name

// إنشاء توكن CSRF إذا لم يكن موجوداً
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
$csrf_token = $_SESSION['csrf_token'];


// محاولة الاتصال بقاعدة البيانات
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// التحقق من الاتصال
if($conn->connect_error){
    die("فشل الاتصال: " . $conn->connect_error);
}

// ضبط الترميز إلى UTF-8 لدعم اللغة العربية
if (!$conn->set_charset("utf8mb4")) {
    printf("خطأ في تحميل مجموعة الأحرف utf8mb4: %s\n", $conn->error);
    exit();
}