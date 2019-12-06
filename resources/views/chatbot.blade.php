@extends('layouts.app')

@section("title", "Chatbot")

@push("foot")
    <script>
    $(document).ready(function() {
        $("#submit").click(function() {
            $.get("{{route("chatbot.get")}}", {
                "input": $("#textInput").val()
            }, function(data) {
               $("#board").text(data);
            });
        });
    });
    </script>
@endpush

@section('content')
    <style>
        #board {
            padding: 10px;
            border: solid 2px black;
            width: 100%;
            height: 500px;
        }
    </style>
    <div id="board">
    </div>
    <div id="textInputContainer">
        <input type="text" name="textInput" id="textInput">
        <button id="submit">envoyer</button>
    </div>
@endsection
