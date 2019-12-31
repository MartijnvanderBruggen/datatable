$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#auctions-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: 'auctions.data',
        columns: [
            {data: 'id', name: 'id'},
            {data: 'images.image_path', render: function ( data, type, row ) {
                    var rdata = '';
                    for(var i = 0; i < row.images.length;i++){

                        rdata += '<img src="'+ row.images[i].image_path+'"/><br>';
                    }
                    return rdata;

                }},
            {data:'title', name:'title'},
            {data: 'description', name: 'description'},
            {data: 'price', name: 'price'},
            {data: 'duration', name: 'duration'},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });
    $(document).on('click', '.delete-auction', function (e) {

        let id = $(this).data("id");

        e.preventDefault();

        $.ajax({
            cache:false,
            type:'delete',
            url:'auctions/' + id,

            success: (data) => {
                Swal.fire({
                    "title": data
                });
                setTimeout(function () {
                    location.reload();
                }, 2000);
            }
        });
    });


    $("#exampleModal").on("show.bs.modal", function (e) {
        id = $(e.relatedTarget).data("id");
        url = "auctions/" + id;

        $.ajax({
            cache: false,
            type: 'get',
            url: url,
            data: {'id': id},
            success: function (data) {
                $('input#id').val(data.id);
                $('input#name').val(data.name);
                $('input#description').val(data.description);
            }
        });
    });
    $("#exampleModal").on("show.bs.modal", function (e) {

        $("#update-auction").click(function () {
            let data = $("#auction-form").serialize();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                cache: false,
                type: 'patch',
                url: "auctions/" + id,
                data: data,
                success: function (data) {
                    $("#exampleModal").hide();
                    Swal.fire({
                        "title": data
                    });
                    setTimeout(function () {
                        location.reload();

                    }, 2000);
                }
            });
        });
    });
    $("#save-auction").click((e) => {
        //@todo:validate
        console.log('test');
        let formValues = $("#create-auction").serialize();
        axios.post('/auctions', formValues).then(function (response) {
            $("#create-auction-modal").modal('hide');
            location.reload();
        }).catch(function (error) {

            console.log(error);
        });
    });
    $("#create-auction-button").on("click", function(e){
        e.preventDefault();
        $("#create-auction-modal").modal('show');
    });
});

