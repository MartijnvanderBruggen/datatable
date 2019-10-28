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
        console.log(data);
        $('#auctions-table').click('#edit-'+ data.id, function(){
            console.log('clicked');
        });
    </script>
@endpush
