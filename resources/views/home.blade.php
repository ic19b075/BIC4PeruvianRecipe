@extends('layouts.app')

@section('content')
    <section class="section is-fullheight">
        <home title="Dashboard">
            @if (session('status'))
                <query-message :success="true" :fail="false" message="{{ session('status') }}"></query-message>
            @endif
            <p>Welcome <strong>{{ auth()->user()->name }}</strong></p>
        </home>
    </section>
@endsection
