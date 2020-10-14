$(function (){


    $("#form").submit(function (e){
        if($(".radio").is(':checked').length == 0)
        {
            e.preventDefault();

            sweet_alert_error('Escolha uma categoria para continuar');
        }
    });

    $(".radio_active").click(function (){
        if($(this).is(":checked"))
        {

        }

        console.log($(".radio_active"));
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
