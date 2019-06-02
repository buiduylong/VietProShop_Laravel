<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\{AddUserRequest,EditUserRequest};
use App\Models\User;

class UserController extends Controller
{
    public function getUser(){
    	$data['userlist'] = User::all();
    	return view('backend/user',$data);
    }

    public function postUser(AddUserRequest $request){
    	$user = new User;
    	$user->email = $request->email;
    	$user->password = bcrypt($request->password);
    	$user->level = $request->level;
    	$user->save();
    	return back()->with('thongbao', 'Đã thêm thành viên thành công');
    }

    public function getEditUser($id){
    	$data['user'] = User::find($id);
    	return view('backend/edituser',$data);
    }

    public function postEditUser(EditUserRequest $request,$id){
    	$user = User::find($id);
    	$user->email = $request->email;
    	$user->password = bcrypt($request->password);
    	$user->level = $request->level;
    	$user->save();
    	return redirect('admin/user')->with('thongbao', 'Đã sửa thông tin thành viên thành công');
    }

    public function getDeleteUser($id){
    	User::destroy($id);
    	return back()->with('thongbao', 'Đã xóa thành viên thành công');
    }
}
