@extends('layouts.master')

@section('content')
    <table class="table table-bordered" id="auctions-table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Description</th>
            <th>actions</th>
        </tr>
        </thead>
    </table>
    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form role="form">
                        <div class="form-group">
                            <label>ID</label>
                            <input type="text" class="form-control" id="id" placeholder=""/>
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control"
                                   id="name" placeholder="Auction name"/>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <input type="text" class="form-control" id="description" placeholder="Description"/>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@stop

@push('scripts')
    <script>
        $(function() {
            $('#auctions-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('auctions.data') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'description', name: 'description' },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ]
            });
        });
        $("#exampleModal").on("show.bs.modal", function(e) {
            id = $(e.relatedTarget).data("id");
            url = "auctions/"+id;
            let that = $(this);
            $.ajax({
                cache: false,
                type: 'get',
                url: url,
                data:  { 'id': id },
                success: function(data) {
                    $('input#id').val(data.id);
                    $('input#name').val(data.name);
                    $('input#description').val(data.description);
                }
            });
        });
    </script>
@endpush
