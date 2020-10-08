$(function (){

    $("body").keyup(function (e){
        if(e.which === 13 && $("#email").is(':focus'))
            forgot_password();
    });
});

function forgot_password()
{
    var email = $("#email").val();

    if(email === "")
        sweet_alert_error('Preencha o campo email');

    else{

        if(validateEmail(email))
        {
            $(".progress-bar").css('display', 'block');//.addClass('progress-bar-animated');
            $(".progress").css('display', 'block');
            $("#forgot_password").css('display', 'none');

            $.ajax({
                url: '/send_link/' + email,
                method: 'GET',
                dataType: 'json',
                success: function (e){

                    $("#email").val('');
                    sweet_alert_success('Um email com instruções foi enviado para ' + email);

                },
                fail: function (e){
                    sweet_alert_error();
                    console.log('fail', e);
                }
            }).always(function (){
                $(".progress").css('display', 'none');
                $(".progress-bar").css('display', 'none');//.removeClass('progress-bar-animated');
                $("#forgot_password").css('display', 'inline-block');
            });

        }
        else
            sweet_alert_error("Preencha um email válido");

    }
}

function new_password()
{

}
