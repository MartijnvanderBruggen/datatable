@extends('layouts.master')

@section('content')
<table id="user-table">
    <thead>
    <tr>
        <th>Id</th>
        <th>Name</th>
    </tr>
    </thead>
</table>
@stop

@push('scripts')
<script src="{{asset('js/administration/admin-datatable.js')}}"></script>
@endpush
