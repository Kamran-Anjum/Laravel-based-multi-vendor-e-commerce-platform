@extends('layouts.adminLayout.admin_chat_design')
@section('content')

<style type="text/css">

    /* Add styles to the form container */
    .form-container {
      width: 40%;
      padding: 10px;
      background-color: white;
      margin: auto;
      font-size: 15px;
    }

    @media (max-width: 450px) {
        .form-container {
          width: 95%;
          padding: 10px;
          background-color: white;
          margin: auto;
        }
    }

    /* Set a style for the submit/send button */
    .form-container .btn {
      background-color: #c452a3;
      color: white;
      padding: 10px;
      float: right;
      /*width: 15%;*/
    }

    .chat {
        border: 0.5px gray;
        border-radius: 5px;
        width: auto;
        padding: 0.5em;
    }

    .chat-left {
        background-color: #edd5e6;
        align-self: flex-start;
        max-width: 80%;
        float: left;
        text-overflow: inherit;
    }

    .chat-right {
        background-color: #e37bc5;
        align-self: flex-end;
        max-width: 80%;
        float: right;
        overflow-x: unset;
        margin-right: 3px;
    }

    .chat-container {
        display: flex;
        flex-direction: column;
        height: 450px;
        overflow-y: auto;
    }

    @media (max-width: 450px) {
        .chat-container {
            display: flex;
            flex-direction: column;
            height: 350px;
            overflow-y: auto;
        }
    }

    .text-input{
        width: 85%;
    }

    @media (max-width: 450px) {
        .text-input{
            width: 75%;
        }
    }

</style>

<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Support Chat Box</a> <a href="#" class="current">View Support Chat Box</a> </div>
        <h1>Support Chat Box</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="form-container">
                <div id="app">
                    <admin-support-chat-component 
                        :support_chat_room_id = "{{ $chat_message->support_chat_room_id }}"
                        :admin = "1"
                    > 
                    </admin-support-chat-component>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection