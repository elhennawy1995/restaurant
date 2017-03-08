var UserDatatablesEditable = function () {

    var handleUsersTable = function () {

        function restoreRow(oTable, nRow) {
            var aData = oTable.fnGetData(nRow);
            var jqTds = $('>td', nRow);

            for (var i = 0, iLen = jqTds.length; i < iLen; i++) {
                oTable.fnUpdate(aData[i], nRow, i, false);
            }

            oTable.fnDraw();
        }

        function editRow(oTable, nRow) {
            var aData = oTable.fnGetData(nRow);
            var jqTds = $('>td', nRow);
            jqTds[0].innerHTML = '<input type="text" class="form-control input-small" value="' + aData[0] + '">';
            jqTds[1].innerHTML = '<input type="text" class="form-control input-small" value="' + aData[1] + '">';
            jqTds[2].innerHTML = '<a class="update" href="">Update</a>';
            jqTds[3].innerHTML = '<a class="cancel" href="">Cancel</a>';
        }
        function newRow(oTable, nRow) {
            var aData = oTable.fnGetData(nRow);
            var jqTds = $('>td', nRow);
            jqTds[0].innerHTML = '<input type="text" class="form-control input-small" value="' + aData[0] + '">';
            jqTds[1].innerHTML = '<input type="text" class="form-control input-small" value="' + aData[1] + '">';
            jqTds[2].innerHTML = '<a class="edit" href="">Save</a>';
            jqTds[3].innerHTML = '<a class="cancel" href="">Cancel</a>';
        }

        function saveRow(oTable, nRow) {
            var jqInputs = $('input', nRow);
            $.ajaxSetup({
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            var formData = {
                name: jqInputs[0].value,
                email: jqInputs[1].value,
                restaurant_id: $('#restaurant_id').val(),
            };
            $.ajax({
                type:'POST',
                url:'/user',
                data: formData,
                success:function(data){
                    console.log(data);
                    var jqInputs = $('input', nRow);
                    oTable.fnUpdate(jqInputs[0].value, nRow, 0, false);
                    oTable.fnUpdate(jqInputs[1].value, nRow, 1, false);
                    oTable.fnUpdate('<a class="edit" href="">Edit</a>', nRow, 2, false);
                    oTable.fnUpdate('<a class="delete" href="">Delete</a>', nRow, 3, false);
                    oTable.fnDraw();
                },
                error:function(data){
                    var msg = JSON.parse(data.responseText);
                    alert(msg.email[0]);
                    // console.log();
                    oTable.fnDeleteRow(nRow); // cancel
                    // nEditing = null;
                    // nNew = false;(oTable, nRow);
                    // $('input .cancel').trigger('click');
                    // $('.cancel').trigger('click');
                }
            });
            
        }
        function updateRow(oTable, nRow,id) {
            var jqInputs = $('input', nRow);
            $.ajaxSetup({
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            var formData = {
                name: jqInputs[0].value,
                email: jqInputs[1].value,
            };
            $.ajax({
                type:'PUT',
                url:'/user/'+id,
                data:formData,
                success:function(data){
                    console.log(data);
                },
                error:function(data){
                    console.log(data);
                }
            });
            oTable.fnUpdate(jqInputs[0].value, nRow, 0, false);
            oTable.fnUpdate(jqInputs[1].value, nRow, 1, false);
            oTable.fnUpdate('<a class="edit" href="">Edit</a>', nRow, 2, false);
            oTable.fnUpdate('<a class="delete" href="">Delete</a>', nRow, 3, false);
            oTable.fnDraw();
        }
        function deleteUser(id) {
            $.ajaxSetup({
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            $.ajax({
                type:'DELETE',
                url:'/user/'+id,
                success:function(data){
                    console.log(data);
                },
                error:function(data){
                    console.log(data);
                }
            });
        }
        function cancelEditRow(oTable, nRow) {
            var jqInputs = $('input', nRow);
            oTable.fnUpdate(jqInputs[0].value, nRow, 0, false);
            oTable.fnUpdate(jqInputs[1].value, nRow, 1, false);
            oTable.fnUpdate('<a class="edit" href="">Edit</a>', nRow, 2, false);
            oTable.fnDraw();
        }

        var table = $('#user_editable_table');

        var oTable = table.dataTable({

            // Uncomment below line("dom" parameter) to fix the dropdown overflow issue in the datatable cells. The default datatable layout
            // setup uses scrollable div(table-scrollable) with overflow:auto to enable vertical scroll(see: assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js). 
            // So when dropdowns used the scrollable div should be removed. 
            //"dom": "<'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r>t<'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",

            "lengthMenu": [
                [5, 15, 20, -1],
                [5, 15, 20, "All"] // change per page values here
            ],

            // Or you can use remote translation file
            //"language": {
            //   url: '//cdn.datatables.net/plug-ins/3cfcc339e89/i18n/Portuguese.json'
            //},

            // set the initial value
            "pageLength": 5,

            "language": {
                "lengthMenu": " _MENU_ records"
            },
            "columnDefs": [{ // set default column settings
                'orderable': true,
                'targets': [0]
            }, {
                "searchable": true,
                "targets": [0]
            }],
            "order": [
                [0, "asc"]
            ] // set first column as a default sort by asc
        });

        // var tableWrapper = $("#sample_editable_1_wrapper");

        var nEditing = null;
        var nNew = false;

        $('#user_editable_table_new').click(function (e) {
            e.preventDefault();

            if (nNew && nEditing) {
                if (confirm("Previose row not saved. Do you want to save it ?")) {
                    saveRow(oTable, nEditing); // save
                    $(nEditing).find("td:first").html("Untitled");
                    nEditing = null;
                    nNew = false;

                } else {
                    oTable.fnDeleteRow(nEditing); // cancel
                    nEditing = null;
                    nNew = false;
                    
                    return;
                }
            }

            var aiNew = oTable.fnAddData(['', '', '', '', '', '']);
            var nRow = oTable.fnGetNodes(aiNew[0]);
            newRow(oTable, nRow);
            nEditing = nRow;
            nNew = true;
        });
        table.on('click', '.update', function (e) {
            e.preventDefault();
            nNew = false;
            /* Get the row as a parent of the link that was clicked on */
            var nRow = $(this).parents('tr')[0];
            var id = $(this).parents('tr')[0].id;
            updateRow(oTable, nRow,id);
        });

        table.on('click', '.delete', function (e) {
            e.preventDefault();

            if (confirm("Are you sure to delete this row ?") == false) {
                return;
            }
            var nRow = $(this).parents('tr')[0];
            var id = $(this).parents('tr')[0].id;
            oTable.fnDeleteRow(nRow);
            deleteUser(id);
        });

        table.on('click', '.cancel', function (e) {
            e.preventDefault();
            if (nNew) {
                oTable.fnDeleteRow(nEditing);
                nEditing = null;
                nNew = false;
            } else {
                restoreRow(oTable, nEditing);
                nEditing = null;
            }
        });

        table.on('click', '.edit', function (e) {
            e.preventDefault();
            nNew = false;
            
            /* Get the row as a parent of the link that was clicked on */
            var nRow = $(this).parents('tr')[0];

            if (nEditing !== null && nEditing != nRow) {
                /* Currently editing - but not this row - restore the old before continuing to edit mode */
                restoreRow(oTable, nEditing);
                editRow(oTable, nRow);
                nEditing = nRow;
            } else if (nEditing == nRow && this.innerHTML == "Save") {
                /* Editing this row and want to save it */
                saveRow(oTable, nEditing);
                nEditing = null;
                // alert("Updated! Do not forget to do some ajax to sync with backend :)");
            } else {
                /* No edit in progress - let's start one */
                editRow(oTable, nRow);
                nEditing = nRow;
            }
        });
    }

    return {

        //main function to initiate the module
        init: function () {
            handleUsersTable();
        }

    };

}();

jQuery(document).ready(function() {
    UserDatatablesEditable.init();
});