
$(function () {

    $(document).on('click','.show_memners',function () {
        $id=$(this).data('id');

        $('.chat_bottom').html('<form id="messageForm" method="post" enctype="multipart/form-data">\n' +
            '            <ul>\n' +
            '<li><label style=""><textarea id="text" name="text" style="padding-top:7px"></textarea></label></li>\n' +
            '                <li> <input value="upload" type="file" id="file" name="file" style="width: 20%"/></li>\n' +
            '                <li><input type="hidden" name="msgTo" value="'+$id+'"></li>\n' +
            '                <li><input type="submit" class="btn" value="send" id="send" name="submit"></li>\n' +
            '            </ul>\n' +
            '            </form>');
        if (typeof $timer !== 'undefined') {
           clearInterval($timer);
        }

//////////////////////////////////////////////////////////////////////////////

        getmessages=function () {

            $.ajax('/telegram/message/getMessages', {
                    type: 'post',
                    data: {
                        msgTo: $id
                    },
                    success: function (data) {
                        $('.chat_middel').html(data);
                       // alert(data);
                        if (autoscroll){
                            scrolldwon();
                        }
                        $('.chat_middel').on('scroll',function () {

                            if ($(this).scrollTop()<this.scrollHeight-$(this).height()) {
                                autoscroll=false;
                            }else {
                                autoscroll=true;
                            }
                        }) ;



                    }
                }
            );
        };


        getmessages();
        $timer=setInterval(getmessages,5000);


        ///////////////////in vase inke har vaght ok zad scroll bechasbe be akhar
        autoscroll=true;
        scrolldwon=function(){
            $('.chat_middel').scrollTop($('.chat_middel')[0].scrollHeight);
        };
/////////////////////////////////





        $.ajax('/telegram/message/getInfo', {
                type: 'post',
                data: {
                    msgTo: $id
                },
                success: function (data) {
                    $(".chat_top").html(data);
                }
            }
        );

        $('#text').val("");

    });

    $(document).on('submit','#messageForm',function (e) {

       e.preventDefault();
        var form=new FormData ($(this)[0]);
        form.append('file', $('#file')[0].files[0]);

        //console.log($('#file')[0]);

        $.ajax('/telegram/message/sendMsg', {
                type: 'post',
                data: form,
                success: function () {
                    getmessages();
                    $('#text').val("");
                    $('#file').val(null);

                },
            cache:false,
            contentType:false,
            processData:false
            }
        );



        // getmessages=function () {
        //
        //     $.ajax('/telegram/message/getMessages', {
        //             type: 'post',
        //             data: {
        //                 msgTo: $id
        //             },
        //             success: function (data) {
        //                 $('.chat_middel').html(data);
        //                 alert(1);
        //                 if (autoscroll){
        //                     scrolldwon();
        //                 }
        //                 $('.chat_middel').on('scroll',function () {
        //
        //                     if ($(this).scrollTop()<this.scrollHeight-$(this).height()) {
        //                         autoscroll=false;
        //                     }else {
        //                         autoscroll=true;
        //                     }
        //                 }) ;
        //
        //             }
        //         }
        //     );
        // };


       // getmessages();
     //   $timer=setInterval(getmessages,5000);

        ///////////////////in vase inke har vaght ok zad scroll bechasbe be akhar
        autoscroll=true;
        scrolldwon=function(){
            $('.chat_middel').scrollTop($('.chat_middel')[0].scrollHeight);
        };
/////////////////////////////////

    });

    // autoscroll=true;
    // scrolldwon=function(){
    //     $('.chat_middel').scrollTop($('.chat_middel')[0].scrollHeight);
    // };
    //
    // getmessages=function () {
    //
    //     $.ajax('/telegram/message/getMessages', {
    //             type: 'post',
    //             data: {
    //                 msgTo: $id
    //             },
    //             success: function (data) {
    //                 $('.chat_middel').html(data);
    //
    //                 if (autoscroll){
    //                     scrolldwon();
    //                 }
    //                 $(document).on('scroll','.chat_middel',function () {
    //
    //                     if ($(this).scrollTop()<this.scrollHeight-$(this).height()) {
    //                         autoscroll=false;
    //                     }else {
    //                         autoscroll=true;
    //                     }
    //                 }) ;
    //
    //             }
    //         }
    //     );
    // };

$(document).on('keyup','.addNew',function () {

    var text=$(this).val();
var regex=/[a-z0-9A-Z]*$/;

var contemt=text.match(regex);

if (contemt != null && text.length>1){
    $.ajax('/telegram/message/search', {
            type: 'post',
            data: {
                search1: contemt[0]
            },
            success: function (data) {
               $('.result').show();
                $('.result').html(data);
            }
        }
    );
}else {
    $('.result').hide();

}

});

$(document).on('click','.search',function () {

    $id=$(this).data('id');

    $('.chat_bottom').html('<form id="messageForm" method="post" enctype="multipart/form-data">\n' +
        '            <ul>\n' +
        '                <li><label style=""><textarea id="text" name="text" style="padding-top:7px"></textarea></label></li>\n' +
        '                <li> <input value="upload" type="file" id="file" name="file" style="width: 20%"/></li>\n' +
        '                <li><input type="hidden" name="msgTo" value="'+$id+'"></li>\n' +
        '                <li><input type="submit" class="btn" value="send" id="send" name="submit"></li>\n' +
        '            </ul>\n' +
        '            </form>');
    if (typeof $timer !== 'undefined') {
        clearInterval($timer);
    }
    $timer=setInterval(getmessages,5000);


    $.ajax('/telegram/message/getInfo', {
            type: 'post',
            data: {
                msgTo: $id
            },
            success: function (data) {
                $(".chat_top").html(data);
            }
        }
    );
    getmessages();
    $('#text').val("");

});

    $(document).on('click','.nav',function () {
        $('.nav1').toggleClass('active');
        $('.nav1').toggleClass('inactive');
    });


    notification=function () {

        $.ajax('/telegram/message/notification', {
                type: 'post',
                success: function (data) {
                    $(".chat_top").html(data);
                }
            }
        );

    };


});