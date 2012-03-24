<?php
	$path = getcwd();
	$filename = $path.DS.'email templates'.DS.'ForgotPasswordEmailTemplate.txt';
	$fp = fopen($filename, 'r');
	
	$paterns = array('/\%user\%/', '/\%password\%/');
	$replacements = array($user, $password);
	 
	while (($content = fgets($fp))!==false){
		echo preg_replace($paterns, $replacements, $content).'<br>';
	}
?>