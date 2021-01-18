require('./bootstrap');

$('#quantity-input').on('change', function(){
  var quantity = $(this).val();

  var single_unit_price = parseInt($(this).data('unit-price'));

  var total_price = single_unit_price * quantity;

  $('#quantity-input-field').val(quantity);
  $('#total-price-display').html('INR ' + total_price);
});
