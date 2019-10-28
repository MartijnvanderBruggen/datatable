$(function() {
    $('#auctions-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route("auctions.data") !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'description', name: 'description' },
        ],
    });
});
