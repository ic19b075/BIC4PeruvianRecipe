@extends('layouts.app')


@section('content')
{{--    <section class="section">--}}
<body>
    <div id="app">
        <example-component></example-component>
    </div>
{{--        <div class="container">--}}
{{--            <h1>List ingredient</h1>--}}
{{--        </div>--}}
{{--    </section>--}}
    <script src="{{asset('js/app.js')}}"></script>
</body>
@endsection
