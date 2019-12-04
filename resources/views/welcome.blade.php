@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-9">
        @include('components.block_image')
    </div>
    <div class="col-3">
        @include('components.kitchen_sink')
    </div>
</div>
@include('components.gradient_cards')
@endsection

