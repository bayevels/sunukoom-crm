<?php

namespace App\Http\Controllers;

use App\Provider;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class ProviderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = User::with('provider')
        ->join('providers','users.id', '=', 'providers.user_id')->paginate(5);
        // $data = User::with('provider')->orderBy('id','ASC')->paginate(5);
        return view('providers.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('providers.create',compact('roles'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|unique:users',
            'company' => 'required|string',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);

        $user = User::create($input);
        // $user = User::create([
        //     'name'=>$input['name'],
        //     'email'=>$input['email'],
        //     'phone'=>$input['phone'],
        //     'password'=>$input['password'],
        // ]);
        $user->assignRole($request->input('roles'));
        
        // insert user in provider    
        Provider::create([
            'user_id'=>$user->id,
            'company'=>$request->input('company'),
        ]);

        return redirect()->route('providers.index')
                        ->with('success','User created successfully');
    }
    public function show($id)
    {
        $user = User::find($id);
        return view('providers.show',compact('user'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        $provider = Provider::where('user_id',$id)->first();
        $user["company"] = $provider->company; // ajout de la colonne company dans user
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();

        return view('providers.edit',compact('user','roles','userRole'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'phone' => 'required|string|unique:users,phone,'.$id,
            'company' => 'required',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);


        $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = array_except($input,array('password'));    
        }


        $user = User::find($id); 
        $user->update($input);

        $provider = Provider::where('user_id',$id);
        $provider->update(['company'=>$input['company']]); // mise à jour sur provider
        
        DB::table('model_has_roles')->where('model_id',$id)->delete();

        $user->assignRole($request->input('roles'));

        return redirect()->route('providers.index')
                        ->with('success','User updated successfully');
    }
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('providers.index')
                        ->with('success','User deleted successfully');
    }
}
