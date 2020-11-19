$(function (){

    $("#btn_submit").click(function (){

        var name = $("#name").val();
        var email = $("#email").val();
        var phone = $("#phone").val();
        var message = $("#message").val();

        var stop = false;

        if(name == "")
        {
            $("#lbl_name").css('display', 'block');
            stop = true;
        }

        if(email == "")
        {
            $("#lbl_email").css('display', 'block');
            stop = true;
        }

        if(message == "")
        {
            $("#lbl_message").css('display', 'block');
            stop = true;
        }

        if(stop)
            return;

        $(".lbl").css('display', 'none');

        $("#btn_submit").css('display', 'none');

        $("#contact_form_message_box").css('display', 'block');

        $.ajax({
            url: '/contact',
            method: 'POST',
            dataType: 'json',
            data:{
                'name': name,
                'email': email,
                'phone': phone ?? '',
                'message': message
            },
            success: function (e){
                if(e.status)
                    sweet_alert_success('Sua mensagem foi enviada');

                else
                    sweet_alert_error();

            },
            fail: function (e){
                console.log('fail', e);
            }
        }).always(function (){
            $(".input_contact").val('');
            $("#btn_submit").css('display', 'block');
            $("#contact_form_message_box").css('display', 'none');
        });

    });
})
