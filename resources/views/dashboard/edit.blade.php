@extends('layout')

@section('content')
    <div class=" container-fluid my-5 ">
        <div class="row justify-content-center ">
            <div class="col-xl-10">
                <div class="card shadow-lg ">
                    <div class="row p-2 mt-3 justify-content-between mx-sm-2">
                        <div class="col">
                            <p class="text-muted space mb-0 shop"> Lab. RPL/PPLG </p> 
                            <p class="text-muted space mb-0 shop">Leptop Landing</p>   
                        </div>
                        <div class="col">
                            <div class="row justify-content-start ">
                                <div class="col">
                                    {{-- <img class="irc_mi img-fluid cursor-pointer " src="https://i.imgur.com/jFQo2lD.png"  width="70" height="70" > --}}
                                    <img src="{{asset("assets/img/rpl.png")}}" width="100" height="100">
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            {{-- <img class="irc_mi img-fluid bell" src="https://i.imgur.com/uSHMClk.jpg" width="30" height="30"  > --}}
                            <img src="{{asset("assets/img/wikrama.jpeg")}}" width="40" height="40">
                        '</div>
                    </div>
                    <div class="row  mx-auto justify-content-center text-center">
                        <div class="col-12 mt-3 ">
                            <nav aria-label="breadcrumb" class="second ">
                                <ol class="breadcrumb indigo lighten-6 first  ">
                                    <li class="breadcrumb-item font-weight-bold "><a class="black-text text-uppercase " href="#"><span class="mr-md-3 mr-1">Laptop Landing</span></a><i class="fa fa-angle-double-right " aria-hidden="true"></i></li>
                                    <li class="breadcrumb-item font-weight-bold"><a class="black-text text-uppercase" href="/data"><span class="mr-md-3 mr-1">Data</span></a><i class="fa fa-angle-double-right text-uppercase " aria-hidden="true"></i></li>
                                    <li class="breadcrumb-item font-weight-bold"><a class="black-text text-uppercase active-2" href="#"><span class="mr-md-3 mr-1">New</span></a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <form method="POST" action="{{route('lending.update', $lending['id'])}}" id="create-form">
                        @csrf
                        @method('PATCH')
                            @if ($errors->any())
                            {{-- alert todo kalau tidak idi isi, akan muncul alert denger  --}}
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        
                        <div class="row justify-content-around">
                            <div class="col-md-8">
                                <div class="card border-0">
                                    <div class="card-header pb-0">
                                        <h2 class="card-title space ">Leptop Lending</h2>
                                        <p class="card-text text-muted mt-4  space">Edit data</p>
                                        <hr class="my-0">
                                    </div>
                                    <div class="card-body">
                                        <div class="row justify-content-between">
                                            <div class="col-auto mt-0"><p><b>Please fill all the input with the right value</b></p></div>
                                        </div>
                                        <div class="row mt-1">
                                            <div class="col"><p class="text-muted mb-2">Form Edit Data</p><hr class="mt-0"></div>
                                        </div>
                                        <div class="form-group">
                                            <label for="NAME" class="small text-muted mb-1">Name</label>
                                            <input type="name" class="form-control form-control-sm" name="name" value="{{$lending['name']}}" id="NAME" aria-describedby="helpId" placeholder="Masukkan nama anda">
                                        </div>
                                        <div class="mb-3">
                                            <label for="form_group" class="small text-muted mb-1">Purposes</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="purposes"placeholder="Masukkan purposes anda peminjaman">{{$lending['purposes']}}</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="form_group" class="small text-muted mb-1">Ket.</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="ket" value="{{$lending['ket']}}" placeholder="Masukkan Keterangan peminjaman">{{$lending['ket']}}</textarea>
                                        </div>
                                        <div class="row no-gutters">
                                            <div class="col-sm-6 pr-sm-2">
                                                <div class="form-group">
                                                    <label for="NAME" class="small text-muted mb-1">Nis</label>
                                                    <input type="string" class="form-control form-control-sm" name="nis" value="{{$lending['nis']}}" id="NAME" aria-describedby="helpId" placeholder="Masukkan Nis anda">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="NAME" class="small text-muted mb-1">Region</label>
                                                    <input type="text" class="form-control form-control-sm" name="region" value="{{$lending['region']}}" id="NAME" aria-describedby="helpId" placeholder="Masukkan region anda">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="NAME" class="small text-muted mb-1">Date</label>
                                            <input type="date" class="form-control form-control-sm" name="date" value="{{$lending['date']}}" id="NAME" aria-describedby="helpId">
                                        </div> 
                                        <div class="form-group">
                                            <label for="NAME" class="small text-muted mb-1">Teacher Name</label>
                                            <input type="name" class="form-control form-control-sm" name="teacher" value="{{$lending['teacher']}}" id="NAME" aria-describedby="helpId" placeholder="Masukkan nama guru anda">
                                        </div> 
                                        <div class="row mb-md-5">
                                            <div class="col-5">
                                                <button type="submit" name="submit" class="btn btn-lg btn-block ">Update data</button>
                                            </div>
                                            <div class="col-5">
                                                <a href="/lending/data" class="btn btn-primary">Back</a>
                                            </div>
                                        </div>   
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-md-5">
                                <div class="card border-0 ">
                                    <div class="card-header card-2">
                                        <p class="card-text text-muted mt-md-4  mb-2 space">Total Data<span class=" small text-muted ml-2 cursor-pointer">Leptop Landing</span> </p>
                                        <hr class="my-2">
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="row  justify-content-between">
                                            <div class="col-auto col-md-7">
                                                <div class="media flex-column flex-sm-row">
                                                    <i class="fa-solid fa-right-from-bracket fa-2x"></i>
                                                    <div class="media-body  my-auto">
                                                        <div class="row">
                                                            <div class="col-auto"><p class="mb-0"><b>Loaned</b></p><small class="text-muted">Total laptop who loaned this day</small></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class=" pl-0 flex-sm-col col-auto  my-auto"> <p class="boxed-1">{{$lending->where('status', '=', null)->count()}}</p></div> (format lending ini berguna untuk menghitung semua data yang sudah di compact pada controller create nya dengan tipe null/0 dan 1)
                                            <div class=" pl-0 flex-sm-col col-auto  my-auto "><p><b>{{ \Carbon\Carbon::now()->format('d - m') }}</b></p></div>
                                        </div>
                                        <hr class="my-2">
                                        <div class="row  justify-content-between">
                                            <div class="col-auto col-md-7">
                                                <div class="media flex-column flex-sm-row">
                                                    <i class="fa-solid fa-right-left fa-2x"></i> 
                                                    <div class="media-body  my-auto">
                                                        <div class="row ">
                                                            <div class="col"><p class="mb-0"><b>Returned</b></p><small class="text-muted">Total laptop who returned this day</small></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="pl-0 flex-sm-col col-auto  my-auto"> <p class="boxed">{{$lending->where('status', '=', 1)->count()}}</p></div>
                                            <div class="pl-0 flex-sm-col col-auto my-auto"><p><b>{{ \Carbon\Carbon::now()->format('d - m') }}</b></p></div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}} 
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

