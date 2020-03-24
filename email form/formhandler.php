<?php

if((empty($_POST['name'])) || (empty($_POST['email'])) || (empty($_POST['message']))){

die("<b>ERROR!</b> All fields must be filled.");

}

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$name = strtolower($name);
$name = ucwords($name);

$to = 'dmchaledesigner@gmail.com';
$subject = 'Website message from: '.$name;
$message = 'FROM: '.$name." \nEmail: ".$email."\nMessage: \n".$message;
$headers = 'From: your_email@example.com' . "\r\n";

if (filter_var($email, FILTER_VALIDATE_EMAIL)) { 
mail($to, $subject, $message, $headers); 
echo "Thank you! Your email was sent $name.";
echo "<br>";
echo "This is the email you entered: <b>$email</b>";
}else{
// echo var_dump($_POST);
echo "<b>ERROR!</b> Invalid E-mail. Please provide a valid email addres. Example: myEmail@example.com";
echo "<br>";
echo "The email <b>$email</b> you entered, is not valid.";
}

?>