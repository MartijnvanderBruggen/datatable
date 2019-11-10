@extends('layouts.master')

@section('content')
<div class="user-table"></div>
@stop

@push('scripts')
<script src="{{asset('js/administration/admin-datatable.js')}}"></script>
@endpush
