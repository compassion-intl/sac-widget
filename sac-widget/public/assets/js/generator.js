(function() {
	var generator = document.querySelector('.sac-widget-generator');
	var form = generator.querySelector('.sac-widget-generator__form');
	var referer = form.querySelector('#referer');
	var consignment = form.querySelector('#consignment');
	var number = form.querySelector('#number');
	var code = generator.querySelector('.sac-widget-generator__code');
	var preview = generator.querySelector('.sac-widget-generator__preview');
	var widget;
	var iframe = generator.querySelector('.sac-widget-generator__iframe');

	form.addEventListener('submit', function(e) {
		e.preventDefault();

		renderWidget();
	});

	renderWidget();

	function renderWidget() {
		widget = document.createElement('div');
		let widgetHolder = document.createElement('div');
		widgetHolder.className = 'ci-widget';

		let widgetIframe = document.createElement('iframe');
		widgetIframe.src = '//localhost:8080/embed.php?embed=true';

		if (referer.value) {
			widgetHolder.dataset.referer = referer.value;
			widgetIframe.src += '&referer=' + referer.value;
		}

		if (consignment.value) {
			widgetHolder.dataset.consignment = consignment.value;
			widgetIframe.src += '&consignment=' + consignment.value;
		}

		if (number.value) {
			widgetHolder.dataset.number = number.value;
			widgetIframe.src += '&number=' + number.value;
		}

		widget.appendChild(widgetHolder);
		iframe.value = widgetIframe.outerHTML;

		let widgetScript = document.createElement('script');
		widgetScript.src = '//localhost:8080/assets/js/widget.js';
		widget.appendChild(widgetScript);

		preview.innerHTML = '';
		preview.appendChild(widget);
		code.value = widget.innerHTML;
	}
})();
