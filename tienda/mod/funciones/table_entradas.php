<?php
session_start();
$pr = $_SESSION["sess_user"]["idusuario"];
/*
 * Example PHP implementation used for the index.html example
 */

// DataTables PHP library
include( "php-datatable-entradas/DataTables.php" );

// Alias Editor classes so they are easy to use
use
	DataTables\Editor,
	DataTables\Editor\Field,
	DataTables\Editor\Format,
	DataTables\Editor\Join,
	DataTables\Editor\Upload,
	DataTables\Editor\Validate;

// Build our Editor instance and process the data coming from _POST
Editor::inst( $db, 'cartdet' )
	->fields(
		Field::inst( 'intCartdetId' )->validator( 'Validate::notEmpty' ),
		Field::inst( 'cliente_cClieCode' )->validator( 'Validate::notEmpty' ),
		Field::inst( 'intBoletoId' )->validator( 'Validate::notEmpty' ),
		Field::inst( 'dateCartdetFreg' )->validator( 'Validate::notEmpty' ),
		Field::inst( 'decCartdetStotal' )->validator( 'Validate::notEmpty' ),
		Field::inst( 'varCartdetNombres' )->validator( 'Validate::notEmpty' ),
		Field::inst( 'varCartdetApepat' )->validator( 'Validate::notEmpty' ),
		Field::inst( 'varCartdetApemat' )->validator( 'Validate::notEmpty' ),
		Field::inst( 'charCartdetDni' )->validator( 'Validate::notEmpty' ),
		Field::inst( 'varCartdetTelefono' )->validator( 'Validate::notEmpty' ),
		Field::inst( 'charCartdetTipo' )->validator( 'Validate::notEmpty' ),
		Field::inst( 'ticketstatus' )->validator( 'Validate::notEmpty' )
		)
	->where( 'cliente_cClieCode', $pr )
	->where( 'ticketstatus', 0 )
	->where( 'charCartdetTipo', 'T' )
	->where( 'varCartdetseguro', '1' )
	->where( 'dateCartdetFreg', date('Y-m-d'), '>' )
	->process( $_POST )
	->json();
