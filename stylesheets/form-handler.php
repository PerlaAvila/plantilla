<?php
$db = new mysqli("DB_HOST","DB_USER","DB_PASSWORD","DB_NAME");
$sql = "SELECT id FROM form_submissions";
$result = $db->query($sql);
if (empty($result)) {
	$sql = "CREATE TABLE `form_submissions` (
		`id` int(11) NOT NULL AUTO_INCREMENT,
		`name` text COLLATE utf8_unicode_ci,
		`phone` text COLLATE utf8_unicode_ci,
		 `email` int(11) DEFAULT NULL,
		 `message` text COLLATE utf8_unicode_ci,
		 `submitted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
		 PRIMARY KEY (`id`)
		 ) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";
		$result = $db->query($sql);
}
// Set your email below
$myemail = "perla@pong.com.mx"; 
$name = mysqli_real_escape_string($db, $_POST['name']);
$email = mysqli_real_escape_string($db, $_POST['email']);
$phone = mysqli_real_escape_string($db, $_POST['phone']);
$message = mysqli_real_escape_string($db, $_POST['message']);
$sql = "INSERT INTO form_submissions (name,phone,email,message) VALUES ('$name','$phone','$email','$message')";
$result = $db->query($sql);
$msg = "Nuevo correo para Promedics!\nNombre: " . $name . "\nEmail: " . $email . "\nTeléfono: " . $phone . "\nEmail: " . $email;
$msg = wordwrap($msg,70);
mail($myemail,"Nuevo correo para Promedics",$msg);
mail($email,"Gracias por ponerte en contacto con nosotros",$msg);
echo 'Gracias por escribirnos <a href="index.html">Click para regresar al homepage.';
?>