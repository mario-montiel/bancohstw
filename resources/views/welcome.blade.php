@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-8">
        @include('components.block_image')
    </div>
    <div class="col-4">
        @include('components.kitchen_sink')
    </div>
</div>
@include('components.gradient_cards')
@endsection

