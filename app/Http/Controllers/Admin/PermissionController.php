<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use DB;

class PermissionController extends Controller
{

    public function __construct(Permission $permission)
    {
        $this->permission = $permission;
        $this->middleware('auth');

    }
 
    public function index()
    {
        $permissions = $this->permission::all();

        return view("permission.index", ['permissions' => $permissions]);
    }
    
    public function getAllPermissions(){
        $permissions = $this->permission::all();

        return response()->json([
            'permissions' => $permissions
        ], 200);
    }

    public function getAll(){
        $permissions = $this->permission->all();
        return response()->json([
            'permissions' => $permissions
        ], 200);
    }

  
    public function create()
    {
        return view("permission.create");
    }

 
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $this->permission->create([
            'name' => $request->name
        ]);

        return redirect()->route('permission.index')->with('permission-add', 'Permission crée avec Succès');
    }

   
    public function show($id)
    {
        
    }

  
    public function edit($id)
    {
        $permission = Permission::find($id);

        return view('permission.edit',compact('permission'));
       
    }

   
    public function update(Request $request, $id)
    {
        $this->validate($request, [

            'name' => 'required',

        ]);

        Permission::find($id)->update($request->all());

        return redirect()->route('permission.index')

                        ->with('permission-edit','Mise en jour permission réussi');
    }

  
    public function destroy($id)
    {
        Permission::find($id)->delete();

        return redirect()->route('permission.index')

                        ->with('permission-delete','Suppression réussi');
    }
}
