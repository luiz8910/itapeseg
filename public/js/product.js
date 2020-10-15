$(function (){


    $("#form").submit(function (e){
        if($(".radio").is(':checked').length == 0)
        {
            e.preventDefault();

            sweet_alert_error('Escolha uma categoria para continuar');
        }
    });

    $(".radio_active").click(function (){

        var id = $(this)[0].id;

        if(id == "rad_inactive")
            $("#rad_active").prop('checked', false);

        else
            $("#rad_inactive").prop('checked', false);


    });

    $(".radio").click(function (){

        var id = this.id.replace('rad_', '');

        $("#category_id").val(id);

        for (var i = 0; i < $(".radio").length; i++)
        {
            var _id = $(".radio")[i].id;

            $("#"+_id).prop('checked', false);
        }

        $("#rad_"+id).prop('checked', true);

        console.log($("#category_id").val());
    });


    $("#category_select").change(function (){

        location.href = "/produtos/"+$(this).val();
    });
});

//Add or update product
function add_update($id)
{
    //If $id == true its update function, if not is add
}

function destroy($id)
{
    var data = {
        title: 'Atenção',
        text: 'Você deseja excluir este produto?',
        button: 'Excluir',
        success_msg: 'O produto foi excluído com sucesso',
        reload: false,
        id: $id
    };


    var ajax = {
        url: '/produto/' + $id,
        method: 'DELETE',
        dataType: 'json'
    };

    sweet_alert(data, ajax);
}

function activate($id)
{
    var data = {
        title: 'Atenção',
        text: 'Você deseja reativar este produto?',
        button: 'Reativar',
        success_msg: 'O produto foi reativado com sucesso',
        reload: false,
        id: $id
    }

    var ajax = {
        url: '/activate/' + $id,
        method: 'GET',
        dataType: 'json'
    };

    sweet_alert(data, ajax);
}

function destroy_category($id)
{
    var data = {
        title: 'Atenção',
        text: 'Você deseja excluir esta categoria?',
        button: 'Excluir',
        success_msg: 'A categoria foi excluído com sucesso',
        reload: false,
        id: $id
    };


    var ajax = {
        url: '/categoria/' + $id,
        method: 'DELETE',
        dataType: 'json'
    };

    sweet_alert(data, ajax);
}
