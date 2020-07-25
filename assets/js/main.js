var cart_count_element = document.getElementById('cart-count');

if (localStorage.getItem('cart-count') == undefined) {
	localStorage.setItem('cart-count', 0);
}

function update_cart_count() {
	cart_count_element.innerHTML = localStorage.getItem('cart-count');
}

update_cart_count();