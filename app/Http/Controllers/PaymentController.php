<?php

namespace App\Http\Controllers;

use App\Models\Notifications;
use App\Models\Payment;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    //
    public function index(){
        if(auth()->guest()){
            return redirect('/login');
        }
        if(auth()->user()->is_admin == 0){
            abort(404);
        }
        $pay = Payment::with('Customer', 'Transaction')->orderBy('id','desc')->get()->where('status', 'Down Payment');
        $pay1 = Payment::with('Customer', 'Transaction')->orderBy('id','desc')->get()->where('status', 'Pending');
        return view('dashboard.payment.index', compact('pay','pay1'));
    }
    public function debt($id){
        // dd($id);
           if(auth()->guest()){
            return redirect('/login');
        }
        if(auth()->user()->is_admin == 0){
            abort(404);
        }
        $transaction = Transaction::where('id', $id)->with('Customer', 'Room')->first();
        return view('dashboard.order.payment', compact('transaction'));
    }

    public function pays(Request $request){
        $transaction = Transaction::where('id', $request->id)->first();
        $insufficient = $transaction->getTotalPrice() - $transaction->getTotalPayment();
        $request->validate([
            'payment' => 'required|numeric|lte:' . $insufficient
        ]);
        if(!empty($request->downPayment)){
            $price = $request->downPayment;
        } else {
            $price = $request->payment;
        }
        $count = Payment::count() + 1;
         Payment::create([
            'c_id' => $transaction->Customer->id,
            'transaction_id' => $transaction->id,
            'price' => $price,
            'invoice' => '0'. $request->customer. 'INV'. $count . Str::random(4),
            'status' => "Down Payment"
        ]);
        Alert::success('success', 'p');
        return redirect('/dashboard/order');

    }

    public function invoice($id, Request $request){
           if(auth()->guest()){
            return redirect('/login');
        }
        if(auth()->user()->is_admin == 0){
            abort(404);
        }
        if($request['nid']){
            $notif = Notifications::where('id', $request->nid)->first();
            $notif->status = 'read';
            $notif->read_at = Carbon::now();
            $notif->save();
        }
        $pay = Payment::where('id', $id)->first();
        return view('dashboard.payment.invoice', compact('pay'));

        // dd($pay);
    }

    public function confirmation(Request $request){
        $pay = Payment::findOrFail($request->id);
        $pay->update([
            'Status' => 'Down Payment'
        ]);
        Alert::success('Success', 'Payment Berhasil Di terima');
        return redirect('/dashboard/order/history-pay');
    }

    public function tolak(Request $request){
        $pay = Payment::findOrFail($request->id);
        $image = $pay->image;
        $path  = storage_path(). "/app/public/" . $image;
           if (File::exists($path)) {
              //File::delete($image_path);
            unlink($path);
        }
        $pay->update([
            'image' => null
        ]);
        $transaction = Transaction::findOrFail($pay->Transaction->id);
        $transaction->delete();
        Alert::success('Success', 'Payment Berhasil Di tolak');
        return redirect('/dashboard/order/history-pay');
    }

}
