function sweet_alert_error($msg, $timer) {
    var msg = $msg ? $msg : 'Um erro desconhecido ocorreu, tente novamente mais tarde';

    swal(msg, {
        icon: 'error',
        timer: $timer ? $timer : 3000
    });
}

function sweet_alert_success($msg, $timer) {
    var msg = $msg ? $msg : 'Sucesso';

    swal(msg, {
        icon: 'success',
        timer: $timer ? $timer : 3000
    });
}

function validateEmail($email)
{
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test($email);
}
