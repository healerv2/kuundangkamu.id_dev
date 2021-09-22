@extends('layouts.visitor.index')
@section('content')
<div class="section section-checkout">
    <div class="container">
        <h1>Checkout</h1>
        <div class="checkout -flex -justify-between">
            <div class="table-responsive unglass">
                <table>
                    <thead>
                        <tr>
                            <th>Invoice ID</th>
                            <th>#354132</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>Nama Paket</th>
                            <th>Basic</th>
                        </tr>
                        <tr>
                            <td>Harga</td>
                            <td>65000</td>
                        </tr>
                        <tr>
                            <td>Action</td>
                            <td>
                                <a href="#">
                                    <i class="fas fa-trash"></i> Hapus
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="checkout__right">
                <p>Silahkan pilih pembayaran</p>
                <ul class="-unstyled -flex">
                    <li>
                        <a href="#">
                            <p>QRIS </p>
                            <img width="120" src="https://p-store.net/images/payment-icon/qris.png" alt="">
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <p>Virtual Account</p>
                            <img src="https://p-store.net/images/payment-icon/bank_bca.png" alt="">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

@stop