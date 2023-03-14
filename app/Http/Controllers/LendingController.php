<?php

namespace App\Http\Controllers;

use App\Models\Lending;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class LendingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function login()
    {
        return view('dashboard.login');
    }

    public function register()
    {
        return view('dashboard.register');
    }
    
    public function inputRegister(Request $request)
    {
        // testing hasil input
        // dd($request->all());
        // validasi atau aturan value column pada db
        $request->validate([
            'email' => 'required',
            'name' => 'required|min:4|max:50',
            'username' => 'required|min:4|max:8',
            'password' => 'required',
        ]);
        // tambah data ke db bagian table users
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        // apabila berhasil, bkl diarahin ke hlmn login dengan pesan success
        return redirect('/')->with('success', 'berhasil membuat akun!'); //mereturn / lewat / , bukan lewat name yang diberikan 
    }

    public function auth(Request $request)
    {
        $request->validate([
            'username' => 'required|exists:users,username',
            'password' => 'required',
        ],[
            'username.exists' => "This username doesn't exists"
        ]);

        $user = $request->only('username', 'password');
        if (Auth::attempt($user)) {
            //return redirect()->route('home'); //membuka file index dengan name nya ("ditambahkan dengan route")
            return redirect('lending/home')->with('successLogin', "Selamat anda telah success login"); 
        } else {
            // db('salah');
            return redirect('/')->with('fail', "Gagal login, periksa dan coba lagi!");
        }
    }


    public function logout()
    {
        // menghapus history login
        Auth::logout();
        // mengarahkan ke halaman login lagi
        return redirect('/')->with('successLogout', "Anda telah logout");
    }


    public function index()
    {
        //
        return view('dashboard.index'); 
    }

    public function home()
    {
        return view('dashboard.home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lending = Lending::all();
        return view('dashboard.create', compact('lending')); 

    }

    public function data()
    {
        // $lendings = Lending::all();
        // return view('dashboard.data', compact('lendings')); 

        //menampilkan halaman awal, semua data
        // ambil semua data lending dari database

        //(where)cari data todo yg user id nya sama dengan id orang yg login, kalau ketemu datanya diambil 
        $lendings = Lending::where([
            ['user_id', '=', Auth::user()->id]])->get();  
        //tampilin file index di folder dashboard dan bawa data dari variable yang namanya todos ke fil tersebut
        return view('dashboard.data', compact('lendings'));  
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //mengirim data ke database (data baru) / menambahkan data baru ke db
            //validasi
            $request->validate([
                'nis' => 'required|min:8',
                'name' => 'required',
                'region' => 'required|min:5',
                'ket' => 'required',
                'purposes' => 'required',  
                'teacher' => 'required',
            ]);
            //tambah data ke database

            // Lending::create($request->all());
            Lending::create([
                'nis' => $request->nis,
                'name' => $request->name,
                'region' => $request->region,
                'ket' => $request->ket,
                'purposes' => $request->purposes, 
                'teacher' =>$request->teacher,
                'status' => 0,
                'date' => $request->date,
                'user_id' => Auth::user()->id,
            ]);
            //redirect apabila berhasil bersama dengan alert-nya
            return redirect()->route('lending.data')->with('successAdd','Berhasil menambahkan data peminjaman leptop!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lending  $lending
     * @return \Illuminate\Http\Response
     */
    public function show(Lending $lending)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lending  $lending
     * @return \Illuminate\Http\Response
     */
        public function edit($id)
        {
            //menampilkan form edit data
            //ambil data dari db yang idnya sama dengan id yang dikirim dari routenya
            $lending = Lending::Where('id', $id)->first();
            // lalu tampilkan halaman dari view edit dengan mengirim data yang ada di variable todo
            return view('dashboard.edit', compact('lending'));

        }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lending  $lending
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validasi
        $request->validate([
            'nis' => 'required|min:8',
            'name' => 'required',
            'region' => 'required|min:5',
            'ket' => 'required',
            'purposes' => 'required',  
            'teacher' => 'required',
        ]);
        //tambah data ke database
        // Lending::create($request->all());
        Lending::where('id', $id)->update([
            'nis' => $request->nis,
            'name' => $request->name,
            'region' => $request->region,
            'ket' => $request->ket,
            'purposes' => $request->purposes,  
            'teacher' => $request->teacher,
        ]);
        //redirect apabila berhasil bersama dengan alert-nya
        return redirect()->route('lending.data')->with('successUpdate','Berhasil mengupdate data peminjaman leptop!');
    }

    public function updateComplated($id)
    {
        //$id pada paramater mengambil data dari path dinamis {id}
        //cari data yan memiliki value column yang id yang sama dengan data id yang dikirim ke route, maka update baris data tersebut 
        Lending::where('id',$id)->update([
            'status' => 1,
            'done_time' => Carbon::now(),  //carbon=mengambil data terbaru sekarang 
        ]);
        //kalau berhasil akan diarahkan ke halaman list todo yang complated dengan pemberitahuan 
        return redirect()->route('lending.data')->with('done', 'Leptop telah selesai dikembalikan!'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lending  $lending
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Lending::where('id', '=', $id)->delete(); 
        return redirect()->route('lending.data')->with('successDelete', 'Berhasil menghapus data Peminjaman leptop'); 
    }
}
