<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Room;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index(){
        $room = Room::paginate(3);
        // $p = Room::where('');
        // dd($room);
        return view('index', compact('room'));
    }

    public function pesan(){
        $uri = Route::currentRouteName();
        // dd($uri);
        return view('pesan',compact('uri'));
    }
    public function room(Request $request){
        // dd($request->all());
        if(!empty($request->from or $request->count)){
            $stayfrom = Carbon::parse($request->from)->isoFormat('D MMM YYYY');
            $stayto = Carbon::parse($request->to)->isoFormat('D MMM YYYY');
            // dd($request->all());
            if($request->from and $request->to and $request->count != null){
                // dd($request);
                $occupiedRoomId = $this->getOccupiedRoomID($request->from, $request->to);
                $rooms = $this->getUnocuppiedroom($request, $occupiedRoomId);
                $roomsCount = $this->countUnocuppiedroom($request, $occupiedRoomId);
            } elseif($request->count != null){
                $rooms = $this->getUnocuppiedroom2($request);
                $roomsCount = $this->countUnocuppiedroom2($request);
            } else{
                $occupiedRoomId = $this->getOccupiedRoomID($request->from, $request->to);
                $rooms = $this->getUnocuppiedroom($request, $occupiedRoomId);
                $roomsCount = $this->countUnocuppiedroom($request, $occupiedRoomId);
            }
        } else {
            $rooms = Room::paginate(10);
            $roomsCount = Room::count();
            // dd($roomsCount);
        }
        return view('frontend.rooms', compact('rooms', 'roomsCount', 'request'));
    }

    public function facility(){
        return view('frontend.facilities');
    }
    public function contact(){
        return view('frontend.contact');
    }
    public function about(){
        $r = Room::count();
        $c = Customer::count();
        $t = Transaction::count();
        // dd($r);
        return view('frontend.about', compact('r', 'c', 't'));
    }



    private function getUnocuppiedroom($request, $occupiedRoomId)
    {
        if($request->count != null){
            $rooms = Room::with('type', 'status')->where('capacity', '>=', $request->count)->whereNotIn('id', $occupiedRoomId);
        }else {
            $rooms = Room::with('type', 'status')->whereNotIn('id', $occupiedRoomId);
        }
        $rooms = $rooms
            ->orderBy('capacity')
            ->paginate(10);

        return $rooms;
    }
    private function getUnocuppiedroom2($request)
    {
            $rooms = Room::with('type', 'status')->where('capacity', '>=', $request->count);
            $rooms = $rooms
            ->orderBy('capacity')
            ->paginate(10);
        return $rooms;
    }
    private function countUnocuppiedroom($request, $occupiedRoomId)
    {
        if($request->count != null){
            $roomsCount = Room::with('type', 'status')
            ->where('capacity', '>=', $request->count)
            ->whereNotIn('id', $occupiedRoomId)
            ->orderBy('price')
            ->orderBy('capacity')
            ->count();
        }else {
           $roomsCount =  Room::with('type', 'status')
            ->whereNotIn('id', $occupiedRoomId)
            ->orderBy('price')
            ->orderBy('capacity')
            ->count();
        }
        return $roomsCount;

    }
    private function countUnocuppiedroom2($request)
    {
        return Room::with('type', 'status')
            ->where('capacity', '>=', $request->count)
            ->orderBy('price')
            ->orderBy('capacity')
            ->count();
    }


    private function getOccupiedRoomID($stayfrom, $stayto)
    {
        // if($stayfrom and $stayto){}
        $occupiedRoomId = Transaction::where([['check_in', '<=', $stayfrom], ['check_out', '>=', $stayto]])
            ->orWhere([['check_in', '>=', $stayfrom], ['check_in', '<=', $stayto]])
            ->orWhere([['check_out', '>=', $stayfrom], ['check_out', '<=', $stayto]])
            ->pluck('room_id');
        return $occupiedRoomId;
    }
}
