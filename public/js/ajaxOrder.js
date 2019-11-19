
$('body').on('click', '#submitOrderHouse', function () {
        // e.preventDefault();
        console.log('ok');

        let orderHouseForm = $("#OrderHouse");
        let formData = orderHouseForm.serialize();
        $('#name-error').html("");
        $('#email-error').html("");
        $('#phone-error').html("");
        $('#checkin-error').html("");
        $('#checkout-error').html("");
        $('#alert').html("");
        $.ajax({

            url: "",
            type: 'POST',
            data: formData,
            // success: function (data) {
            //     if (data.status == 'errors') {
            //         $('#alert').html(data.message).css('color', 'red');
            //     }
            //     if (data.status == 'success') {
            //         $('#alert').html(data.message).css('color', 'green');
            //     }
            // },
            error: function (result) {

                let err = JSON.parse(result.responseText);
                if (err.errors.name) {
                    $('#name-error').html(err.errors.name[0]);
                }

                // if (err.errors.new_password) {
                //     $('#new_password-error').html(err.errors.new_password[0]);
                // }
            }
        });
    });
