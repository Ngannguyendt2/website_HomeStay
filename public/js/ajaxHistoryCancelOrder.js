$(document).ready(function () {
    $('#linkCancelOrder').click(function () {
        $.ajax({
            url: 'http://localhost:8000/user/orderHadCancel',
            type: 'GET',
            data: 'JSON',
            success: function (result) {
                $('#rentedHouse').empty();
                $('#clearOrder').empty();
                if (result.data.length > 0) {
                    for (let i = 0; i <= result.data.length; i++) {
                        let html = '<tr id="historyRentHouse"><td>' + +(i + 1) + '</td><td>' + result.data[i].house.category.name + '</td><td>' + result.data[i].house.ward.name + '-' +
                            '' + result.data[i].house.district.name + '-' + result.data[i].house.province.name + '</td><td>' + result.data[i].checkin + '</td><td>' + result.data[i].checkout + '</td>' +
                            '<td>' + result.data[i].totalPrice + '</td><td><a href="http://localhost:8000/user/'+result.data[i].id+'/deleteOrderSoftDelete" class="fa fa-trash btn btn-danger cancelOrder"></a></td></tr>';
                        $('#rentedHouse').append(html);
                    }

                } else {
                    let html = '<tr id="historyRentHouse"><td colspan="6" style="text-align: center">Bạn chưa hủy lần nào  </td></tr>';
                    $('#rentedHouse').append(html);
                }
            },
            error: function (err) {

            }
        })
    })

});
