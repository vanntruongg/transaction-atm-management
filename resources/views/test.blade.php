@extends('layout.main')

@vite('./resources/js/test.js')
@section('content')
    <main class="pt-16 w-full h-full grid grid-cols-12 gap-8">
        <div class="col-span-3 border left">
            @component('components.sidebar')
            @endcomponent
            <button class="px-4 py-2 bg-slate-300 border" id="btnShowSearch">Tìm Kiếm</button>
            
        </div>
        <div class="col-span-9">
            @component('components.map')
            @endcomponent
        </div>

        @include('components.findATM')
    </main>


@endsection