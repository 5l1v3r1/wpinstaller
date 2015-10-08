<?php

if(isset($_GET['dir'])){
	shell_exec('mkdir ' . escapeshellarg($_GET['dir']));
	$targetdir = getcwd() . '/' . escapeshellarg($_GET['dir']);
}else{
	$targetdir = getcwd();
}

shell_exec ('wget http://wordpress.org/latest.zip');
shell_exec ('unzip latest.zip');
shell_exec ('mv '. getcwd() . '/wordpress/* ' . $targetdir);
shell_exec ('find ' . $targetdir . ' -type d -exec chmod 755 {} \;' );
shell_exec ('find ' . $targetdir . ' -type f -exec chmod 644 {} \;' );
shell_exec ('rm -r ' . getcwd() . '/wordpress/');
shell_exec ('rm ' . getcwd() . '/latest.zip');
shell_exec ('rm ' . getcwd() . '/wpinstaller.php');
