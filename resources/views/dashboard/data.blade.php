@extends('layout')
@section('content')

    <div class=" container-fluid my-5 " >
        <div class="row justify-content-center ">
            <div class="col-xl-auto">
                <div class="card shadow-lg">
                    <div class="row p-2 mt-3 justify-content-between mx-sm-2">
                        <div class="col">
                            <p class="text-muted space mb-0 shop"> Lab. RPL/PPLG </p> 
                            <p class="text-muted space mb-0 shop">Leptop Landing</p>   
                        </div>
                        <div class="col">
                            <div class="row justify-content-start ">
                                <div class="col">
                                    <img src="{{asset("assets/img/rpl.png")}}" width="70" height="70">
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <img src="{{asset("assets/img/wikrama.jpeg")}}" width="30" height="30">
                        </div>
                    </div>
                    <div class="row  mx-auto justify-content-center text-center">
                        <div class="col-12 mt-3">
                            <nav aria-label="breadcrumb" class="second">
                                <ol class="breadcrumb indigo lighten-6 first ">
                                    <li class="breadcrumb-item font-weight-bold "><a class="black-text text-uppercase " href="home"><span class="mr-md-3 mr-1">Laptop Landing</span></a><i class="fa fa-angle-double-right " aria-hidden="true"></i></li>
                                    <li class="breadcrumb-item font-weight-bold"><a class="black-text text-uppercase" href="data"><span class="mr-md-3 mr-1">Data</span></a><i class="fa fa-angle-double-right text-uppercase " aria-hidden="true"></i></li>
                                    <li class="breadcrumb-item font-weight-bold"><a class="black-text text-uppercase active-2" href="create"><span class="mr-md-3 mr-1">New</span></a></li> 
                                </ol>
                            </nav>
                        </div>
                    </div>

                    {{-- alert ketika berhasil menambahkan data --}}
                    @if(Session::get('successAdd'))
                        <div class="alert alert-success w-70">
                            {{Session::get('successAdd')}} 
                        </div>
                    @endif 

                     {{-- alert jika data berhasil didelete  --}} 
                    @if(Session::get('successDelete'))
                        <div class="alert alert-warning w-70"> 
                            {{Session::get('successDelete')}} 
                        </div>
                    @endif 

                      {{-- alert jika data berhasil diperbarui  --}} 
                    @if(Session::get('successUpdate'))
                        <div class="alert alert-success w-70">
                            {{Session::get('successUpdate')}} 
                        </div>
                    @endif 

                    {{-- alert jika data berhasil meengerjakan todo  --}} 
                    @if(Session::get('done'))
                        <div class="alert alert-success w-70"> 
                            {{Session::get('done')}} 
                        </div>
                    @endif 

                    <div class="row" style="margin-left: 5px;">
                        <div class="col-md">
                            <a href="create" class="btn btn-primary">Create</a>
                        </div>
                    </div> 
                    <br>
                    {{-- <div class="table-responsive">
                        <table class="table table-bordered border-primary" id="table" style="width: 100%; " >
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
                        </table>
                    </div> --}}
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col col-md-6"><b>Leptop Landing Data</b></div>
                                {{-- <div class="col col-md-6">
                                    <a href="{{ route('students.create') }}" class="btn btn-success btn-sm float-end">Add</a>
                                </div> --}}
                            </div>
                        </div>
                        <div class="col">
                            <p class="text-muted space mb-0 shop">Data sort by date loaned</p> 
                        </div>
                        <div class="card-body" style="font-size: 90%;">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Nis</th>
                                    <th>Name</th>
                                    <th>Region</th>
                                    <th>Purposes</th>
                                    <th>Ket.</th>
                                    <th>Date</th>
                                    <th>Return Date</th>
                                    <th>Teacher</th>
                                    <th>Action</th>
                                </tr>
                                @foreach ($lendings as $lending)
                                    <tr>
                                        <th>{{$lending->nis}}</th>
                                        <th>{{$lending->name}}</th>
                                        <th>{{$lending->region}}</th>
                                        <th>{{$lending->ket}}</th>
                                        <th>{{$lending->purposes}}</th>
                                        <th>{{$lending->date}}</th>
                                        {{-- untuk done_time menggunakan ternary --}} 
                                        <th style="color: orange;">{{is_null($lending->done_time) ? 'Belum dikembalikan' : $lending->done_time}}</th>
                                        <th>{{$lending->teacher}}</th>
                                        <th>  
                                            <form action="{{route('lending.delete', $lending['id'])}}" method="POST">
                                                @csrf 
                                                @method('DELETE') 
                                                <button class="fas fa-trash text-danger btn"></button>

                                                <a class="fa-solid fa-pen-to-square btn" href="{{route('lending.edit', $lending->id)}}">

                                            </form> 
                                            <form action="complated/{{$lending['id']}}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="fa-solid fa-check-to-slot text-primary btn"></button> 
                                            </form> 
                                        </th>
                                    </tr>
                                @endforeach
                                {{-- @endif --}}
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
