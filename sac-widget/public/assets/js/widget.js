(function() {
	let widgets = document.querySelectorAll('.ci-widget');

	widgets.forEach((widget) => {
		new CiWidget(widget);
	});

	function CiWidget(element) {
		if (typeof element !== 'object' || element.classList.contains('is-initiated')) return;

		element.classList.add('is-initiated');
		renderStylesheet();
		
		let list = document.createElement('div');
		list.className = 'ci-widget__list';
		element.appendChild(list);

		let options = {
			referer: element.dataset.referer,
			consignment: element.dataset.consignment,
			number: element.dataset.number
		};

		let beneficiaries = [];

		renderLoading();
		getChildren().then(function() {
			if (beneficiaries.length === 0) {
				renderNoBeneficiaries();
				return;
			}

			renderBeneficiaries();
		});

		function getChildren() {
			let filters = [];

			for (let key in options) {
				if (options[key]) filters.push(key + '=' + options[key]);
			}

			return fetch('http://localhost:8080/api/beneficiaries/?' + filters.join('&'))
				.then(response => response.json())
				.then(data => {
					if (data.code === 200) {
						beneficiaries = data.result;
					}
				});
		}

		function renderBeneficiaries() {
			list.innerHTML = '';

			beneficiaries.forEach((beneficiary) => {
				let card = document.createElement('div');
				card.className = 'ci-widget__col';
				
				card.innerHTML = '\
					<div class="ci-widget-card">\
						<a class="ci-widget-card__image-holder" href="//www.compassion.com/sponsor_a_child/child-biography.htm?gid=' + beneficiary.gid + '">\
							<img class="ci-widget-card__image" src="' + beneficiary.imagePath + '">\
						</a>\
						<div class="ci-widget-card__name">' + beneficiary.personalName + '</div>\
						<div class="ci-widget-card__country">' + beneficiary.country + '</div>\
						<a class="ci-widget-card__button" href="//www.compassion.com/sponsor_a_child/child-biography.htm?gid=' + beneficiary.gid + '">Choose Me</a>\
					</div>';

				list.appendChild(card);
			});

			for (var i = 1; i <= 3; i++) {
				renderPlaceholder();
			}
		}

		function renderNoBeneficiaries() {
			list.innerHTML = '<h1>No kids found</h1>';
		}

		function renderPlaceholder() {
			let placeholder = document.createElement('div');
			placeholder.className = 'ci-widget__col';
			list.appendChild(placeholder);
		}

		function renderLoading() {
			let loading = document.createElement('div');
			loading.className = 'ci-widget__loading';
			loading.innerText = 'Loading...';
			list.appendChild(loading);
		}

		function renderStylesheet() {
			let stylesheet = document.createElement('link');
			stylesheet.href = '//localhost:8080/assets/css/widget.min.css';
			stylesheet.type = 'text/css';
			stylesheet.rel = 'stylesheet';
			element.appendChild(stylesheet);
		}
	}
})();
