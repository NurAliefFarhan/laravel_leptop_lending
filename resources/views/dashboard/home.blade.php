@extends('layout')

@section('content')

{{-- Jika berhasi login akan muncul alert successLogin --}}
@if(Session::get('successLogin'))
<div class="alert alert-success w-70">
    {{Session::get('successLogin')}}
</div>
@endif

@if(Session::get('notAllowed'))
<div class="alert alert-success w-70">
    {{Session::get('notAllowed')}}
</div>
@endif


<div class="row" style="margin-top: 20px; margin-left: 25%;">
    <div class="col-lg-7 grid-margin stretch-card">
        <div class="card" style="border-radius: 20px;">
            <div class="card-body">
                <h3 class="card-title" style="text-align: center;">Laptop Landing data</h3>
                <div class="table-responsive">
                    {{-- <table class="table table-striped" id="table" style="width: 50px">
                            <thead>
                                <tr>
                                    <th>
                                        NIS
                                    </th>
                                    <th>
                                        NAME
                                    </th>
                                    <th>
                                        REGION
                                    </th>
                                    <th>
                                        PURPOSES
                                    </th>
                                    <th>
                                        KET
                                    </th>
                                    <th>
                                        DATE
                                    </th>
                                    <th>
                                        RETURN DATE
                                    </th>
                                    <th>
                                        TEACHER
                                    </th>
                                    <th>
                                        ACTION
                                    </th>
                                </tr>
                            </thead>
                        </table> --}}
                    <div class="row  mx-auto justify-content-center text-center">
                        <div class="col-20 mt-2">
                            <nav aria-label="breadcrumb" class="second">
                                <ol class="breadcrumb indigo lighten-6 first">
                                    <li class="breadcrumb-item font-weight-bold "><a class="black-text text-uppercase" href="home"><span class="mr-md-3 mr-1">Laptop Landing</span></a><i class="fa fa-angle-double-right " aria-hidden="true"></i></li>
                                    <li class="breadcrumb-item font-weight-bold"><a class="black-text text-uppercase" href="data"><span class="mr-md-3 mr-1">Data</span></a><i class="fa fa-angle-double-right text-uppercase " aria-hidden="true"></i></li>
                                    <li class="breadcrumb-item font-weight-bold"><a class="black-text text-uppercase active-2" href="create"><span class="mr-md-3 mr-1">New</span></a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div id="container">
    <div class="product-details">
        <h1>LEPTOP LENDING</h1>
        <span class="hint-star star">
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            {{-- <i class="fa fa-star-o" aria-hidden="true"></i> --}}
        </span>
        <p class="information" style="font-size:  1.3vw;">" Leptop Lending adalah tempat peminjaman leptop yang dikhususkan untuk yang terjadi kendala, peminjaman ini dilakukan dengan menyerahkan tanda pangenal/name card sebagai bahan modal peminjaman leptop</p>
        {{-- <div class="control">
            <button class="btn">
                <span class="price">$250</span>
                <span class="shopping-cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span>
                <span class="buy">Get now</span>
            </button>
        </div> --}}
    </div>
    <div class="product-image">
        <img src="https://i.pinimg.com/474x/ec/8f/d9/ec8fd914cfa083d1175a6308b6a37ef2.jpg" alt="">
        <div class="info">
            <h2> Description</h2>
            <ul>
                <li><strong>Banyak leptop : </strong>100 kali </li>
                <li><strong>Jangkauan peminjaman : </strong>Hanya di area sekolah</li>
                <li><strong>Kewajiban : </strong>Barang dijaga dengan baik</li>
                <li><strong>Batas waktu peminjaman : </strong>Jam 5 sore</li>
            </ul>
        </div>
    </div>
</div>

@endsection
