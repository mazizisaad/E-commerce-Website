function calPrice() 
	{
    var input_size_xs =document.checkout.input_xs.value;
	var input_size_s =document.checkout.input_s.value;
	var input_size_m =document.checkout.input_m.value;
	var input_size_l =document.checkout.input_l.value;
	var input_size_xl =document.checkout.input_xl.value;
	var input_size_xxl =document.checkout.input_xxl.value;
    var price_item = document.checkout.price.value;
	
	for(var i = 0; i< 2; i++)
	{
		var delivery_method =document.checkout.delivery.value;
		var delivery_cost;
		
		if(delivery_method == "Postage")
			delivery_cost = 10;
		else
			delivery_cost = 0;
	}
	document.checkout.delivery_charge.value = delivery_cost;
	
	
	
    var xs = parseFloat(input_size_xs);
	var s = parseFloat(input_size_s);
	var m = parseFloat(input_size_m);
	var l = parseFloat(input_size_l);
	var xl = parseFloat(input_size_xl);
	var xxl = parseFloat(input_size_xxl);
    var price = parseFloat(price_item);
	
	var price_xs = xs * price;
	var price_s = s * price;
	var price_m = m * price;
	var price_l = l * price;
	var price_xl = xl * price;
	var price_xxl = xxl * price;
	var total_price = price_xs + price_s + price_m + price_l + price_xl + price_xxl;
	var grand_total = total_price + delivery_cost;
	
    document.checkout.total_xs.value = price_xs;
	document.checkout.total_s.value = price_s;
	document.checkout.total_m.value = price_m;
	document.checkout.total_l.value = price_l;
	document.checkout.total_xl.value = price_xl;
	document.checkout.total_xxl.value = price_xxl;
	document.checkout.total.value = total_price;
	document.checkout.grand_total.value = grand_total;
	}