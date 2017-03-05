<?php

namespace App\Http\Controllers;
use App\Http\Requests\PurchaseRestrictionRequest;
use App\PurchaseRestriction;
use App\TimeUnit;
use App\User;
use Auth;
use Illuminate\Http\Request;

class PurchaseRestrictionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurant = User::find(Auth::user()->id)->restaurant()->get()->first();
        $budget = '';
        $suppliers ='';
        if($restaurant)
        {
            $budget = $restaurant->purchase_restriction()->get()->first();
            $suppliers = $restaurant->suppliers()->with('restriction_period.period_unit')->get();
            // dd($suppliers);
        }
        $units = TimeUnit::all();
        return view('purchase.index')->with('restaurant',$restaurant)
                                    ->with('budget',$budget)
                                    ->with('suppliers',$suppliers)
                                    ->with('units',$units);
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
    public function store(PurchaseRestrictionRequest $request)
    {
        if( PurchaseRestriction::create($request->all()) )
            return redirect()->back();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $purchase_restriction = PurchaseRestriction::find($id);
        if($purchase_restriction->update($request->all()))
        {
            if(!$request->has('active'))
                $purchase_restriction->update(['active'=>0]);
            return redirect()->back();
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
