@extends('layouts.app')

@section("title", "Règles")

@push('head')
    <style>
        .rules li:not(:last-child) {
            margin-bottom: 6px;
        }
    </style>
@endpush

@push('foot')
    <script>
        $(document).ready(function () {
            let counter = 1;

            $(".rules").each(function () {
                $(this).attr("start", counter);
                counter += $(this).find("li").length;
            });
        });
    </script>
@endpush

@section('content')
    <div class='card bg-light w-100'>
        <div class="card-header">
            <h2 class="mb-0">Conditions générales d'utilisation</h2>
        </div>
        <div class="card-body">
            <h4 class="mb-3">Généralités</h4>

            <ol class="rules">
                <li>
                    Ce site est un site web.
                </li>

            </ol>
        </div>
    </div>
@endsection
