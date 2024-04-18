<?php

namespace App\Http\Controllers;

// use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

use Inertia\Inertia;
use App\Models\Crudusers;

class CrudusersController extends Controller
{
    //nampilin data
    public function index()
    {  
        $title ='fifi';
        // $listusers = Crudusers::all();
        $listusers = Crudusers::orderBy('id','desc')->get() ; //menampilkan data berdasarkan id paling baru
        return Inertia::render('CrudUsers/Index', [
            'title' => $title,
            'listusers' => $listusers
        ]);
    }

    //menampilkan setiap data berdasarkan id nya
    // public function show($id) // (cara 1 cont. di routes web.php)
    public function show(Crudusers $user) // (cara 2 cont. di routes web.php)
    {
        // $user = Crudusers::find($id); //// (cara 1 cont. di routes web.php) buat var namanya user
        $title = 'profile';

        // return $user;
        return Inertia::render('CrudUsers/Detail', [
            'title' => $title,
            'user' => $user
        ]); 

    }

    //menampilkan form create untuk membuat data baru
    public function create()
    {
        $title = 'Create New Data User';
        return Inertia::render('CrudUsers/Create', [
            'title' => $title
        ]);
    }

    //mengelola data yang masuk dan menyimpan ke database 
    public function store(Request $request)
    {
        // // buat validasi dulu
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:crud_users|email',
            'password' => 'required|min:8'
        ]);

        //buat var baru (cara1)
        $user = new Crudusers();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();

        // // buat var baru (cara2)
        // Crudusers::create([
        //     'name'=>$request->name,
        //     'email'=>$request->email,
        //     'password'=>$request->password
        // ]);

        // // atau bisa jg begini
        // Crudusers::create($request->all());

        return Redirect::route('user.index')->with('success', 'New data user created.');
    }

    
    //menampilkan form edit untuk edit data 
    public function edit($id) 
    {
        $title = 'edit Data User';
        $user = Crudusers::find($id);
        return Inertia::render('CrudUsers/Edit', [
            'title' => $title,
            'user' => $user
        ]);
    }
    
    public function update(Request $request, $id) 
    {
        $user = Crudusers::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
        
        return Redirect::route('user.index')->with('success', 'data user updated.');
    }
    
    //delete data
    public function destroy(Crudusers $user)
    {
        $user -> delete();
    
        return Redirect::route('user.index')->with('success', 'data deleted.');
    }
}
