$('input[data-spam]').each(function(){
	var word = $(this).data('spam'); //data-spam
	console.log(word);
	$(this).val(word).closest('tr').hide();
});

