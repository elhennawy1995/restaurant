var table = $('#suppliers_table');
table.on('click', '.delete', function (e) {
            e.preventDefault();
            var id = $(this).parents('tr')[0].id;
            var tr=$(this).parents('tr')[0];
            deleteItem(id,tr);
        });
function deleteItem(id,tr)
{
    $.ajaxSetup({
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
    });
    $.ajax({
            type:'DELETE',
            url:'/suppliers/'+id,
            success:function(data){
                tr.remove();
            },
            error:function(data){
                console.log(data);
            }
    });
}

