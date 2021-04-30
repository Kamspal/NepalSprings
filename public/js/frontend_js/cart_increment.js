
var p = parseInt(document.getElementById("priceFeatureModal'.$prod->sale_price.'").value, 10);
function increaseFeatureModalValue() {
    alert(p); 
  var value = parseInt(document.getElementById('quantityFeatureModal{{$prod->id}}').value, 10);
  alert(value)
  value = isNaN(value) ? 0 : value;
  value++;
  document.getElementById('quantityFeatureModal{{$prod->id}}').value = value;
  var x = parseInt(document.getElementById('priceFeatureModal{{$prod->sale_price}}').value, 10);
  
  price = '$'+`<span>${x * value}</span>`;
  u_price=x * value;
  
  document.getElementById('product-priceFeatureModal{{$prod->id}}').value=u_price;
}

function decreaseFeatureModalValue() {
  var value = parseInt(document.getElementById('quantityFeatureModal{{$prod->id}}').value, 10);
  value = isNaN(value) ? 0 : value;
  value < 2 ? value = 2 : '';
  value--;
  document.getElementById('quantityFeatureModal{{$prod->id}}').value = value;
  var x = parseInt(document.getElementById('priceFeatureModal{{$prod->sale_price}}').value, 10);
  price = '$'+`<span>${x * value}</span>`;
  u_price=x * value;
  document.getElementById('product-priceFeatureModal{{$prod->id}}').value=u_price;
}


var price = '$'+`<span>${p}</span>`;
document.getElementById('product-priceFeatureModal{{$prod->id}}').innerHTML=price;