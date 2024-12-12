<?php

namespace Modules\LiveChat\App\Http\Controllers\Buyer;

use Auth;
use Validator;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Nwidart\Modules\Laravel\Module;
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


        $buyer = Auth::guard('web')->user();

        $sellers = Message::with('seller')->where(['buyer_id' => $buyer->id])->select('seller_id')->groupBy('seller_id')->orderBy('id','desc')->get();

        return view('livechat::buyer.index', [
            'sellers' => $sellers
        ]);
    }


    public function get_message_body($seller_id)
    {
        $seller = User::find($seller_id);

        $buyer = Auth::guard('web')->user();

        $last_message = Message::where('buyer_id', $buyer->id)->where('seller_id', $seller->id)->where('send_by', 'seller')->latest()->first();

        $messages =  Message::where(['buyer_id' => $buyer->id, 'seller_id' => $seller_id])->get();

        Message::where('buyer_id', $buyer->id)->where('seller_id', $seller->id)->where('send_by', 'seller')->update(['buyer_read_msg' => 1]);

        return view('livechat::buyer.get_message_body', [
            'seller' => $seller,
            'last_message' => $last_message,
            'messages' => $messages,
        ]);
    }

    public function get_message_list($seller_id)
    {
        $seller = User::find($seller_id);

        $buyer = Auth::guard('web')->user();

        $messages =  Message::where(['seller_id' => $seller_id, 'buyer_id' => $buyer->id])->get();

        return view('livechat::buyer.get_message_list', [
            'messages' => $messages,
        ]);
    }


    public function store(Request $request){

        $buyer = Auth::guard('web')->user();

        $message = new Message();
        $message->seller_id = $request->seller_id;
        $message->buyer_id = $buyer->id;
        $message->message = $request->message;
        $message->seller_read_msg = 0;
        $message->buyer_read_msg = 1;
        $message->send_by = 'buyer';
        $message->service_id = $request->service_id ? $request->service_id : 0;
        $message->save();

        $messages =  Message::where(['buyer_id' => $buyer->id, 'seller_id' => $request->seller_id])->get();

        return view('livechat::buyer.get_message_list', [
            'messages' => $messages,
        ]);

    }

    public function store_from_service(Request $request){

        $buyer = Auth::guard('web')->user();

        $message = new Message();
        $message->seller_id = $request->seller_id;
        $message->buyer_id = $buyer->id;
        $message->message = $request->message;
        $message->seller_read_msg = 0;
        $message->buyer_read_msg = 1;
        $message->send_by = 'buyer';
        $message->service_id = $request->service_id ? $request->service_id : 0;
        $message->save();

        $notify_message = trans('translate.Your message has send successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->route('buyer.livechat')->with($notify_message);

    }

}
