<?php

namespace App\Http\Controllers;

use App\Owner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OwnerPengaturanController extends Controller{

    public function index(){
        if(!OwnerController::getOwner()){
            return redirect('owner/login');
        }
        $owner = OwnerController::getOwner();
        return view('owner.pengaturan.index', compact('owner'));
    }

    public function create(){
        
    }

    public function store(Request $request){
        
    }

    public function show($id){
        
    }

    public function edit($id){
        if(!OwnerController::getOwner()){
            return redirect('owner/login');
        }
        $owner = OwnerController::getOwner();
        return view('owner.pengaturan.edit', compact('owner'));
    }

    public function update(Request $request, $id){
        $file = $request->file('foto_owner');
        $format = $file->getClientOriginalExtension();
        $name = $request->username_owner.'.'.$format;
        $file->move('images/profil', $name);

        $data = [
            'nama_owner' => $request->nama_owner,
            'username_owner' => $request->username_owner,
            'email_owner' => $request->email_owner,
            'password_owner' => md5($request->password_owner),
            'foto_owner' => $name,
            'updated_at' => date("Y-m-d H:i:s"),
        ];

        Owner::where('id_owner', $id)->update($data);

        return redirect('owner/pengaturan');
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
}
