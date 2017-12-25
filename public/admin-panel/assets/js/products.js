$(document).ready(function () {
var name = "";
function getcategories(e) {
    name = e.innerHTML;
    callajax('srch', '', e);
//        e.style.color = "blue";
    document.getElementById('carmodels').innerHTML = '';
    $.ajax({
        url: '/tags/getsubcategories/' + e.innerHTML,
        type: "GET",
        success: function (data) {
            $('#subcategories').html('');
            for (var arr in data) {
                var value = data[arr];
                $('#subcategories').html('<a class="tagTab" onclick="getAlltags(this)"  style="cursor: pointer;"  >' + value['name'] + '</a>');

            }
        }
    });


}
var cityId = '';
function getId(id) {
    cityId = id;
    callajax('cityid');
}
function callajax(op, url, e) {
    if(!url){
        var city = document.getElementById('sel_city').value;
        if (city == '') city = 'kkkk';
        name = name ? name : document.getElementById('span_tag').innerHTML
        if(e){

            name=e.innerHTML;
        }

//        if (op == 'sel') {
//
//            url = 'getProducts/' + city + '/' + name
//            cityId = '';
//        }
//        if (!op) {
//            url = 'getProducts/kkkk' + '/' + document.getElementById('span_tag').innerHTML
//            cityId = '';
//        }
        if (op == 'cityid') url = 'getProducts/' + cityId + '/' + document.getElementById('span_tag').innerHTML;
        else {
            url = 'getProducts/' + city + '/' + name
            //cityId = '';
        }}
    $.ajax({
        type: 'GET',
        url: url,
        dataType: "JSON",
        // data: "{}",
        // contentType: "application/json",
        async: false,
        cache: false,
        success: function (data) {
            var str = "";
            var product = '';
            var dataLength = data.data.length;
            for (var i = 0; i < dataLength; i++) {
                // debugger;
                product = data.data[i];
                // if (product.user.role != 4) {
                str += '<div  class="adx  odd" id=' + product.address.name + i + '>' +
                    '<div class="adxInfo">' +
                    '<div class="adxTitle">' +
                    '<a href="/' + product.id + '/' + product.nice_name + '">' + product.title + '</a> ' +
                    '</div>' +
                    '<div class="adxExtraInfo">' +
                    '<div class="adxExtraInfoPart">';
                if (product.special == 1)
                    str += '<i class="gold fa fa-star fa-lg"></i>';
                var commentCount = product.comments.length ? product.comments.length : 0;
                var imgSrc = product.images.length == 0 ? '' : "/images/products/" + product.images[0].image;
                str += '<a href="/' + product.id + '/' + product.nice_name + '"">' + commentCount + ' ردرود </a>' +
                    '</div>' +
                    '<div class="adxExtraInfoPart">' +
                    prettyDate(product.created_at)
                    + '</div>' +
                    '</div>' +
                    ' <div class="adxExtraInfo">' +
                    '<div class="adxExtraInfoPart"><a onclick="getId(' + product.address.id + ')"><i class="fa fa-map-marker"></i>' +
                    product.address.name +
                    '</a>' +
                    '</div>' +

                    '<div class="adxExtraInfoPart"><a href="/profile/' + product.user.name + '"><i class="fa fa-user"></i>' +
                    product.user.name + '</a></div></div></div>' +
                    '<div class="adxImg">';
                if (imgSrc)
                    str += '<a href="#"><img alt="' + product.title + '" src=' + imgSrc + ' ></a></div></div>';
                else {
                    str += '' + product.nice_name + '</div></div>';
                }
            }
            if (product.length == 0 || data.current_page == data.last_page)
                document.getElementById('btn_showAll').style.display = 'none';
            else document.getElementById('btn_showAll').style.display = 'inline-block';
            if (op == 'sel' || op == 'cityid' || op == 'srch')
                document.getElementById('div_allData').innerHTML = str;
            else document.getElementById('div_allData').innerHTML += str;
            document.getElementById("btn_showAll").onclick = function () {
                callajax('btn', data.next_page_url);
            }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            console.log("Request: " + XMLHttpRequest.toString() + "\n\nStatus: " + textStatus + "\n\nError: " + errorThrown);
        }
    });
}
function prettyDate(time) {
    var date = new Date((time || "").replace(/-/g, "/").replace(/[TZ]/g, " ")),
        diff = (((new Date()).getTime() - date.getTime()) / 1000),
        day_diff = Math.floor(diff / 86400);

    if (isNaN(day_diff) || day_diff < 0 || day_diff >= 31) return;

    return day_diff == 0 && (
        diff < 60 && "حالا" || diff < 120 && "1 minute ago" || diff < 3600 && Math.floor(diff / 60) + " minutes ago" || diff < 7200 && "1 hour ago" || diff < 86400 && Math.floor(diff / 3600) + " hours ago") || day_diff == 1 && "بالامس" || day_diff < 7 && day_diff + " days ago" || day_diff < 31 && Math.ceil(day_diff / 7) + " weeks ago";
}
// If jQuery is included in the page, adds a jQuery plugin to handle it as well
if (typeof jQuery != "undefined") jQuery.fn.prettyDate = function () {
    return this.each(function () {
        var date = prettyDate(this.title);
        if (date) jQuery(this).text(date);
    });
};
function getAlltags(e) {
    debugger
//        e.style.color = "blue";
    callajax('srch', '', e);
    $.ajax({
        url: '/tags/getCarModels/' + e.innerHTML,
        type: "GET",
        success: function (data) {
            $('#carmodels').html('');
            for (var arr in data) {
                var value = data[arr];
                $('#carmodels').html('<a class="tagTab" style="cursor: pointer;" onclick="getthis(this)" >' + value['name'] + '</a>');

            }
        }
    });


}
function getthis(e) {
    name = e.innerHTML;
    callajax("srch", "", e);
}
$(document).ready(function () {
    callajax();
});
});
