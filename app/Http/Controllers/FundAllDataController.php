<?php

namespace App\Http\Controllers;

use App\Models\Fund;
use Illuminate\Http\Request;
use App\Http\Resources\FundAllDataResource;
use Yajra\DataTables\Facades\Datatables;


class FundAllDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
 if ($request->ajax()) {
$funds = Fund::join('fund_categories', 'funds.fundCategoryID', '=', 'fund_categories.id')
        ->join('fund_sub_categories', 'fund_sub_categories.id', '=', 'funds.fundSubCategoryID')
         ->select('funds.id','funds.name','fund_categories.name AS categoryName','fund_sub_categories.name AS subCategoryName','funds.ISIN','funds.WKN');
return Datatables::of($funds)
 ->addIndexColumn()
 ->addColumn('action', function($row){
     $actionBtn = '<button class="fav btn btn-success btn-sm" name="fav" id="'.$row->id.'">Add to favorites</button> ';
     return $actionBtn;
 })
 ->rawColumns(['action'])
 ->make(true);
} 
return view('dashboard');

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
     * @param  \App\Models\Fund  $fund
     * @return \Illuminate\Http\Response
     */
    public function show(Fund $fund)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fund  $fund
     * @return \Illuminate\Http\Response
     */
    public function edit(Fund $fund)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fund  $fund
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fund $fund)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fund  $fund
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fund $fund)
    {
        //
    }
}
