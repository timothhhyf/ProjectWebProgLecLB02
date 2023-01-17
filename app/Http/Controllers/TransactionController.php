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

    public function index(){
        $transactions = Transaction::with('user')->get();
        $users = User::with('transactions')->get();
        $categories = Category::all();

        return view('transaction', [
            "transactions" => $transactions,
            "users" => $users,
            "categories" => $categories
        ]);
    }

    public function show(Request $request)
    {
        $transactions = Transaction::where('category_id', 'LIKE', "$request->id")->orderBy('date','desc');
        return view('transpercat', ['transactions', $transactions]);
    }
}
