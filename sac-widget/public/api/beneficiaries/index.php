<?php
require_once '../../../src/autoload.php';
forms_load( 'SacWidget/Interaction.php' );

header( 'Content-type: application/json' );

class Beneficiary {
	public $gid = '12345678';
	public $personalName = 'Carl';
	public $imagePath = 'http://localhost:8080/assets/media/carl.jpeg';
	public $country = 'United States';
}

if ( $_SERVER['REQUEST_METHOD'] !== 'GET' ) {
	print json_encode( array(
		'code' => 400,
		'result' => 'no beneficiaries returned',
		'message' => 'bad request'
	) );
	die();
}

$interaction = new Forms\SacWidget\Interaction();
$interaction->ip = $_SERVER['REMOTE_ADDR'];
$interaction->type = 'request';
$interaction->url = $_SERVER['HTTP_REFERER'];

if ( isset( $_GET['consignment'] ) ) {
	$interaction->consignment = filter_var( $_GET['consignment'], FILTER_SANITIZE_STRING );
}

if ( isset( $_GET['referer'] ) ) {
	$interaction->referer = filter_var( $_GET['referer'], FILTER_SANITIZE_STRING );
}

$number = 24;

if ( isset( $_GET['number'] ) ) {
	$number = intval( $_GET['number'] );

	if ( !$number || is_nan( $number ) || $number < 1 ) {
		$number = 24;
	}
}

$interaction->number = $number;
$interaction->create();

$payload = array(
	'code' => 200,
	'result' => array(),
	'message' => 'children returned',
	'start' => 1,
	'end' => 24
);


if ( !isset( $_GET['referer'] ) || $_GET['referer'] !== '000000' ) {
	for ($i = 1; $i <= $number; $i++) {
		$payload['result'][] = new Beneficiary();
	}
}

print json_encode( $payload );
