$('body').on('click', '#submitOrderHouse', function () {
    // e.preventDefault();
    let house_id=$('#house_id').val();
    $("#checkout").prop("disabled", true);
    $('#checkin,#checkout').datepicker({
        minDate: new Date()
    });

    $('#checkin').change(function () {
        let dateCheckin = new Date($('#checkin').val()).getTime();
        if (dateCheckin) {
            $("#checkout").prop("disabled", false);
        }
        $('body').on('change', '#checkout', function () {
            let dateCheckout = new Date($('#checkout').val()).getTime();

            let date = new Date();
            let datePrice = date.setTime((dateCheckout - dateCheckin) / 1000 / 60 / 60 / 24);
            let priceOneDay = $('#priceHouse').val();
            totalPrice = priceOneDay * datePrice;
            $('#price').html(totalPrice);
        });
    });
    let orderHouseForm = $("#OrderHouse");
    let formData = orderHouseForm.serialize();
    $('#phone-error').html("");
    $('#checkin-error').html("");
    $('#checkout-error').html("");
    $('#alert').html("");
    $.ajax({
        url: "http://localhost:8000/house_id/order",
        type: 'POST',
        data: formData,
        success: function (result) {
            console.log(result);
            // if (result.status == 'errors') {
            //     $('#alert').html(result.message).css('color', 'red');
            // }
            // if (result.status == 'success') {
            //     $('#alert').html(result.message).css('color', 'green');
            // }
        },
        error: function (error) {

            let err = JSON.parse(error.responseText);
            if (err.errors.phone) {
                $('#phone-error').html(err.errors.phone[0]);
            }
            if (err.errors.checkin) {
                $('#checkin-error').html(err.errors.checkin[0]);
            }
            if (err.errors.checkout) {
                $('#checkout-error').html(err.errors.checkout[0]);
            }
        }
    });
});
