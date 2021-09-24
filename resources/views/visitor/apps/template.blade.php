@extends('layouts.visitor.index')
@section('content')
<div class="section section-template">
    <div class="container">
        <h1>List Template</h1>
        <div class="button-group filter-button-group">
            <button class="btn" data-filter="*">All</button>
            <button class="btn" data-filter=".basic">Basic</button>
            <button class="btn" data-filter=".premium">Premium</button>
            <button class="btn" data-filter=".eksklusif">Eksklusif</button>
            <button data-filter=":not(.transition)">not transition</button>
            <button data-filter=".metal:not(.transition)">metal but not transition</button>
        </div>
        
        {{--  @foreach ($template->chunk(3) as $chunk) --}}
        <ul class="grid -unstyled">
            @foreach ($template as $template)
            <li class="grid-item @if(\Request::is('visitor/public') ) basic  @endif">
                <figure style="background-image: url(/image/{{ $template->image }})">
                    <span>Basic</span>
                </figure>
                <p>{{ $template->name_template}}</p>
                <a href="{{ $template->url}}" target="_blank" class="btn btn--white">Demo</a>
                <a href="{{url('')}}/visitor/checkout" class="btn">Pilih</a>
            </li>
            @endforeach
        </ul>
        {{--  @endforeach --}}
    </div>
</div>


@stop