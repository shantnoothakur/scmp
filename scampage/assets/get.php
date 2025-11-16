<?php
// Function to detect the operating system
function getOperatingSystem($userAgent) {
    if (preg_match('/Windows NT 10.0/', $userAgent)) {
        return 'Windows 10 or Windows 11';
    } elseif (preg_match('/Windows NT 6.3/', $userAgent)) {
        return 'Windows 8.1';
    } elseif (preg_match('/Windows NT 6.2/', $userAgent)) {
        return 'Windows 8';
    } elseif (preg_match('/Windows NT 6.1/', $userAgent)) {
        return 'Windows 7';
    } elseif (preg_match('/Mac OS X ([\d_]+)/', $userAgent, $matches)) {
        $version = str_replace('_', '.', $matches[1]);
        return "macOS $version";
    } elseif (preg_match('/Android ([\d.]+)/', $userAgent, $matches)) {
        return "Android " . $matches[1];
    } elseif (preg_match('/CPU iPhone OS ([\d_]+)/', $userAgent, $matches)) {
        $version = str_replace('_', '.', $matches[1]);
        return "iOS $version";
    } elseif (preg_match('/Linux/', $userAgent)) {
        return 'Linux';
    } else {
        return 'Unknown OS';
    }
}

// Function to detect the browser
function getBrowser($userAgent) {
    if (strpos($userAgent, 'Chrome') !== false && strpos($userAgent, 'Edge') === false) {
        return 'Google Chrome';
    } elseif (strpos($userAgent, 'Safari') !== false && strpos($userAgent, 'Chrome') === false) {
        return 'Safari';
    } elseif (strpos($userAgent, 'Firefox') !== false) {
        return 'Mozilla Firefox';
    } elseif (strpos($userAgent, 'MSIE') !== false || strpos($userAgent, 'Trident') !== false) {
        return 'Internet Explorer';
    } elseif (strpos($userAgent, 'Edge') !== false) {
        return 'Microsoft Edge';
    } else {
        return 'Unknown Browser';
    }
}

// Function to detect the device name
function getDeviceName($userAgent) {
    if (preg_match('/iPhone/', $userAgent)) {
        return 'iPhone'; // iPhone doesn't provide specific model in user agent
    } elseif (preg_match('/iPad/', $userAgent)) {
        return 'iPad';
    } elseif (preg_match('/Android.*?; ([^;]+)/', $userAgent, $matches)) {
        return $matches[1]; // Extracts Android device name
    } elseif (preg_match('/Windows NT/', $userAgent)) {
        return 'Windows PC';
    } elseif (preg_match('/Macintosh/', $userAgent)) {
        return 'Mac';
    } elseif (preg_match('/Linux/', $userAgent)) {
        return 'Linux Device';
    } else {
        return 'Unknown Device';
    }
}

// Get the user agent
$userAgent = $_SERVER['HTTP_USER_AGENT'];

// Detect operating system, browser, and device name
$os = getOperatingSystem($userAgent);
$browser = getBrowser($userAgent);
$deviceName = getDeviceName($userAgent);

?>
