<?php

namespace App\Http\Controllers;

use App\Sale;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Excel;

class SalesController extends Controller
{

    public function top_items()
    {
        // $start = Carbon::now()->toDateTimeString();
        // $end = Carbon::now()->endOfWeek()->toDateTimeString();
        $start = new Carbon('first day of January');
        $start = $start->toDateTimeString();
        $end = new Carbon('last day of January');
        $end = $end->toDateTimeString();
        // dd($start,$end);
        $result = Sale::select(\DB::raw('item_name ,SUM(total) '))->whereBetween('line_item_date',[$start,$end])->groupBy('item_name')->orderBy('SUM(total)','DESC')->limit(3)->get()->toArray();
        $data = '[';
        foreach ($result as $item) {
            $data .="{name:'".$item['item_name']."',data:[".$item['SUM(total)']."]}," ;
        }
        $data .="]";
        return json_encode($data);
    }
    public function quick_stats()
    {
        $start = new Carbon('first day of January');
        $start = $start->toDateTimeString();
        $end = new Carbon('last day of January');
        $end = $end->toDateTimeString();
        // dd($start,$end);
        $result = Sale::select(\DB::raw('item_name ,SUM(total) as total '))->whereBetween('line_item_date',[$start,$end])->groupBy('item_name')->orderBy('total','DESC')->get()->toArray();
        $data = [];
        array_push($data, end($result));
        array_push($data, reset($result));
        $result = Sale::select(\DB::raw('SUM(total) as total'))->whereBetween('line_item_date',[$start,$end])->get()->toArray();
        array_push($data, reset($result));

        return $data;
    }


    public function import_data()
    {
        $count = 0;
        Excel::load('LineItems-20170309_0032_CST.csv', function($reader) use ($count){
                // Getting all results
                $result = $reader->get()->toArray();
                foreach ($result as $row) {
                    $row['line_item_date'] = Carbon::parse($row['line_item_date'])->toDateTimeString();
                    if(Sale::create($row))
                    {
                        $count++;
                    }
                }
                echo $count." records has been added";
        });
    }
    
    public function forecast()
    {
        $result = Sale::select(\DB::raw('SUM(total) as total, MONTH(line_item_date) as month'))->whereYear('line_item_date', '=','2017')->groupBy('month')->get()->toArray();
        $data = [0,0,0,0,0,0,0,0,0,0,0,0];
        foreach ($result as $row) {
            $data[$row['month']-1] = $row['total'];
        }
        return $data;
    }
        

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
        //
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
