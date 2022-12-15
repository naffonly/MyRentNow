<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::count();

        $widget = [
            'users' => $users,
            //...
        ];
        return view('admin.overview', compact('widget'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $users = User::count();

        $widget = [
            'users' => $users,
            //...
        ];
        return view('admin.user.create-user', compact('widget'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $users = User::count();

        $widget = [
            'users' => $users,
            //...
        ];
        $request->validate([
            'username' => ['required', 'string', 'max:20','unique:users'],
            'name' => ['required', 'string', 'max:20'],
            'lastname' => ['required', 'string', 'max:20'],
            'address' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'birthdate' => ['required', 'date'],
            'phone' => ['required', 'string', 'string'],
            'roleId' => ['required','string'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            
        ],
        [
            'username.required' => 'Username harus diisi',
            'username.unique' => 'Username telah digunakan',
            'birthdate.before' => 'Tanggal lahir harus sebelum hari ini'
        ]);
        $user =[
            'username' => $request->username,
            'name' => $request->name,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'address' => $request->address,
            'birthdate' => $request->birthdate,
            'phone' => $request->phone,
            'roleId'=> $request->roleId,
            'password' => Hash::make($request->password),
            'itsDelete' => 1,
        ];

        DB::table('users')->insert($user);
        return view('admin.overview' , compact('widget'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function getAllUsers()
    {
        $users = DB::table('users')
            ->select(
                'id as id',
                'username as username',
                'name as name',
                'lastname as lname',
                'email as email',
                'address as address',
                'phone as phone',
                'indetityFace as iFace',
                'indetityCard as iCard',
                'birthdate as birthdate',
                'itsDelete as statusAkun'
                )
            ->orderBy('id', 'asc')
            ->get();

            return DataTables::of($users)
            ->addColumn('action', function($user) {
                $html = '
                <a class="btn btn-info" href="/userDetail/'.$user->id.'">Show</a>
                ';
                return $html;
            })
            ->make(true);
    }
}
