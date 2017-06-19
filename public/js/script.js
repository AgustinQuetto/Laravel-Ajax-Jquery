$(document).ready(function(){
	$('#alert').hide();
	$('.btn-delete').click(function(e){
		e.preventDefault();
		if (!confirm("¿Está seguro?")) {
			return false;
		}
		//no se ejecuta
		var row = $(this).parents('tr');
		var form = $(this).parents('form');
		var url2 = form.attr('action');

		$('#alert').show();

		$.post(url2, form.serialize(), function(result){
			row.fadeOut();
			$('#products-total').html(result.total);
			$('#alert').html(result.message);
		}).fail(function(){
			$('#alert').html('Algo salió mal');
		});
	});
});