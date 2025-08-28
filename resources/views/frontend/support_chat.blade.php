@extends('layouts.frontLayout.front-chat')
@section('content')

<style type="text/css">

    /* Add styles to the form container */
    .form-container {
      padding: 10px;
      background-color: #ebfbf5;
      margin: auto;
      font-size: 15px;
      border-radius: 10px;
      margin-top: 20px;
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
      background-color: #5caf90;
      color: white;
      /*padding: 10px;*/
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
        background-color: #b4e7d4;
        align-self: flex-start;
        max-width: 80%;
        float: left;
        text-overflow: inherit;
    }

    .chat-right {
        background-color: #5caf90;
        align-self: flex-end;
        max-width: 80%;
        float: right;
        overflow-x: unset;
        margin-right: 3px;
        color: white;
    }
    .chat-container {
        display: flex;
        flex-direction: column;
        height: 400px;
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

    h3{
        color: #5caf90;
        text-align: center; 
    }

</style>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 col-sm-6">
                <div class="form-container">
                    <div id="app">
                        <support-chat-component 
                            :front_user = "{{ Session::get('Support_User') }}"
                            :admin = "1"
                        > 
                        </support-chat-component>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

@endsection


