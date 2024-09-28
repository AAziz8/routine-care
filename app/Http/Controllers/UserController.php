<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use DB;
use Illuminate\Support\Arr;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = User::orderBy('id','DESC')->paginate(5);
        return view('users.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $input['role_id'] = 0;

        $user = User::create($input);
        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')
            ->with('success','User created successfully');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();

        return view('users.edit',compact('user','roles','userRole'));
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
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, ['password']);
        }

        // Set role_id to 0
        $input['role_id'] = 0;

        $user = User::find($id);
        $user->update($input);

        // Remove previous roles for this user
        DB::table('model_has_roles')->where('model_id', $id)->delete();

        // Assign new roles
        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')
            ->with('success', 'User updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
            ->with('success','User deleted successfully');
    }

    public function getuser()
    {

        $data = User::select('*');
        return \Yajra\DataTables\Facades\DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('roles', function ($user) {
                return $user->roles->pluck('name')->implode(', ');
            })

            ->addColumn('action', function (User $user) {

                $actionBtn =
                    '';
                $actionBtn .= '<a  href="'.route('users.edit',$user->id).'"  title="Edit User" class="btn btn-sm px-2 job-link" style="color: #fff;background-color: #3DCB3A;border-color: #8ad3d3;margin-left: 1px"> <i class="fa fa-edit"></i> </a>';
                $actionBtn .= '<a  class="btn btn-danger btn-sm px-2" style="color:white; background-color : red;margin-left: 1px"  data-id = "' . $user['id'] . '" id="deleteuserbutton" ><i class="fa fa-trash" ></i></a>';

                return $actionBtn;
            })


            ->rawColumns(['action'])
            ->make(true);

    }

    public function deleteuser(Request $request){
        $user_id = $request->user_id;
        $query = User::find($user_id)->delete();

        if($query){
            return response()->json(['code'=>1 , 'msg' => 'user has deleted']);
        }else{
            return response()->json(['code'=>0 , 'msg' => 'wrong']);
        }
    }


}
