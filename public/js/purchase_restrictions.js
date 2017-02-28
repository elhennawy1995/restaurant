var table = $('#suppliers_purchase_period_table');
table.on('click', '.delete', function (e) {
            e.preventDefault();
            var id = $(this).parents('tr')[0].id;
            var tr=$(this).parents('tr')[0];
            deleteRestriction(id,tr);
        });
function deleteRestriction(id,tr)
{
    $.ajaxSetup({
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
    });
    $.ajax({
            type:'DELETE',
            url:'/supplier-purchase-period/'+id,
            success:function(data){
                tr.remove();
            },
            error:function(data){
                console.log(data);
            }
    });
}

