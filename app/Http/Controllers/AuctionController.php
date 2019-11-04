<?php

namespace App\Http\Controllers;

use App\Auction;
use App\Events\AuctionUpdatedEvent;
use App\Http\Requests\AuctionFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;

class AuctionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auction.index');
    }
    //processes ajax request from auction datatable.
    public function fetchData()
    {
        $auctions = Auction::query();

        return DataTables::of($auctions)->addColumn('action', function($auction){
                return '<a href="' . route('auctions.edit', $auction->id) .'" data-id="'.$auction->id.'" data-toggle="modal" data-target="#exampleModal" class="btn btn-default">Edit</a>';
        })->make(true);

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Auction  $auction
     * @return \Illuminate\Http\Response
     */
    public function show(Auction $auction)
    {
        return $auction;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Auction  $auction
     * @return \Illuminate\Http\Response
     */
    public function edit(Auction $auction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Auction  $auction
     * @return \Illuminate\Http\Response
     */
    public function update(AuctionFormRequest $request, Auction $auction)
    {
        try {
            $data = $request->validated();
            $auction->fill($data);
            $auction->save();
            event(new AuctionUpdatedEvent($auction));
            return response()->json('Auction updated!');
        } catch (\Exception $e) {
            Log::error('Auction not updated', ['error' => $e]);
        }
        return response()->json('something went wrong');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Auction  $auction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Auction $auction)
    {
        //
    }
}
