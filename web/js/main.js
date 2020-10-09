function openCart(event){
    event.preventDefault();

    $.ajax({
        url: '/cart/open',
        success: function (res) {
            $('#cart .modal-content').html(res);
            $('#cart').modal('show');
        },
        error: function () {
            alert('Not Ok');
        }
    })
};