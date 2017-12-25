$(document).ready(function () {
    $('.state_id').change(function () {
        var state_id = $('.state_id').val();
        $.ajax({
            url: '/home/getCities/' + state_id,
            success: function (data) {
                $('.city_id').html(data);
            }
        });

    });
    $('.city_id').change(function () {
        var city_id = $('.city_id').val();
        $.ajax({
            url: '/home/getTowns/' + city_id,
            success: function (data) {
                $('.town_id').html(data);
            }
        });

    });
    $('#myform input').on('change', function () {
        var id = $('input[name=sec]:checked', '#myform').val();
    });
});
/* ======================================================================= */
$(document).ready(function () {
    $('#state').on('change', function (e) {
        console.log(e);
        var state_id = e.target.value;
        console.log("stateid=" + state_id);
        if (state_id) {

            $.ajax({
                url: '/information/create/ajax-state?state_id=' + state_id,
                type: "GET",

                dataType: "json",

                success: function (data) {
                    $('#city').empty();
                    $('#city').append('<option value="">اختر المدينه---</option>');
                    $.each(data, function (i, city) {
                        $('#city').append('<option value="' + city.id + '">' + city.name + '</option>');
                    });

                }

            });
        } else {
            $('#city').empty();
        }
    });

    $('#city').on('change', function (e) {
        console.log(e);
        var city_id = e.target.value;
        console.log("cityid=" + city_id);
        if (city_id) {
            $.ajax({
                url: '/information/create/ajax-city?city_id=' + city_id,
                type: "GET",

                dataType: "json",

                success: function (data) {
                    $('#town').empty();
                    $('#town').append('<option value="">اختر الحى ---</option>');
                    $.each(data, function (i, town) {

                        $('#town').append('<option value="' + town.id + '">' + town.name + '</option>');

                    });

                }


            });
        } else {
            $('#town').empty();
        }
    });


    $('#cities').on('change', function (e) {
        var city = $(this).val(); // get selected value
        if (city != "") {
            window.location = "/city/" + city; // redirect
        }
        else {
            window.location = "/";
        }
    });

    /******************* cars **********************/
    $('#cars_id').change(function () {
        var cars_id = $('#cars_id').val();
        $.ajax({
            url: '/home/getCars/' + cars_id,
            type: "GET",
            success: function (data) {
                $('#carModel_id').html('<option value="">اختر نوع السيارة</option>');
                for (var arr in data) {
                    var value = data[arr];
                    $('#carModel_id').append('<option value="' + value['id'] + '">' + value['name'] + '</option>');
                }
            }
        });
    });

    $('#categories').click(function (e) {
        debugger;
        var cars_id = document.getElementById('categories').innerHTML;
        document.getElementById('categories').style.color = "blue";

        $.ajax({
            url: '/tags/getsubcategories/' + cars_id,
            type: "GET",
            success: function (data) {
                $('#subcategories').html('');
                for (var arr in data) {
                    var value = data[arr];
                    $('#subcategories').append('<a class="tagTab"  href="" id="carType">' + value['name'] + '</a>');

                }
            }
        });


    });


    $('#loadmore').on('click', function (e) {
        // console.log(e);
        // var id = e.target.value;
        // // console.log("cityid=" + id);
        // if (id) {
        $.ajax({
            url: '/products/ajax/more',
            type: "GET",

            dataType: "json",

            success: function (data) {
                $('#AJAXloaded').empty();


                $.each(data, function (i, product) {


                    $('#AJAXloaded').append(
                        // alert('test')
                        //     '<h1>'+"test"+'</h1>'
                        '<div  class="adx  odd">' +
                        '<div class="adxInfo">' +
                        '<div class="adxTitle">' +
                        '<a href="#">' + product.title + '</a> ' +
                        '</div>' +
                        '<div class="adxExtraInfo">' +
                        '<div class="adxExtraInfoPart">' +
                        product.created_at +
                        '</div>' +
                        '</div>' +
                        ' <div class="adxExtraInfo">' +
                        '<div class="adxExtraInfoPart"><a href="#"><i class="fa fa-map-marker"></i>' +
                        product.address.name +
                        '</a>' +
                        '</div>' +

                        '<div class="adxExtraInfoPart"><a href="#"><i class="fa fa-user"></i>' +
                        product.user.name +
                        '</a>' +
                        '</div>' +


                        '</div>' +

                        '</div>' +
                        '<div class="adxImg">' +
                        '<a href="#">' +

                        '<img alt="' + product.title + '" src="/images/products/' +
                        product.images[0].image + '" title="' + product.title + '">' +

                        ' </a>' +
                        '</div>' +
                        '</div>'
                    );


                });

            }


        });
        // } else {
        //     $('#moreProducts').empty();
        // }
    });


    /****************** notifications ********************/
    $('#markasread').on('click', function () {
        $.get('/markAsRead');
    })
});
