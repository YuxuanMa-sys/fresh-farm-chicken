var $ = jQuery.noConflict();

$(function () {
	"use strict";

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	
	onViewCartData();
});

function onViewCartData() {

    $.ajax({
		type : 'GET',
		url: base_url + '/frontend/viewcart_data',
		dataType:"json",
		success: function (data) {
			console.log('Cart data received:', data);
			$(".viewcart_price_total").text(data.price_total);
			$(".viewcart_tax").text(data.tax);
			$(".viewcart_sub_total").text(data.sub_total);
			$(".viewcart_total").text(data.total);
		},
		error: function(xhr, status, error) {
			console.error('AJAX Error:', error);
			console.error('Status:', status);
			console.error('Response:', xhr.responseText);
			
			// Show error in the cart totals
			$(".viewcart_price_total").text('Error');
			$(".viewcart_tax").text('Error');
			$(".viewcart_sub_total").text('Error');
			$(".viewcart_total").text('Error');
		}
	});
}

function onViewCart() {
    // This function is called from onRemoveToCart but not needed for the main cart page
    // It's used for updating the mini cart in the header
    console.log('onViewCart called - not needed for main cart page');
}

function onRemoveToCart(id) {
	var rowid = $("#removetoviewcart_"+id).data('id');

	$.ajax({
		type : 'GET',
		url: base_url + '/frontend/remove_to_cart/'+rowid,
		dataType:"json",
		success: function (response) {
			
			var msgType = response.msgType;
			var msg = response.msg;

			if (msgType == "success") {
				onSuccessMsg(msg);
				$('#row_delete_'+id).remove();
			} else {
				onErrorMsg(msg);
			}
			
			onViewCartData();
			onViewCart();
		}
	});
}

