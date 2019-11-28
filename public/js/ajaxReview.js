$(document).ready(function () {
    $('#submitReview').click(function () {

        let reviewHouseForm = $("#reviewHouse");
        let formData = reviewHouseForm.serialize();
        console.log(formData);
        $.ajax({
            url: "/user/houses/review",
            type: 'POST',
            data: formData,
            success: function (result) {
                if (result.status == 'errors') {
                   alert('Có lỗi xảy ra.Mời bạn nhập lại');
                }
                if (result.status == 'success') {
                    alert('Da dang nhan xet cua ban');
                }
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
