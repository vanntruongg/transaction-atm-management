@extends('layout.main')

@vite('./resources/js/test.js')
@section('content')
    <main class="pt-16 w-full h-full grid grid-cols-12 gap-8">
        <div class="col-span-3 border left">
            @component('components.sidebar')
            @endcomponent
            <div class="">
                <label for="">NganHang: 
                    <select name="selectBank" id="selectBank">
                        @foreach($dataBank as $key => $item)
                            <option value="{{$item->NH_Ma}}">{{$item->NH_Ten}}</option>
                        @endforeach
                    </select>
                </label>

                <label for="">Dich Vu: 
                    <select name="selectService" id="selectService">
                        @foreach($dichvu as $key => $item)
                            <option value="{{$item->DV_Ma}}">{{$item->DV_Ten}}</option>
                        @endforeach
                    </select>
                </label>
                <button id="btnSearchATM" class="px-2 py-1 border border-red-300 bg-slate-300 mt-5">Tim Kiem</button>
            </div>
        </div>
        <div class="col-span-9">
            @component('components.map')
            @endcomponent
        </div>
    </main>

@endsection