<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    //
    public function createTransaction(Request $request){
        $newTrans = new Transaction();

        $category = $request->category;
        $date = $request->date;
        $description - $request->description;
        $nominal = $request->nominal;

        $validation = [
            'category' => 'required',
            'date' => 'required',
            'description' => 'required',
            'nominal' => 'required | numeric'
        ];
        $validator = Validator::make($request->all(), $validation);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }

        $newTrans->category_id = $category;
        $newTrans->date = $date;
        $newTrans->description = $description;
        $newTrans->nominal = $nominal;

        $newTrans->save();
        return redirect('/');
    }

    public function editTransaction(Request $request){
        $trans = Transaction::find($request->id);

        $category = $request->category;
        $date = $request->date;
        $description - $request->description;
        $nominal = $request->nominal;

        $validation = [
            'category' => 'required',
            'date' => 'required',
            'description' => 'required',
            'nominal' => 'required | numeric'
        ];
        $validator = Validator::make($request->all(), $validation);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }

        $trans->category_id = $category;
        $trans->date = $date;
        $trans->description = $description;
        $trans->nominal = $nominal;

        $trans->save();
        return redirect('/');
    }

    public function deleteTransaction(Request $request){
        $trans = Transaction::find($request->id);
        $trans->delete();
        return redirect('/');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::with('user')->get();
        $users = User::with('transactions')->get();
        $categories = Category::all();

        return view('transaction', [
            "transactions" => $transactions,
            "users" => $users,
            "categories" => $categories
        ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);

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
