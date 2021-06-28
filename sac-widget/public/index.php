<!doctype HTML>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Sponsor a Child Widget - Compassion International</title>
		<link href="assets/css/generator.css" type="text/css" rel="stylesheet">
	</head>
	<body>
		<div class="app">
			<div class="container-xl p-t-5">
				<div class="row">
					<div class="col-12">
						<h1>Want to help children get sponsored? Use your website!</h1>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis varius rhoncus turpis at dictum. Fusce placerat tellus id sollicitudin faucibus. Etiam molestie egestas erat nec aliquet. Suspendisse vel facilisis massa. Praesent convallis lobortis leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ultrices nulla a mattis interdum. Proin scelerisque urna ut vulputate sagittis. Nullam sagittis felis sed blandit bibendum. Suspendisse pulvinar aliquet velit, et ullamcorper diam sodales at. Curabitur sed cursus nibh.</p>
					</div>
				</div>
			</div>
			<div>
				<div class="container-xl p-tb-5">
					<div class="sac-widget-generator">
						<div class="row">
							<div class="col-12 col-lg-3">
								<form class="sac-widget-generator__form">
									<h2>Options</h2>
									<div>
										<label for="referer">Referer</label>
										<input class="sac-widget-generator__option" type="text" name="referer" id="referer">
									</div>
									<div>
										<label for="consignment">Consignment</label>
										<input class="sac-widget-generator__option" type="text" name="consignment" id="consignment">
									</div>
									<div>
										<label for="number">Number Requested</label>
										<select class="sac-widget-generator__option" name="number" id="number">
											<option></option>
											<?php for ($i = 1; $i <= 24; $i++) { ?>
												<option><?= $i; ?></option>
											<?php } ?>
										</select>
									</div>
									<input type="submit" value="Generate Code">
								</form>
								<h2>Code</h2>
								<div>
									<textarea class="sac-widget-generator__code" disabled style="width:100%;max-width:100%;height:10rem;"></textarea>
								</div>
								<h2>Iframe Embed Option</h2>
								<div>
									<textarea class="sac-widget-generator__iframe" disabled style="width:100%;max-width:100%;height:10rem;"></textarea>
								</div>
							</div>
							<div class="col-12 col-lg-9">
								<h2>Preview</h2>
								<div class="sac-widget-generator__preview"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script src="assets/js/generator.js"></script>
	</body>
</html>
