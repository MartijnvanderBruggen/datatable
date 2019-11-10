$(document).ready(function(){
    $('#user-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '/admin.data',
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
        ]
    });
});
