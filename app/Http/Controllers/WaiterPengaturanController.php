<?php

namespace App\Http\Controllers;

use App\Waiter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WaiterPengaturanController extends Controller{

    public function index(){
        if(!WaiterController::getWaiter()){
            return redirect('waiter/login');
        }
        $waiter = WaiterController::getWaiter();
        return view('waiter.pengaturan.index', compact('waiter'));
    }

    public function create(){
        
    }

    public function store(Request $request){
        
    }

    public function show($id){
        
    }

    public function edit($id){
        if(!WaiterController::getWaiter()){
            return redirect('waiter/login');
        }
        $waiter = WaiterController::getWaiter();
        return view('waiter.pengaturan.edit', compact('waiter'));
    }

    public function update(Request $request, $id){
        $file = $request->file('foto_waiter');
        $format = $file->getClientOriginalExtension();
        $name = $request->username_waiter.'.'.$format;
        $file->move('images/profil', $name);

        $data = [
            'nama_waiter' => $request->nama_waiter,
            'username_waiter' => $request->username_waiter,
            'email_waiter' => $request->email_waiter,
            'password_waiter' => md5($request->password_waiter),
            'foto_waiter' => $name,
            'updated_at' => date("Y-m-d H:i:s"),
        ];

        Waiter::where('id_waiter', $id)->update($data);

        return redirect('waiter/pengaturan');
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
