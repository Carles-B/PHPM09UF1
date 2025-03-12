<?php

if (!isset($_POST["username"]) || !isset($_POST["password"])){
	echo "Error 1: Formulario no enviado";
	exit();
}

if (strlen($_POST["username"]) <= 2) {
	echo "Error 2a: Nombre de usuario muy corto"; 
	exit();
}

if (strlen($_POST["username"]) > 16) {
	echo "Error 2b: Nombre de usuario muy largo"; 
	exit();
}

?>
