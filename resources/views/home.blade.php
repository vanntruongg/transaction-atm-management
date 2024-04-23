@extends('layout.main')
@vite('resources/js/filter.js')
@vite('resources/js/findATM.js')
@vite('resources/js/add.js')

@section('content')
    <main class="w-full h-full flex">
        <div id="sidebar" class="w-[5%] border left transition-all duration-200">
            @component('components.sidebar')
            @endcomponent
        </div>
        <div id="divMap" class="w-[95%] transition-all duration-200 ">
            @component('components.map')
            @endcomponent
           
        </div>
        <div id="addBankLocation" class="">
            @component('components.addBankLocation')
            @endcomponent
        </div>
        <div id="addTransactionLocation" class="">
            @component('components.addTransactionLocation')
            @endcomponent
        </div>
        <div id="addATM"class="">
            @component('components.addATM')
            @endcomponent
        </div>
        <div class="hidden z-10" id="findATM">
            @component('components.findATM')
            @endcomponent
        </div>
        <div class="hidden z-10" id="findPGD">
            @component('components.findPGD')
            @endcomponent
        </div>
    </main>
   
@endsection


