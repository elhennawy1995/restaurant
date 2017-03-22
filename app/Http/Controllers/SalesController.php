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
        // dd(request()->filter);
        // $start = Carbon::now()->toDateTimeString();
        // $end = Carbon::now()->endOfWeek()->toDateTimeString();
        if(isset(request()->filter)&&request()->filter=="weekly")
        {
            // $start = Carbon::now()->startOfMonth();
            // $start = $start->toDateTimeString();
            // $end = Carbon::now()->endOfMonth();
            // $end = $end->toDateTimeString();
            // dd($start,$end);
            $start = "2017-01-01 00:00:00";
            $end = "2017-01-31 23:59:59";
            $result = Sale::select(\DB::raw('item_name ,SUM(total) ,week(line_item_date) as week'))->whereBetween('line_item_date',[$start,$end])->groupBy('item_name','week')->get()->toArray();
            // dd($result);
            $categories = ['week-1','week-2','week-3','week-4'];
            $values=[];
            $data = '[';
            foreach ($result as $item) {
                $data .="{showInLegend: false, name:'".$item['item_name']."',data:[";
                    foreach ($categories as $key => $value) {
                        if($item['week']==$key+1)
                            $values[$key] = $item['SUM(total)'];
                        else
                            $values[$key] = 0; 
                    }
                $data.=implode(",",$values)."]}," ;
            }
            $data .="]";
            return [json_encode($data),$categories];
        }
        else
        {
                $start = new Carbon('first day of January');
                $start = $start->toDateTimeString();
                $end = new Carbon('last day of January');
                $end = $end->toDateTimeString();
                // dd($start,$end);
                // $result = Sale::select(\DB::raw('item_name ,SUM(total) '))->whereBetween('line_item_date',[$start,$end])->groupBy('item_name')->orderBy('SUM(total)','DESC')->limit(3)->get()->toArray();
                $result = Sale::select(\DB::raw('item_name ,SUM(total) ,concat( MONTH(line_item_date) ,"-",YEAR(line_item_date) ) as date'))->groupBy('item_name','date')->get()->toArray();
                // dd($result);
                $categories=[];
                foreach ($result as $item) {
                    if(!in_array($item['date'], $categories))
                        $categories [] = $item['date'];
                }
                $data = '[';
                $values= [];
                foreach ($result as $item) {
                    $data .="{showInLegend: false, name:'".$item['item_name']."',data:[";
                    foreach ($categories as $key => $value) {
                        if($value == $item['date'])
                            $values[$key]=$item['SUM(total)'];
                        else
                            $values[$key]=0;
                    }    
                    $data.=implode(",",$values)."]}," ;
                }
                $data .="]";
                // dd($data);

                return [json_encode($data),$categories];
        }
    }
    public function quick_stats()
    {
        if(isset(request()->filter)&&request()->filter=="weekly")
        {
            $start = Carbon::now()->startOfWeek();
            $start = $start->toDateTimeString();
            $end = Carbon::now()->endOfWeek();
            $end = $end->toDateTimeString();
            $start = "2017-01-01 00:00:00";
            $end = "2017-01-07 23:59:59";
            $result = Sale::select(\DB::raw('item_name ,SUM(total) as total '))->whereBetween('line_item_date',[$start,$end])->groupBy('item_name')->orderBy('total','DESC')->get()->toArray();
            $data = [];
            array_push($data, end($result));
            array_push($data, reset($result));
            $result = Sale::select(\DB::raw('SUM(total) as total'))->whereBetween('line_item_date',[$start,$end])->get()->toArray();
            array_push($data, reset($result));

            return $data;
        }
        else
        {
            $start = new Carbon('first day of January');
            $start = $start->toDateTimeString();
            $end = new Carbon('last day of January');
            $end = $end->toDateTimeString();
            // dd($start,$end);
            // $result = Sale::select(\DB::raw('item_name ,SUM(total) as total '))->whereBetween('line_item_date',[$start,$end])->groupBy('item_name')->orderBy('total','DESC')->get()->toArray();
            $result = Sale::select(\DB::raw('item_name ,SUM(total) as total '))->groupBy('item_name')->orderBy('total','DESC')->get()->toArray();
            $data = [];
            array_push($data, end($result));
            array_push($data, reset($result));
            $result = Sale::select(\DB::raw('SUM(total) as total'))->get()->toArray();
            array_push($data, reset($result));

            return $data;
        }
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
        // $result = Sale::select(\DB::raw('SUM(total) as total, MONTH(line_item_date) as month'))->whereYear('line_item_date', '=','2017')->groupBy('month')->get()->toArray();
        // $data = [0,0,0,0,0,0,0,0,0,0,0,0];
        // foreach ($result as $row) {
        //     $data[$row['month']-1] = $row['total'];
        // }
        // return $data;
        if(isset(request()->filter)&&request()->filter=="weekly")
        {   
            $start = Carbon::now()->startOfMonth();
            $start = $start->toDateTimeString();
            $end = Carbon::now()->endOfMonth();
            $end = $end->toDateTimeString();
            $start = "2017-01-01 00:00:00";
            $end = "2017-01-31 23:59:59";
            $result = Sale::select(\DB::raw('SUM(total) as total, week(line_item_date) as week_number
            '))->whereBetween('line_item_date',[$start,$end])->groupBy('week_number')
              ->get()->toArray();
            $data['categories']=[];
            $data['data']=[];
            foreach ($result as $row) {
                // $data['categories'] = $row['total'];
                array_push($data['categories'], "week-".$row['week_number']);
                array_push($data['data'], $row['total']);
            }
            return $data;
        }
        else
        {
            $result = Sale::select(\DB::raw('SUM(total) as total, MONTH(line_item_date) as month,
            YEAR(line_item_date) as year'))->groupBy('month')->groupBy('year')->orderby('year','ASC')->get()->toArray();
            $data['categories']=[];
            $data['data']=[];
            foreach ($result as $row) {
                // $data['categories'] = $row['total'];
                array_push($data['categories'], $row['month']."-".$row['year']);
                array_push($data['data'], $row['total']);
            }
            return $data;
        }
        
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
