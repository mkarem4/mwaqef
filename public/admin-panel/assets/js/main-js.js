$(document).ready(function(){
    // Search
    $('.search .search-button').click(function(){
        $(this).parent().toggleClass('open');
        $('.open input').focus();
    });
    //language=JQuery-CSS
    $(".delete,.btn-danger,.text-danger-600 a").click(function(){
        swal({
                title: "تأكيد الحذف",
                text: "لن تستطيع إسترجاع العنصر المحذوف",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "نعم نفذ عملية الحذف",
                closeOnConfirm: false
            },
            function(){
                swal("تم", "تم حذف الملف بنجاح", "success");
            });
    });
    // add automatic link to url
    $('.js-title').on('keyup blur', function () {
        $('.js-name').val($(this).val().split(' ').join('-'));
    });

    $(window).load(function() {

        var chatHig = $(".chat-list").height();
        $(".chat-list").scrollTop( chatHig );

    });
});