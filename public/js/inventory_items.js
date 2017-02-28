var table = $('#inventory_items_table');
table.on('click', '.delete', function (e) {
            e.preventDefault();
            var id = $(this).parents('tr')[0].id;
            var tr=$(this).parents('tr')[0];
            deleteInventoryItem(id,tr);
        });
// table.on('click', '.edit', function (e) {
//             e.preventDefault();
//             var id = $(this).parents('tr')[0].id;
//             editItem(id);
//         });
// function editItem(id)
// {
//      $.ajax({
//             type:'GET',
//             url:'/menu/'+id+'/edit',
//             success:function(data){
//                 $('#add_menu_item').replaceWith(data);
//             },
//             error:function(data){
//                 console.log(data);
//             }
//     });
// }

function deleteInventoryItem(id,tr)
{
    $.ajaxSetup({
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
    });
    $.ajax({
            type:'DELETE',
            url:'/inventory/'+id,
            success:function(data){
                tr.remove();
            },
            error:function(data){
                console.log(data);
            }
    });
}

