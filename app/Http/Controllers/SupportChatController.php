<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Models\SupportChat;
use App\MOdels\SupportChatRoom;
use App\Events\SupportMsgSend;
use Session;

class SupportChatController extends Controller
{

    // front user support chat start
    public function frontuser_get_msgs(){

    	$front_user = Session::get('Support_User');

    	$admin = 1;

    	$chat_message = DB::table('support_chat_rooms as scr')
                        ->join('support_chats as cs','cs.support_chat_room_id', '=', 'scr.id')
    					->where(['scr.from_id' => $front_user, 'scr.to_id' => $admin])
                        ->select('cs.*')
    					->get();

        return $chat_message;

    }

    public function frontuser_send_msgs(Request $request){

    	if($request->isMethod('post'))
        {
        	
            $data = $request->all();

            $front_user = Session::get('Support_User');

            $time = date('m/d/Y h:i a');

            $chk_room_count = SupportChatRoom::where(['from_id' => $front_user])->count();

            if ($chk_room_count > 0) {

                $chk_room = SupportChatRoom::where(['from_id' => $front_user])->first();

                $room_id = $chk_room->id;

                $chat_message = new SupportChat();
                $chat_message->support_chat_room_id = $room_id;
                $chat_message->msg_by = Session::get('Support_User');
                $chat_message->message = $data['message'];
                $chat_message->msg_time = $time;
                $chat_message->save();
                
            } else {

                $chat_message_room = new SupportChatRoom();
                $chat_message_room->from_id = Session::get('Support_User');
                $chat_message_room->to_id = $data['to_id'];
                $chat_message_room->save();

                $room_id = $chat_message_room->id;

                $chat_message = new SupportChat();
                $chat_message->support_chat_room_id = $room_id;
                $chat_message->msg_by = Session::get('Support_User');
                $chat_message->message = $data['message'];
                $chat_message->msg_time = $time;
                $chat_message->save();
                
            }
            
        }

        broadcast(new SupportMsgSend($chat_message->load('user')))->toOthers();

        return ['status' => 'success'];
    	
    }
    // front user support chat end

    // admin support chat start
    public function viewchatlisttoadmin(){

        $chat_message = DB::table('support_chat_rooms')
                        ->orderBy('id', 'desc')
                        ->get();

        $new_message_counter = DB::table('support_chat_rooms as scr')
                                ->join('support_chats as cs','cs.support_chat_room_id', '=', 'scr.id')
                                ->where(['scr.to_id' => 1, 'cs.msg_read' => 0])
                                ->select('cs.*')
                                ->count();

        $new_message = DB::table('support_chat_rooms as scr')
                        ->join('support_chats as cs','cs.support_chat_room_id', '=', 'scr.id')
                        ->where(['scr.to_id' => 1, 'cs.msg_read' => 0])
                        ->select('cs.*')
                        ->get();
        // dd($new_message_counter, $chat_message);

        return view('admin.support-chat.view-support-chat-list')->with(compact('chat_message', 'new_message_counter', 'new_message'));

    }

    public function deleteChat($id = null)
    {

        SupportChatRoom::where(['id'=>$id])->delete();
        SupportChat::where(['support_chat_room_id'=>$id])->delete();

        return redirect()->back()->with('flash_message_success','Chat has been deleted Successfully!');
    }

    public function box_msgs($id){

        $chat_message = DB::table('support_chat_rooms as scr')
                        ->join('support_chats as cs','cs.support_chat_room_id', '=', 'scr.id')
                        ->where(['cs.support_chat_room_id' => $id])
                        ->select('cs.*', 'scr.from_id')
                        ->first();

        $read = SupportChat::where(['support_chat_room_id' => $id])->update([
            'msg_read' => 1
        ]);

        return view('admin.support-chat.view-support-chat-box')->with(compact('chat_message'));

    }

    public function get_msgs($id){

        $admin = 1;

        $chat_message = DB::table('support_chat_rooms as scr')
                        ->join('support_chats as cs','cs.support_chat_room_id', '=', 'scr.id')
                        ->where(['cs.support_chat_room_id' => $id, 'scr.to_id' => $admin])
                        ->select('cs.*')
                        ->get();

        return $chat_message;

    }

    public function send_msgs(Request $request){

        if($request->isMethod('post'))
        {
            
            $data = $request->all();


            $time = date('m/d/Y h:i a');

            $room_id = $data['support_chat_room_id'];

            $chat_message = new SupportChat();
            $chat_message->support_chat_room_id = $room_id;
            $chat_message->msg_by = 1;
            $chat_message->message = $data['message'];
            $chat_message->msg_time = $time;
            $chat_message->save();
            
        }

        broadcast(new SupportMsgSend($chat_message->load('user')))->toOthers();

        return ['status' => 'success'];
        
    }

}
