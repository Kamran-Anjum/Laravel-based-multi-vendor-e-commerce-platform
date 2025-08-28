@extends('layouts.adminLayout.admin_design')
@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Support Chat List</a> <a href="#" class="current">View Support Chat List</a> </div>
            <h1>Support Chat List</h1>
            @if(Session::has('flash_message_error'))
                <div class="alert alert-error alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{!! session('flash_message_error') !!}</strong>
                </div>

            @endif
            @if(Session::has('flash_message_success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{!! session('flash_message_success') !!}</strong>
                </div>
            @endif
        </div>
        <div class="container-fluid">
            <hr>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                            <h5>View Support Chat List</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered data-table">
                                <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Name</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1; ?>
                                @foreach($chat_message as $chat)
                                    <tr class="gradeX">
                                        <td>{{ $i }}</td>
                                        <td>
                                            {{ $chat->from_id }}
                                            @foreach($new_message as $chk)
                                                @if($chk->support_chat_room_id == $chat->id && $new_message_counter > 0)
                                                    <img src=" {{ asset('/images/new-msg.png' ) }} " alt="New Message" width="40" style="padding-left: 10px;">
                                                @endif
                                            @endforeach
                                        </td>

                                        <td class="center">
                                            <a href="{{ url('/admin/view-support-chat/'.$chat->id ) }}" class="btn btn-primary btn-mini">View Chat</a>
                                            <a class="btn btn-danger btn-mini sa-confirm-delete" param-id="{{ $chat->id }}" param-route="delete-chat" param-user="admin" href="javascript:">Delete</a>
                                        </td>
                                    </tr>
                                    <?php $i = $i+1; ?>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection