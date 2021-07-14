var state = 0;
var cartState = 0;
function addProductToCart(el) {

    var product_id=el.parentNode.id;
    var img_url=el.parentNode.children[0].src;
    var name=el.parentNode.children[1].innerText;
    var price_kg_text=el.parentNode.children[2].children[0].innerText;
    var price_kg=parseFloat(price_kg_text);
    var count=el.parentNode.children[3].children[1].value;
    if(count <= 0 || isNaN(count) || ((count % 1) != 0)){
        return false;
    }
    count = parseInt(count);
    var price= price_kg*count;

    var productList=document.getElementById('minicart').children[1];

    var product=document.createElement("li");
    product.classList.add("products");
    
    product.innerHTML=`
    <img class = "nup-pic" src = "${img_url}" alt = "${name} Slika" loading = "lazy">
    <span class="product-name">${name}</span>
    <button onclick="deleteProductFromCart(this)" type="button" class="remove"><img src="src/images/icons/btn-remove.svg" alt="Tipka za brisanje proizvoda iz košarice"></button>
    <span class="product-info">Cijena: <strong>${price},00</strong> kn<br>Količina: <strong>${count}</strong></span>
    `
    productList.appendChild(product);

    el.disabled=true;
    section_identifier=name.concat('-button');
    document.getElementById(section_identifier).style.background = "#E5E5E5";
    document.getElementById(section_identifier).style.color = "#9093A6";

    if(state == 0){
        showCart();
    }
    cartState++;
    document.getElementById("cartNumber").innerHTML= cartState;
}

function deleteProductFromCart(btn_el){
    li=btn_el.parentNode;
    li_identifier=li.children[1].innerText;

    section_identifier=li_identifier.concat('-button');
    document.getElementById(section_identifier).style.background = "#FFE145";
    document.getElementById(section_identifier).style.color = "#B79C10";

    var productList=document.getElementById('minicart').children[1];
    productList.removeChild(li);

    document.getElementById(section_identifier).disabled=false;
    if(cartState > 0)cartState--;
    document.getElementById("cartNumber").innerHTML = cartState;

}

function showCart(){
    document.getElementById("minicart").style.visibility = "visible";
    state = 1;
    
}

function hideCart(){
    document.getElementById("minicart").style.visibility = "hidden";
    state = 0;

}


function cartClick(){
    if (state == 1){
        hideCart();
    }
    else showCart();
}

 