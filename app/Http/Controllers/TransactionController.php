<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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
        $categories = Category::all();
        return view('edittransaction', ['transaction' => $trans, 'categories' => $categories]);
    }

    public function editTransaction(Request $request){
        $trans = Transaction::find($request->id);

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

        $trans->category_id = $category;
        $trans->date = $date;
        $trans->description = $description;
        $trans->price = $nominal;

        $trans->save();
        return redirect('/transactions');
    }

    public function deleteTransaction(Request $request){
        $trans = Transaction::find($request->id);
        $trans->delete();
        return redirect('/transactions');
    }

    public function index(){
        $transactions = Transaction::where('user_id', 'LIKE', Auth::user()->id)->get();
        $categories = Category::all();
        $expense = 0;
        foreach($transactions as $t){
            if(Carbon::parse($t->date)->month == Carbon::now()->month){
                $expense += $t->price;
            }
        }

        return view('viewtransaction', [
            "transactions" => $transactions,
            "categories" => $categories,
            'expense' => $expense
        ]);
    }

    public function show(Request $request){
        $category = Category::find($request->category);
        $transactions = Transaction::where('category_id', 'LIKE', "$request->category")->orderBy('date','desc')->get();
        return view('transpercat', ['transactions' => $transactions, 'category' => $category]);
    }

    public function sortLatest(){
        $transactions = Transaction::orderBy('date', 'desc')->get();
        $categories = Category::all();
        return view('viewtransaction', ['transactions' => $transactions, 'categories' => $categories]);
    }

    public function sortOldest(){
        $transactions = Transaction::orderBy('date', 'asc')->get();
        $categories = Category::all();
        return view('viewtransaction', ['transactions' => $transactions, 'categories' => $categories]);
    }

    public function searchTransaction(Request $request){
        $transactions = Transaction::where('description', 'LIKE', "$request->description%")->get();
        $categories = Category::all();
        return view('viewtransaction', ['transactions' => $transactions, 'categories' => $categories]);
    }
}
