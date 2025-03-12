<?php
	echo <<<EOD
<!doctype html>
<html>
<head>	
	<title>ENTIhub</title>
</head>

<body>
	<header>
		<h1>ENTIhub<h1>
		<nav>
			<ul>
				<li>Home</li>
				<li>Perfil</li>
				<li>Usuarios</li>
				<li>Configuración</li>
			</ul>
		</nav>
	</header>
	<main>
EOD;
$session = false; 
if ($session) {
	echo <<<EOD
<form method="POST">
	<p><textarea placeholder="Introduce tu mensaje" name="message"></textarea></p>
	<p><input type="submit" value="Envia mensaje" /></p>
</form>
EOD;
}
else{
	echo <<<EOD
<aside>
	<p><a href="login.php">Identifícate o regístrate para interactuar</a></p>
</aside>
EOD;
}

	echo <<<EOD
	</main>
	<footer>
		<p>Copyright (c) ENTIhub 2025</p>
	</footer>
<body>
</html>

EOD;

?>
			
