
$(document).ready(function () {
    $('#btn').click(function () {
        let html = "";
        let province = $('#province_id').val();
        let district = $('#district_id').val();
        let ward = $('#ward_id').val();
        let bathroom = $('#totalBathroom').val();
        let bedroom = $('#totalBedRoom').val();
        let price = $('#price').val();
        let checkin = $('#checkin').val();
        let checkout = $('#checkout').val();
        let data = {
            province_id: province,
            district_id: district,
            ward_id: ward,
            totalBathroom: bathroom,
            totalBedRoom: bedroom,
            price: price,
            checkin: checkin,
            checkout: checkout
        };
        let image;
        $.ajax({
            url: "{{route('search')}}",
            type: 'POST',
            data: data,
            success: function (response) {
                console.log(response.data);
                $.each(response.data, function (index, value) {
                    html += '<div class="col-md-6">';
                    html += '<a href="http://127.0.0.1:8000/' + value.id + '/detail">';
                    html += '<div style="border-radius: 15px; background-image:url( ' + 'http://127.0.0.1:8000/storage/images/' + JSON.parse(value.image)[0] + ') " class="propertie-item set-bg" ' + '>';
                    html += '<div class="sale-notic">' + "Cho thuê" + '</div>';
                    html += '<div class="propertie-info text-white">';
                    html += '<div class="info-warp">';
                    html += '<h5>' + value.category.name + '</h5>';
                    html += '<p><i class="fa fa-map-marker"></i>' +
                        ' ' + value.ward.name + '\n' +
                        ', ' + value.district.name + '<br>' + value.province.name + '</p>';
                    html += '</div>';
                    html += '<div style="margin-top: 5px" class="price">';
                    html += '<a href="http://127.0.0.1:8000/' + value.id + '/detail">' + numberFormat(value.price)
                        + ' ' + 'Đồng </a>';
                    html += '</div>';
                    html += '</div>';
                    html += '</div>';
                    html += '</div>';
                    html += '</a>';
                    html += '</div>'
                });
                $('#div').html(html)
            },
            error: function (errors) {
                console.log(errors)
            }

        })
    })
});

function numberFormat(number) {
    return String(number).replace(/(.)(?=(\d{3})+$)/g, '$1,')
}

