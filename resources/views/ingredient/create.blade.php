@extends('layouts.app')


@section('content')
{{--    <section class="section">--}}
{{--        <div class="container">--}}
{{--            <h1>Create ingredient</h1>--}}
{{--        </div>--}}
{{--    </section>--}}
<body>
    <div id="app">
        <query-message></query-message>
    </div>
{{--        <div class="container">--}}
{{--            <h1>List ingredient</h1>--}}
{{--        </div>--}}
{{--    </section>--}}
    <script src="{{asset('js/app.js')}}"></script>
</body>
@endsection
