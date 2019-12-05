$(document).ready(function () {
    $('#linkHistoryOrder').click(function () {

        $.ajax({
            url: 'http://localhost:8000/user/historyOrder',
            type: 'GET',
            data: 'JSON',
            success: function (result) {
                $('#rentedHouse').empty();
                if (result.data.length > 0) {
                    for (let i = 0; i <= result.data.length; i++) {
                        let html = '<tr id="historyRentHouse"><td>' + +(i + 1) + '</td><td>' + result.data[i].house.category.name + '</td><td>' + result.data[i].house.ward.name + '' +
                            '' + result.data[i].house.district.name + '' + result.data[i].house.province.name + '</td><td>' + result.data[i].checkin + '</td><td>' + result.data[i].checkout + '</td>' +
                            '<td>' + result.data[i].totalPrice + '</td><td><button class="fa fa-trash btn btn-danger"\n' +
                            '                                                data-toggle="modal"\n' +
                            '                                                data-target="#clearOrder{{$order->id}}" type="button"></button></td></tr>';
                        $('#rentedHouse').append(html);
                    }

                } else {
                    let html = '<tr id="historyRentHouse"><td colspan="6" style="text-align: center">Bạn chưa thuê nhà  </td></tr>';
                    $('#rentedHouse').append(html);
                }
            },
            error: function (err) {

            }
        })
    })
});
