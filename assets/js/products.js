var products_container = document.getElementById('products-container');

var request_url = '/ecom/utils/products-api.php';

var btn = document.getElementById('load-btn');
var offset = 0;
var limit = 2;

function send_request(offset=0, callback) {
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      		callback(eval(this.responseText));
	    }
	  };
	  xhttp.open("GET", request_url+"?sub_category_id=" + String(id) + "&offset=" + String(offset), true);
	  xhttp.send(); 
}





function get_html(name, img_url, description, price, quantity, goto_url) {
	return `
	
	 <div class='row mb-2' id='card'>
	 <div class='col-sm-4'>
	   <img src='${img_url}'>
	  
	  </div class='col-sm-1'>
	  	<div>
	  		<input type='checkbox' class='export' name='export'>
	  	</div>
	    <div class='col-sm-7'>
	      <h3 class='text-primary'><a class='p-name' href='${goto_url}'>${name}</a></h3>
	    <p class='text-secondary p-description'> ${description} </p>
	    <div >
	      <label>Price: </label>
	      <span class='p-price'> ${price}</span>
	    </div>
	    <div class=''>
	      <label>Quantity</label>
	      <span class='p-quantity'>${quantity}</span>
	    
	  </div>
	    
	 </div>
	</div>
`
}


function load_products(offset) {
	send_request(offset, function(data) {
		if (data == undefined) {
			btn.disabled = true;
		}
		data.forEach(function(obj){
			products_container.innerHTML += get_html(obj.name, 
				obj.image_link, 
				obj.description, 
				obj.price, 
				obj.quantity,
				`product-display.php?id=${obj.id}`);
		});
	});
}

btn.onclick = function(ev) {
	load_products(offset);
	offset += limit;
}

btn.click();



function download(filename, text) {
  var element = document.createElement('a');
  element.setAttribute('href', 'data:text/plain;charset=utf-8,' + encodeURIComponent(text));
  element.setAttribute('download', filename);

  element.style.display = 'none';
  document.body.appendChild(element);

  element.click();

  document.body.removeChild(element);
}

var export_btn = document.getElementById('export-btn');

export_btn.onclick = function(ev) {
	var data = "name, description, image_link, price, quantity\n";
	var all_selected = document.getElementsByClassName('export');
	for (var i = 0; i < all_selected.length; i++) {
		var selected = all_selected[i];
		if (selected.checked) {
			var parent = selected.parentNode.parentNode;

			var name = parent.getElementsByClassName('p-name')[0].innerText;
			var description = parent.getElementsByClassName('p-description')[0].innerText;
			var image_link = parent.getElementsByClassName('p-name')[0].href;
			var price = parent.getElementsByClassName('p-price')[0].innerText;
			var quantity = parent.getElementsByClassName('p-quantity')[0].innerText;

			data += `${name}, ${description}, ${image_link}, ${price}, ${quantity}\n`;
		}

	}

	download("exported.xls", data);
}



