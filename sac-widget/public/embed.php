<?php
$options = array();

if ( isset( $_GET['referer'] ) ) {
	$options['referer'] = filter_var( $_GET['referer'], FILTER_SANITIZE_STRING );
}

if ( isset( $_GET['consignment'] ) ) {
	$options['consignmnet'] = filter_var( $_GET['consignment'], FILTER_SANITIZE_STRING );
}

if ( isset( $_GET['number'] ) ) {
	$options['number'] = filter_var( $_GET['number'], FILTER_SANITIZE_STRING );
}
?>
<!doctype HTML>
<html>
	<head></head>
	<body class="margin:0;">
		<div class="ci-widget"<?php foreach ( $options as $key => $value ) { ?> data-<?=$key; ?>="<?= $value; ?>"<?php } ?>></div><script src="//localhost:8080/assets/js/widget.js"></script>
	</body>
</html>
