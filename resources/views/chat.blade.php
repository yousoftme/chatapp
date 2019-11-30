@extends('layouts.app')
@section('content')
    <div class="container">

        <div class="row">

            <div class="col-md-4 offset-md-4">
                <h4>Chat Room</h4>
                <div class="badge badge-pill badge-info">@{{typing}}</div>
                <ul class="list-group overflow-auto" v-chat-scroll style="height: 300px;">
                    <message-component v-for = "value,index in chat.message" :key="value.index" :color=chat.color[index] :user=chat.user[index] :time=chat.time[index]>
                        @{{value}}
                    </message-component>
                  </ul>
                  <input type="text" class="form-control" v-model="message" placeholder="message here" @keyup.enter="send">
            </div>

        </div>
    </div>
@endsection
