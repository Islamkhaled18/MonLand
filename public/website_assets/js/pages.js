$(document).on('click', '.addToWishlist', function(e) {
    var product_id = $(this).data('product-id');
    //console.log(product_id)
    e.preventDefault();
    $.ajax({
        type: 'post',
        url: "{{ route('wishlist.store') }}",
        data: {
            product_id: product_id,
            _token: '{{ csrf_token() }}'
        },
        success: function(response) {
           // console.log(response)
            alert(response.message);
        },
        error: function(response) {
            alert('Error adding product to favorites!');
        }
    });
});
