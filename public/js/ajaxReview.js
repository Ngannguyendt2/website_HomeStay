$(document).ready(function () {
    $('#submitReview').click(function () {
        let idHouse = $('#id-house-rating').val();
        let totalStar = $('#input-1').val();
        let comment = $('#content').val();
        // console.log(totalStar);
        // let reviewHouseForm = $("#reviewHouse");
        // let formData = reviewHouseForm.serialize();
        $.ajax({
            url: "/user/houses/review",
            type: 'POST',
            // data: formData,
            data: {
                body: comment,
                id: idHouse,
                rate: totalStar
            },
            dataType: 'JSON',
            success: function (data) {

            },
            error: function (error) {

                let err = JSON.parse(error.responseText);
                if (err.errors.body) {
                    $('#body-error').html(err.errors.body[0]);
                }
            }
        });
    })
})
