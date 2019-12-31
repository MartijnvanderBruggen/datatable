@extends('layouts.master')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-2 mb-2">
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

@endsection

