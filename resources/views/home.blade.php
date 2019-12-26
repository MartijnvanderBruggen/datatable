@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Latest Changes to auctions...</div>

                <div class="card-body">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <message></message>

                </div>
            </div>
            <div class="card">
                <div class="card-header">New Auctions!</div>

                <div class="card-body">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <message></message>

                </div>
            </div>
        </div>
    </div>
</div>


@endsection
@modal
@endmodal
@push('scripts')
    <script>
        $("#save-auction").click((e) => {
            //@todo:validate
            let formValues = $("#create-auction").serialize();
            axios.post('/auctions',formValues).then(function(response){
                console.log(response);
            }).catch(function(error){
                console.log(error);
            });
        });
    </script>

@endpush
