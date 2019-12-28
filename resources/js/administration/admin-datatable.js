$(document).ready(function(){
    $('#user-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '/admin.data',
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name', render: function ( data, type, row ) {
                    return '<a class="show-user" data-user-id="'+row.id+'" href="javascript:;">'+row.name+'</a>';
                }},
        ],

    });



});


