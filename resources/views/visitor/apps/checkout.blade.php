@extends('layouts.visitor.index')
@section('content')
<div class="section section-undangan">
    <div class="container">

        <h1>Checkout</h1>
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>Nama Paket</th>
                        <th>Harga</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Basic</td>
                        <td>65000</td>
                        <td>
                             <a href="#">
                                <i class="fas fa-trash"></i> Hapus
                            </a>
                            <a href="#">
                                <i class="fas fa-paper-plane"></i> Bayar
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@stop