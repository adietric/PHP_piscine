<?PHP
if (!($_SERVER['PHP_AUTH_USER'] === 'zaz') 
	|| !($_SERVER['PHP_AUTH_PW'] === 'jaimelespetitsponeys'))
	{
		header('WWW-Authenticate: Basic realm=\'Espace membres\'');
		header('HTTP/1.0 401 Unauthorized');
		header('Content-Type: text/html');
		header('Content-Length: 83');
	}
?>
<html><body><?PHP
{
	if ($_SERVER['PHP_AUTH_USER'] === 'zaz' 
		&& $_SERVER['PHP_AUTH_PW'] === 'jaimelespetitsponeys')
	{
		echo ("\nBonjour Zaz<br />\n");
		if ($_SERVER['REQUEST_METHOD'] === 'GET' )
		{
			$img = base64_encode(file_get_contents("../img/42.png"));
			echo ("<img src='data:image/png;base64,".$img."'>\n");
		}
	}
	else
		echo ("Cette zone est accessible uniquement aux membres du site");
}
?></body></html>
