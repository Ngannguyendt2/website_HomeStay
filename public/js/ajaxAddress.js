class Test {

    filterCity = function () {
        let id = $('#province_id').val();
        let url = 'http://localhost:8000/api/' + id;
        $.ajax({
            url: url,
            type: "GET",
            success: function (respone) {
                $('#district_id').html(respone);
                $.each(respone, function (index, value) {
                    let option = '<option value="' + value.id + '">' + value.name + '</option>';
                    $('#district_id').append(option)

                })
            },
            error: function (error) {
                console.log(error)
            }
        })
    };

    filterDistrict = function () {
        let id = $('#district_id').val();
        console.log(id);
        let url = 'http://localhost:8000/api/district/' + id;
        $.ajax({
            url: url,
            type: "GET",
            success: function (respone) {
                console.log(respone);
                $('#ward_id').html(respone);
                respone.forEach(function (value, index) {
                    let option = '<option value="' + value.id + '">' + value.name + '</option>';
                    $('#ward_id').append(option)
                });
            },
            error: function (error) {
                console.log(error)
            }
        })
    };

    filterWard = function () {
        let id = $('#ward_id').val();
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