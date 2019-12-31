<?php

namespace App\Http\Controllers;

use App\Auction;
use App\Events\AuctionCreatedEvent;
use App\Events\AuctionUpdatedEvent;
use App\Http\Requests\AuctionFormRequest;
use http\Exception;
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
        $auctions = Auction::query()->with('images');


        return DataTables::of($auctions)->addColumn('action', function($auction){
            $return_data = '<a href="' . route('auctions.edit', $auction->id) .'" data-id="'.$auction->id.'" data-toggle="modal" data-target="#exampleModal" class="btn btn-default btn-info">Edit</a>';
            $return_data .= '<a href="javascript:;" data-id="'.$auction->id.'" class="delete-auction btn btn-default btn-danger">Delete</a>';
            return $return_data;
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
        $validated = $request->validate([
            'auction-title' => 'required',
            'auction-description' => 'required',
            'minimum-amount' => 'required|numeric',
            'auction-duration' => 'required|numeric',
        ]);

        $auction = Auction::create([
            'user_id' => auth()->user()->id,
            'category_id' => '1',
            'description' => $request['auction-description'],
            'title' =>$request['auction-title'],
            'price' => $request['minimum-amount'],
            'duration' => $request['auction-duration'],
        ]);
        event(new AuctionCreatedEvent($auction));
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
        try
        {
            $auction->delete();
            return response()->json('Auction deleted.');
        }
        catch(\Exception $e)
        {
            return response()->json('Something went wrong when deleting the auction');
        }
    }
}
