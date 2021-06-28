<?php
function forms_connect() {
	$database = getenv( 'DB_DATABASE' );
	$hostname = getenv( 'DB_HOSTNAME' );
	$password = getenv( 'DB_PASSWORD' );
	$username = getenv( 'DB_USERNAME' );

	return new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
}

function forms_load( $file ) {
	require_once __DIR__ . '/' . $file;
}
