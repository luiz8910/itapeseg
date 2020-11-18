$(function (){

    $("#segment_id").change(function (){
        if($(this).val() == 0)
            location.href = '/marcas';
        else
            location.href = "/marcas/"+$(this).val();
    });

    $("#status").change(function (){
        if($(this).val() != "")
            location.href = '/marcas/' + null + '/' + $(this).val();
        else
            location.href = '/marcas';
    });
});

function destroy($id)
{
    var data = {
        title: 'Atenção',
        text: 'Você deseja excluir esta marca?',
        button: 'Excluir',
        success_msg: 'A marca foi excluída com sucesso',
        reload: false,
        id: $id
    };


    var ajax = {
        url: '/brand/' + $id,
        method: 'DELETE',
        dataType: 'json'
    };

    sweet_alert(data, ajax);
}
