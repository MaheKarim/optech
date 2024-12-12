<?php

namespace Modules\LiveChat\App\Http\Controllers\Seller;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Modules\LiveChat\App\Models\Message;

class LiveChatController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:web');
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $seller = Auth::guard('web')->user();

        $buyers = Message::with('buyer')->where(['seller_id' => $seller->id])->select('buyer_id')->groupBy('buyer_id')->orderBy('id','desc')->get();

        return view('livechat::seller.index', [
            'buyers' => $buyers
        ]);
    }


    public function get_message_body($buyer_id)
    {
        $buyer = User::find($buyer_id);

        $seller = Auth::guard('web')->user();

        $last_message = Message::where('seller_id', $seller->id)->where('buyer_id', $buyer->id)->where('send_by', 'buyer')->latest()->first();

        $messages =  Message::where(['seller_id' => $seller->id, 'buyer_id' => $buyer_id])->get();

        Message::where('seller_id', $seller->id)->where('buyer_id', $buyer->id)->where('send_by', 'buyer')->update(['seller_read_msg' => 1]);

        return view('livechat::seller.get_message_body', [
            'buyer' => $buyer,
            'last_message' => $last_message,
            'messages' => $messages,
        ]);
    }

    public function get_message_list($buyer_id)
    {
        $buyer = User::find($buyer_id);

        $seller = Auth::guard('web')->user();

        $messages =  Message::where(['seller_id' => $seller->id, 'buyer_id' => $buyer_id])->get();

        return view('livechat::seller.get_message_list', [
            'messages' => $messages,
        ]);
    }




    public function store(Request $request){

        $seller = Auth::guard('web')->user();

        $message = new Message();
        $message->buyer_id = $request->buyer_id;
        $message->seller_id = $seller->id;
        $message->message = $request->message;
        $message->seller_read_msg = 1;
        $message->buyer_read_msg = 0;
        $message->send_by = 'seller';
        $message->service_id = $request->service_id ? $request->service_id : 0;
        $message->save();

        $messages =  Message::where(['seller_id' => $seller->id, 'buyer_id' => $request->buyer_id])->get();

        return view('livechat::seller.get_message_list', [
            'messages' => $messages,
        ]);

    }

}
