<?php
 
require 'connection.php';
$conn    = Connect();
$name_first = $conn->real_escape_string($_POST['name_first']);
$name_last  = $conn->real_escape_string($_POST['name_last']);
$address1   = $conn->real_escape_string($_POST['address1']);
$address2   = $conn->real_escape_string($_POST['address2']);
$city       = $conn->real_escape_string($_POST['city']);
$state      = $conn->real_escape_string($_POST['state']);
$zip_5      = $conn->real_escape_string($_POST['zip_5']);
$zip_suffix = $conn->real_escape_string($_POST['zip_suffix']);
$country    = $conn->real_escape_string($_POST['country']);
$query      = "INSERT into users (name_first, name_last, address1, address2, city, state, zip_5, zip_suffix, country) VALUES('" . $name_first . "', '" . $name_last . "', '" . $address1 . "', '" . $address2 . "', '" . $city . "', '" . $state . "', '" . $zip_5 . "', '" . $zip_suffix . "', '" . $country . "')";
$success    = $conn->query($query);
 
if (!$success) {
    die("Couldn't enter data: ".$conn->error);
 
}
 
echo "Excellent! Your registration has been confirmed.";
 
$conn->close();
 
?>