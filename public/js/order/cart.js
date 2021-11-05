$('.btn-plus, .btn-minus').on('click', function(e) {
    calculateTotal($(this).siblings('.quantity-input'));
});
$('.quantity-input').on('input', function(e) {
    calculateTotal($(this));
});
$(document).on('ready', function() {
    $('.quantity-input').each(function() {
        calculateTotal($(this));
    });
})
function calculateTotal(input) {
    var total = input.val() * input.data('price');
    input.closest('.row').find('.total-price').text(total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));
}
