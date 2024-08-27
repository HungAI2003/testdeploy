<?php
// Lấy địa chỉ IP của người dùng
$ip = $_SERVER['REMOTE_ADDR'];

// Sử dụng API của ipinfo.io để lấy thông tin quốc gia mà không cần API key
$response = file_get_contents("https://ipinfo.io/{$ip}/json");
$geoData = json_decode($response, true);

// Kiểm tra mã quốc gia
if (isset($geoData['country']) && $geoData['country'] === 'US') {
    // Chuyển hướng đến link chính nếu quốc gia là Mỹ
    header("Location: https://www.youtube.com");
    exit;
} else {
    // Không chuyển hướng, trả về thông báo
    header("Location: https://www.facebook.com");
    exit;
}
?>
