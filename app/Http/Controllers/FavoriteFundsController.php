<?php

namespace App\Http\Controllers;

use App\Models\UserFunds;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Fund;
use Yajra\DataTables\Facades\Datatables;




class FavoriteFundsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
 
    if ($request->ajax()) {

    $funds = Fund::join('fund_categories', 'fund_categories.id', '=', 'funds.fundCategoryID')
    ->join('fund_sub_categories', 'fund_sub_categories.id', '=', 'funds.fundSubCategoryID')
    ->join('user_funds', 'user_funds.fundID','=','funds.id')
    ->where('user_funds.userID', '=', auth()->id())
     ->select('user_funds.id','funds.name','fund_categories.name AS categoryName','fund_sub_categories.name AS subCategoryName','funds.ISIN','funds.WKN');
        return Datatables::of($funds)
         ->addIndexColumn()
         ->addColumn('action', function($row){
             $actionBtn = '<button class="delete btn btn-success btn-sm" name="delete" id="'.$row->id.'">Remove from favorites</button> ';
             return $actionBtn;
         })
         ->rawColumns(['action'])
         ->make(true);
        } 
        return view('favorites');
        
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
      $validator = Validator::make($request->all(), [
          'fundID'=>'required',
        ]);

        if ($validator->fails())
            return response()->json($validator->errors());

        $favFund = UserFunds::create([
   'fundID' => $request->fundID,
  'userID' =>  Auth::user()->id,
        ]);

        return response()->json(['success'=>true, 'fundID'=>$request->fundID]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserFunds  $userFunds
     * @return \Illuminate\Http\Response
     */
    public function show(UserFunds $userFunds)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserFunds  $userFunds
     * @return \Illuminate\Http\Response
     */
    public function edit(UserFunds $userFunds)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserFunds  $userFunds
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserFunds $userFunds)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserFunds  $userFunds
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $favFundID)
    {
        $favFund=UserFunds::find($favFundID);
        if(is_null($favFund)){
            return response()->json('Not found', 404);      }
            
        $favFund->delete();

        return response()->json(['success'=>true]);
    }
}
