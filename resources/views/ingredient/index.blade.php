@extends('layouts.app')


@section('content')
<section class="section">
<body>
    <div id="app">
        <show_ingredient></show_ingredient>
    </div>
{{--        <div class="container">--}}
{{--            <h1>List ingredient</h1>--}}
{{--        </div>--}}
    <script src="{{asset('js/app.js')}}"></script>
</body>
</section>

@endsection
