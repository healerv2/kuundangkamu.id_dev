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
        
        <ul class="grid -unstyled">
            <li class="grid-item basic">
                <figure style="background-image: url(/image/20210917133037.png)">
                    <span>Basic</span>
                </figure>
                <p>Template 1</p>
                <a href="#" target="_blank" class="btn btn--white">Demo</a>
                <a href="#t" class="btn">Pilih</a>
            </li>
            <li class="grid-item premium">
                <figure style="background-image: url(/image/20210917133037.png)">
                    <span>Premium</span>
                </figure>
                <p>Template 1</p>
                <a href="#" target="_blank" class="btn btn--white">Demo</a>
                <a href="#t" class="btn">Pilih</a>
            </li>
            <li class="grid-item eksklusif">
                <figure style="background-image: url(/image/20210917133037.png)">
                    <span>Eksklusif</span>
                </figure>
                <p>Template 1</p>
                <a href="#" target="_blank" class="btn btn--white">Demo</a>
                <a href="#t" class="btn">Pilih</a>
            </li>
            <li class="grid-item premium">
                <figure style="background-image: url(/image/20210917133037.png)">
                    <span>Premium</span>
                </figure>
                <p>Template 1</p>
                <a href="#" target="_blank" class="btn btn--white">Demo</a>
                <a href="#t" class="btn">Pilih</a>
            </li>
            <li class="grid-item basic">
                <figure style="background-image: url(/image/20210917133037.png)">
                    <span>Basic</span>
                </figure>
                <p>Template 1</p>
                <a href="#" target="_blank" class="btn btn--white">Demo</a>
                <a href="#t" class="btn">Pilih</a>
            </li>
        </ul>
        <!-- {{--  @foreach ($template->chunk(3) as $chunk) --}}
        <ul class="grid -unstyled -flex -justify-center">
            @foreach ($template as $template)
            <li class="grid-item">
                <figure style="background-image: url(/image/{{ $template->image }})"></figure>
                <p>{{ $template->name_template}}</p>
                <a href="{{ $template->url}}" target="_blank" class="btn btn--white">Demo</a>
                <a href="{{url('')}}/visitor/checkout" class="btn">Pilih</a>
            </li>
            @endforeach
        </ul>
        {{--  @endforeach --}} -->
    </div>
</div>


@stop