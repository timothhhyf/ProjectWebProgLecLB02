<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    //
    public function createTransView(){
        $categories = Category::all();
        return view('addtransaction', ['categories' => $categories]);
    }

    public function createTransaction(Request $request){
        $newTrans = new Transaction();

        $category = $request->category;
        $date = $request->date;
        $description = $request->description;
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
        $newTrans->user_id = Auth::user()->id;
        $newTrans->date = $date;
        $newTrans->description = $description;
        $newTrans->price = $nominal;

        $newTrans->save();
        return redirect('/transactions');
    }

    public function editTransView(Request $request){
        $trans = Transaction::find($request->id);
        return view();
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
        return redirect('/transactions');
    }

    public function index(){
        $transactions = Transaction::with('user')->get();
        // $users = User::with('transactions')->get();
        $categories = Category::all();

        return view('viewtransaction', [
            "transactions" => $transactions,
            // "users" => $users,
            "categories" => $categories
        ]);
    }

    public function show(Request $request)
    {
        $category = Category::find($request->category);
        $transactions = Transaction::where('category_id', 'LIKE', "$request->category")->orderBy('date','desc')->get();
        return view('transpercat', ['transactions' => $transactions, 'category' => $category]);
    }
}
