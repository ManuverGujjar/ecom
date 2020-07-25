var card_btn = document.getElementById('add-cart-btn');
var id = document.getElementById('id');


if (localStorage.getItem(id.value) != undefined) {
	card_btn.innerHTML = "Already added to cart";
	card_btn.disabled = true;
}

card_btn.onclick = function(ev) {
	localStorage.setItem('cart-count', Number(localStorage.getItem('cart-count')) + 1);
	update_cart_count();
	localStorage.setItem(id.value, 'cart');
	card_btn.innerHTML = "Already added to cart";
	card_btn.disabled = true;
}