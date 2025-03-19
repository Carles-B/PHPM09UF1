<?php

function write_message ($message_info)
{
	echo <<<EOD
<section class="message">
<h3><a href="profile.php?user="{$message_info["username"]}">{$message_info["name"]}</a></h3>
<p class="message-text">{$message_info["message"]}</p>
<p class="message-date">{$message_info["post_time"]}</p>
</section>
EOD;
}
session_start();

require_once("template.php");

$session = false; 

if (isset($_SESSION["id_user"])) {
	$session = true;
}

open_html();

if (isset($_GET["logout"])) {
	echo "<p id=\"logout_msg\"><strong>Sesión de usuario cerrada</strong></p>";
	}


if ($session){
	echo <<<EOD
<aside id="message_form">
	<h2>¿Qué está ocurriendo?</h2>
	<form method="POST" action="message_check.php">
		<p><textarea placeholder="Introduce tu mensaje" name="message"></textarea></p>
		<p><input type="submit" value="Envia mensaje" /></p>
	</form>
</aside>
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
	<section id="message-block">
		<h2>Lo que dice la gente...</h2>
EOD;


require_once("db_conf.php");
$conn = mysqli_connect($db_server, $db_user, $db_pass, $db_db);

$query = <<<EOD
SELECT 
	users.username, 
	users.name, 
	messages.message, 
	messages.post_time
FROM 
	users 
INNER JOIN 
	messages 
ON 
	users.id_user = messages.id_user
WHERE
	messages.status = 1
ORDER BY
	messages.post_time DESC;
EOD;

$resultado = mysqli_query($conn, $query);
if (!$resultado) {
	echo "<p class=\"error_msg\">Error al leer el feed de mensajes</p>";
	echo <<<EOD
</section>
EOD;
	close_html();
	exit();
}

while ($msg = $resultado->fetch_assoc()){
	write_message($msg);
}

echo <<<EOD
</section>
EOD;

close_html();

?>
			
