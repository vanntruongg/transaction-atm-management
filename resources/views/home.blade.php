@extends('layout.main')
@section('content')
    <main class="pt-16 w-full h-full grid grid-cols-12 gap-8">
        <div class="col-span-3 border left">
            @component('components.sidebar')
            @endcomponent
        </div>
        <div class="col-span-9">
            @component('components.map')
            @endcomponent
        </div>
    </main>
@endsection


