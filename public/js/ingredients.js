var table = $('#ingredient_items_table');
table.on('click', '.delete', function (e) {
            e.preventDefault();
            var id = $(this).parents('tr')[0].id;
            var tr=$(this).parents('tr')[0];
            deleteIngredient(id,tr);
        });
function deleteIngredient(id,tr)
{
    $.ajaxSetup({
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
    });
    $.ajax({
            type:'DELETE',
            url:'/ingredients/'+id,
            success:function(data){
                tr.remove();
            },
            error:function(data){
                console.log(data);
            }
    });
}

