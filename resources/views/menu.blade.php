@extends('_layouts.main')
@section('title', 'Menu')
@section('content')
@if(request()->is('data_store'))
<section>
    <div class="row">
        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body">
                    <h4 class="card-title"></h4>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body">
                    <h4 class="card-title"></h4>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body">
                    <h4 class="card-title"></h4>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
@if(request()->is('ledger'))

@endif
@if(request()->is('sales'))

@endif
@if(request()->is('purchase'))

@endif
@if(request()->is('cash_and_bank'))

@endif
@if(request()->is('inventory'))

@endif
@if(request()->is('report'))

@endif
@endsection
