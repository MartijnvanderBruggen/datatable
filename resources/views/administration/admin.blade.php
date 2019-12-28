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
@user_modal
@enduser_modal
@push('scripts')
<script src="{{asset('js/administration/admin-datatable.js')}}"></script>
    <script>
        $(document).on('click', '.show-user', function (e) {
            e.preventDefault();
            var url = '/lalala/'+$(this).data('userId');

            $(".modal-body").load(url, function(data) {
                $("#part-time").val(data.part_time);
                $("#user-modal").modal("show");
            })
        });
        $(document).on('change','#full-time', function(){
           if($(this).is(':checked'))
           {
               $("#part-time").attr('style','display: hidden !important;');
               $(this).attr('value', true);
                console.log($(this).val());
           } else {
                $(this).attr('value', false);
                $("#part-time").attr('style','display: block !important;');
                console.log($(this).val());
            }
        });
    </script>
@endpush


