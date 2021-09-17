@extends('layouts.visitor.index')
@section('content')
<div class="section section-template">
    <div class="container">
        <h1>List Template</h1>
        {{--  @foreach ($template->chunk(3) as $chunk) --}}
        <ul class="-unstyled -flex -justify-between">
            @foreach ($template as $template)
            <li>
                <figure><img src="/image/{{ $template->image }}" alt=""></figure>
                <p>{{ $template->name_template}}</p>
                <a href="{{ $template->url}}" target="_blank" class="btn btn--white">Demo</a>
                <a href="" class="btn btn">Pilih</a>
            </li>
            @endforeach
        </ul>
        {{--  @endforeach --}}
    </div>
</div>
@stop