@extends('layouts.master')

@section('content')
<div id="app">
    <select-category>

    </select-category>
    <table class="table table-bordered" id="auctions-table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Image</th>
            <th>Description</th>
            <th>actions</th>
        </tr>
        </thead>
    </table>
    <!-- Button trigger modal -->
</div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form role="form" id="auction-form">
                        <div class="form-group">
                            <label>ID</label>
                            <input type="text" class="form-control" name="id" id="id" placeholder=""/>
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control"
                                   id="name" name="name" placeholder="Auction name"/>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <input type="text" class="form-control" id="description" name="description"
                                   placeholder="Description"/>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="update-auction" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@stop

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script>
        //on documentload, load datatable

        $(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#auctions-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('auctions.data') !!}',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'images.image_path', render: function ( data, type, row ) {
                        var rdata = '';
                        for(var i = 0; i < row.images.length;i++){

                             rdata += '<img src="'+ row.images[i].image_path+'"/><br>';
                        }
                        return rdata;

                        }},
                    {data: 'description', name: 'description'},
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
    </script>
@endpush
