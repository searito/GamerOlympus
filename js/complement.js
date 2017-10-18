var inicio = function(){
	$(".spinner").keyup(function(e) {
		if ($(this).val()!= "") {
			if (e.keyCode == 13) {
				var id = $(this).attr('data-id');
				var precio = $(this).attr('data-precio');
				var cantidad = $(this).val();

				$(this).parentsUntil(".spinner").find('.subtotal').text('Subtotal: ' + (precio * cantidad));

				$.post("../shop/modificarDatos.php",{
					Id:id,
					Precio:precio,
					Cantidad:cantidad
				},function(e){
					$("#total").text('Total: ' + e);
				});
			}
		}
	});

	$(".eliminar").click(function(e) {
		e.preventDefault();
		var id = $(this).attr('data-id');
		$(this).parentsUntil(".spinner").remove();

		$.post("../shop/quit.php",{
			Id:id
		},function(a){
			if (a == '0') {
				location.href=('../shop/shopcar.php');
			}
		});
	});
}

$(document).on('ready', inicio);