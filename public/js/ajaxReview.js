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
                let post = '<div class="row" id="post_id_' + data.id + '">' +
                    '<div class="col-md-3"><img src=""><p>'+data.user.name +'</p></div>' +
                    '<div class="col-md-9"><input id="input-1" value="data.ratings.rating"><p>'+ data.body+'</p></div>' +
                    '</div>';
                $('#post_id').append(post);
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
