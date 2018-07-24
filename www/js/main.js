$(function(){

	$('a[data-confirm]').click(function (e) {
		if (!confirm('opravdu?')) {
			e.preventDefault();
			e.stopImmediatePropagation();
		}
	});


	$('a[data-ajax]').click(function (e) {
		// shift, alt, ctrl, meta -> nedelat nic

		$('body').css('background', 'yellow');
		e.preventDefault();

		// projev aktivity

		var link = this;

		$.getJSON(link.href, function (data) {
			console.log(data);
		});

		// ukoncit projev aktivity (i vpripade neuspechu)

	});

});
