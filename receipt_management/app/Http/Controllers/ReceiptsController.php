<?php

namespace App\Http\Controllers;

use App\Models\Receipts;
use Illuminate\Http\Request;

class ReceiptsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('receipt.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'length' => 'required'
        ]);

        $receipt = new Receipts();
        $receipt->length = $request->length;
        $receipt->save();

        return redirect(route('top'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Receipts  $receipts
     * @return \Illuminate\Http\Response
     */
    public function show(Receipts $receipts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Receipts  $receipts
     * @return \Illuminate\Http\Response
     */
    public function edit(Receipts $receipts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Receipts  $receipts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receipts $receipts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Receipts  $receipts
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receipts $receipts)
    {
        //
    }
}
