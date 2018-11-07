/**
* Invoice JS - invoice js for klinik template
* @version v1.0.1
* @copyright 2017 Pepdev.
*/

function roundNumber(number, decimals) {
	var newString;
	decimals = Number(decimals);
	if (decimals < 1) {
		newString = (Math.round(number)).toString();
	} else {
		var numString = number.toString();
		if (numString.lastIndexOf(".") == -1) {
			numString += ".";
		}
		var cutoff = numString.lastIndexOf(".") + decimals;
		var d1 = Number(numString.substring(cutoff, cutoff + 1)); 
		var d2 = Number(numString.substring(cutoff + 1, cutoff + 2)); 
		if (d2 >= 5) {
			if (d1 == 9 && cutoff > 0) {
				while (cutoff > 0 && (d1 == 9 || isNaN(d1))) {
					if (d1 != ".") {
						cutoff -= 1;
						d1 = Number(numString.substring(cutoff, cutoff + 1));
					} else {
						cutoff -= 1;
					}
				}
			}
			d1 += 1;
		}
		if (d1 == 10) {
			numString = numString.substring(0, numString.lastIndexOf("."));
			var roundedNum = Number(numString) + 1;
			newString = roundedNum.toString() + '.';
		} else {
			newString = numString.substring(0, cutoff) + d1.toString();
		}
	}
	if (newString.lastIndexOf(".") == -1) {
		newString += ".";
	}
	var decs = (newString.substring(newString.lastIndexOf(".") + 1)).length;
	for (var i = 0; i < decimals - decs; i++) newString += "0";
		return newString;
}

function update_balance() {
	var subtotal = $("#subtotal").html().replace("$", "");
	var tax = $("#tax").html().replace("$", "");
	var discount = $("#discount").val().replace("$", "");
	var after_discount = (+subtotal + +tax) - discount;
	after_discount = roundNumber(after_discount, 2);

	var due = after_discount - $("#paid").val().replace("$", "");
	due = roundNumber(due, 2);

	$('#total').html(after_discount);
	$('#due').html(due);
}

function total_amount() {
	var total = 0;
	$('.item-total-price').each(function(i) {
		price = $(this).html().replace("$", "");
		if (!isNaN(price)) total += Number(price);
	});

	var taxtotal = 0;
	$('.item-tax-price').each(function(i) {
		taxprice = $(this).html().replace("$", "");
		if (!isNaN(taxprice)) taxtotal += Number(taxprice);
	});

	total = roundNumber(total, 2);
	taxprice = roundNumber(taxtotal, 2);

	$('#subtotal').html(total);
	$('#tax').html(taxprice);
	$('#total').html(+total + +taxprice);
	update_balance();
}

function item_total_price() {
	var row = $(this).parents('.item-row');
	var price = row.find('.item-cost').val().replace("$", "") * row.find('.item-quantity').val();
	var tax_price = roundNumber(row.find('.item-tax').val() * price * 0.01, 2);
	price = roundNumber(price, 2);
	tax_price = roundNumber(tax_price, 2);
	isNaN(price) ? row.find('.item-total-price').html("N/A") : row.find('.item-total-price').html(price);
	isNaN(tax_price) ? row.find('.item-tax-price').html("N/A") : row.find('.item-tax-price').html(tax_price);
	total_amount();
}

function bind() {
	$(".item-cost").blur(item_total_price);
	$(".item-quantity").blur(item_total_price);
	$(".item-tax").blur(item_total_price);
}

$(document).ready(function() {
	"use strict";
	if ($(".item-delete").length > 0) { $(".item-delete").show(); }
	$('body').on('click', '.item-add', function () {
		$(".item-row:last").after('<tr class="item-row">'+
			'<td><textarea id="" class="font-14" placeholder="Item Name"></textarea><a class="item-delete">x</a></td>'+
			'<td><textarea class="item-description" rows="3" placeholder="Item Description"></textarea></td>'+
			'<td class="item-width"><textarea class="item-cost"></textarea></td>'+
			'<td class="item-width"><textarea class="item-quantity"></textarea></td>'+
			'<td class="item-width"><textarea class="item-tax"></textarea></td>'+
			'<td class="item-width item-tax-price"></td>'+
			'<td class="item-width item-total-price"></td>'+
			'</tr>');
		if ($(".item-delete").length > 0) { $(".item-delete").show(); }4
		bind();
	});

	$("#discount").blur(update_balance);
	$("#paid").blur(update_balance);

	$("body").on('click', '.item-delete', function() {
		$(this).parents('.item-row').remove();
		total_amount();
		if ($(".item-delete").length < 2) {
			$(".item-delete").hide();
		}
	});

	bind();

});