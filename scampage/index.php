<?php

require_once __DIR__ . '/config.php';

// Fallback if variable not present
if (!isset($captcha_on)) {
    // default -> home
    header('Location: home.php');
    exit;
}

$target = $captcha_on ? 'captcha.php' : 'home.php';

// Prevent open redirect by forcing local filenames only
$allowed = ['captcha.php', 'home.php'];
if (!in_array($target, $allowed, true)) {
    $target = 'home.php';
}

header('Location: ' . $target);
exit;
