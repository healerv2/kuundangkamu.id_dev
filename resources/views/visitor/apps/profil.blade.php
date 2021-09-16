@extends('layouts.visitor.index')
@section('content')
<div class="section section-profil">
    <div class="container">

        <h1>Profil</h1>
        <div class="profil -flex -justify-between">
            <div class="profil__left">
                <figure><img src="https://picsum.photos/150/150?random=1" alt=""></figure>
                <h2>Budi Santusi</h2>
                <ul class="-unstyled -flex -justify-between">
                    <li>
                        <span>Undangan</span>
                        <p>5</p>
                    </li>
                    <li>
                        <span>Badge</span>
                        <p>Premium</p>
                    </li>
                </ul>
            </div>
            <div class="profil__right">
                <dl>
                    <div>
                        <dt>Nama</dt>
                        <dd>Budi Santusi</dd>
                    </div>
                    <div>
                        <dt>Email</dt>
                        <dd>Email@mail.com</dd>
                    </div>
                    <div>
                        <dt>Nomor HandPhone</dt>
                        <dd>081234567890</dd>
                    </div>
                    <div>
                        <dt>Lorem ipsum</dt>
                        <dd>Dolor sit amet</dd>
                    </div>
                    <div>
                        <dt>Vue fegresta</dt>
                        <dd>Nagtudo Bolares</dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>
</div>

@stop