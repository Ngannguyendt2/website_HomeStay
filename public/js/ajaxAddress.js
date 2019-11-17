class Test {

    filterCity = function () {
        let id = $('#province').val();
        let url = 'http://localhost:8000/api/' + id;
        $.ajax({
            url: url,
            type: "GET",
            success: function (respone) {
                $('#district').html(respone);
                $.each(respone, function (index, value) {
                    let option = '<option value="' + value.id + '">' + value.name + '</option>';
                    $('#district').append(option)

                })
            },
            error: function (error) {
                console.log(error)
            }
        })
    };

    filterDistrict = function () {
        let id = $('#district').val();
        console.log(id);
        let url = 'http://localhost:8000/api/district/' + id;
        $.ajax({
            url: url,
            type: "GET",
            success: function (respone) {
                console.log(respone);
                $('#ward').html(respone);
                respone.forEach(function (value, index) {
                    let option = '<option value="' + value.id + '">' + value.name + '</option>';
                    $('#ward').append(option)
                });
            },
            error: function (error) {
                console.log(error)
            }
        })
    };

    filterWard = function () {
        let id = $('#ward').val();
        let url = 'http://localhost:8000/api/ward/' + id;
        $.ajax({
            url: url,
            type: "GET",
            success: function (respone) {
                console.log(respone)
            },
            error: function (error) {
                console.log(error)
            }
        })
    }
}

let test = new Test();