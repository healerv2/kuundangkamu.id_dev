@extends('layouts.visitor.index')
@section('content')
<div class="section section-price">
    <div class="container">

        <h1>Pricing</h1>
        <!-- <h1>create page form save di folder vistor/apps/form (lek gk onok create folder)</h1> -->
        @foreach ($product->chunk(3) as $chunk)
        {{-- @foreach ($product as $produk) --}}
        <ul class="pricing -unstyled -flex -justify-center">
            @foreach ($chunk as $produk)
            <li>
                <a href="#">
                    <h2>{{ $produk->name_product}}</h2>
                    <ul class="-unstyled">
                        <li>{{ $produk->subharga}}</li>
                        <li>{{ $produk->diskon}}</li>
                        <li>{{ $produk->harga}}</li>
                        <li>{{ $produk->keterangan}}</li>
                    </ul>
                </a>
            </li>
            {{-- <li>
                <a href="#">
                    <h2>Premium</h2>
                    <ul class="-unstyled">
                        <li><b>Everything in Basic</b></li>
                        <li>Lorem ipsum dolor</li>
                        <li>sit amet consectetur</li>
                        <li>adipisicing elit</li>
                        <li>Voluptas fuga ducimus</li>
                    </ul>
                </a>
            </li> --}}
            {{-- <li>
                <a href="#">
                    <h2>Eksklusif</h2>
                    <ul class="-unstyled">
                        <li><b>Everything in Premium</b></li>
                        <li>Lorem ipsum dolor</li>
                        <li>sit amet consectetur</li>
                        <li>adipisicing elit</li>
                        <li>Voluptas fuga ducimus</li>
                    </ul>
                </a>
            </li> --}}
            @endforeach
        </ul>
        @endforeach
    </div>
</div>
<div class="section section-history">
    <div class="container">
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>ID</th>
                        <th>Paket</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Taufik</td>
                        <td>662198431</td>
                        <td>Basic</td>
                        <td>
                            <a href="#">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>Taufik</td>
                        <td>662198431</td>
                        <td>Basic</td>
                        <td>
                            <a href="#">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>Taufik</td>
                        <td>662198431</td>
                        <td>Basic</td>
                        <td>
                            <a href="#">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>Taufik</td>
                        <td>662198431</td>
                        <td>Basic</td>
                        <td>
                            <a href="#">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@stop