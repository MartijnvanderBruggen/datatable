@extends('layouts.master')

@section('content')

    <div id="user" hidden>{{auth()->user()}}</div>
    <select-category>

    </select-category>
    <div id="message"></div>
    <table class="table table-bordered" id="auctions-table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Image</th>
            <th>Title</th>
            <th>Description</th>
            <th>Current Offer</th>
            <th>Time left</th>
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

@stop
