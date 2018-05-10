/* Search */

console.log(path);
var products = new Bloodhound({
    datumTokenizer: Bloodhound.tokenizers.whitespace,
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    remote: {
        wildcard: '%QUERY',
        url: path + '/search/typeahead?query=%QUERY'
    }
});

products.initialize();

$("#typeahead").typeahead({
    // hint: false,
    highlight: true
},{
    name: 'products',
    display: 'title',
    limit: 8,
    source: products
});

$('#typeahead').bind('typeahead:select', function(ev, suggestion) {
    // console.log(suggestion);
    window.location = path + '/search/?s=' + encodeURIComponent(suggestion.title);
});

/*Cart*/
$('body').on('click', '.add-to-card-link', function (e) {
    e.preventDefault();
    //unique id  for product
    var id = $(this).data('id'),
    qty = $('.quantity input').val() ? $('.quantity input').val() : 1,
    mod = $('.available select').val();
    console.log(id, qty, mod);
    $.ajax({
        url: '/coffeeshop/cart/add',
        data: {id: id, qty: qty, mod: mod},
        type: 'GET',
        success: function(res){

            showCart(res);
        },
        error: function(){
            alert('Fehler! Bitte Versuch es später noch einmal!');
        }
    });
});

/**
 * del elements from cart
 */
$('#cart .modal-body').on('click', '.del-item', function(){
    var id = $(this).data('id');
    $.ajax({
        url: '/coffeeshop/cart/delete',
        data: {id: id},
        type: 'GET',
        success: function(res){
            showCart(res);
        },
        error: function(){
            alert('Error!');
        }
    });
});

/**
 * Shows modal cart with elements
 * @param cart
 */
function showCart(cart) {
    $('.quantity input').val(1);
   if($.trim(cart) == '<h3>Warenkorb ist leer</h3>'){
         $('#cart .modal-footer a, #cart .modal-footer .btn-danger').css('display', 'none');
     }else{
        $('#cart .modal-footer a, #cart .modal-footer .btn-danger').css('display', 'inline-block');
     }
    $('#cart .modal-body').html(cart);
     $('#cart').modal();
     if($('.cart-sum').text()){
         $('.checkout_items').removeClass('chckt_def');
         $('.checkout_items').html($('#cart .cart-qty').text());
     }else{
         $('.checkout_items').text('0');
         $('.checkout_items').addClass('chckt_def');
         //checkout_items chckt_def
         //$('.checkout_items chckt_def').text('0');
     }
}

function getCart() {
    $.ajax({
        url: '/coffeeshop/cart/show',
        type: 'GET',
        success: function(res){
            showCart(res);
        },
        error: function(){
            alert('Fehler! Bitte Versuch es später noch einmal!');
        }
    });
}
function clearCart() {
    $.ajax({
        url: '/coffeeshop/cart/clear',
        type: 'GET',
        success: function(res){
            showCart(res);
        },
        error: function(){
            alert('Fehler! Bitte Versuch es später noch einmal!');
        }
    });
}


/*Cart*/


jQuery(document).ready(function ($) {
    $('.btn-menu').click(function (event) {
        $(this).next().slideToggle();
    });
});