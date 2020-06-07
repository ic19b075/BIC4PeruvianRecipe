@extends('layouts.app')


@section('content')
    <section class="section">
        <div class="container">
            <h1>List recipe</h1>
            <div id="app">
                <show_recipe></show_recipe>
            </div>
        </div>
       <!-- <script src="{{asset('js/app.js')}}"></script>-->
    </section>
@endsection
