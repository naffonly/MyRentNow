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
    public function show(User $user)
    {
        //
        return view('admin.user.edit-user',compact('user'));
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
    public function update(Request $request)
    {
        //
        $users = User::count();

        $widget = [
            'users' => $users,
            //...
        ];
    
        $request->validate([
            'username'  => ['required'],
            'name'      => ['required'],
            'lastname'  => ['required'],
            'email'     => ['required'],
            'address'   => ['required'],
            'role'      => ['required'],
            'phone'     => ['required'],
            'birthdate' => ['required', 'before:today'],
            'password' => 'required|confirmed', 
        ]);

    
        

     
        $affected = DB::table('users')  
        ->where('id', $request->id)
        ->update([
            'username'      => $request->username,
            'name'      => $request->name,
            'lastname'      => $request->lastname,
            'email'         => $request->email,
            'address'       => $request->address,
            'roleId'   => $request->role,
            'phone'   => $request->phone,
            'birthdate'     => $request->birthdate,
            'password' => Hash::make($request->password),
             
              

        ]);
            return view('admin.overview', compact('widget'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, User $user)
    {

        $users = User::count();

        $widget = [
            'users' => $users,
            //...
        ];

    }

    public function softDelete(Request $request,User $user)
    {
        # code...
        $user->itsDelete = 0;
        $user->save();

        return back();
    }


    public function getAllUsers()
    {
        $users = DB::table('users as u')
            ->select(
                'u.id as id',
                'u.username as username',
                'u.name as name',
                'u.lastname as lname',
                'u.email as email',
                'u.address as address',
                'u.phone as phone',
                'u.roleId as roles',
                'r.nameRole as role',
                'u.indetityFace as iFace',
                'u.indetityCard as iCard',
                'u.birthdate as birthdate',
                'u.itsDelete as statusAkun'
                )
            ->join('roles as r','r.id','=','roleId')
            ->where('itsDelete','=','1')
            ->orderBy('id', 'asc')
            ->get();
            

            return DataTables::of($users)
            ->addColumn('action', function($user) {
                $link = 'user.softDelete';
                $userid = 'user';
                $html = '
                <a class="btn btn-info" href="/detail-user/'.$user->id.'">Show</a>
                <form class="btn-group" action="'. route($link,[$userid=>$user->id]) . '" method="put">
                 <button type="submit" class="btn btn-danger">Delete</button>
                </form>';
               
                return $html;
            })
            ->make(true);
    }
}
