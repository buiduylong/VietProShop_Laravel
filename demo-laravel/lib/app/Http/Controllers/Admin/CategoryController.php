<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\{AddCateRequest,EditCateRequest};

class CategoryController extends Controller
{
    public function getCate(){
    	$data['catelist'] = Category::all();
    	return view('backend/category', $data);
    }

    public function postCate(AddCateRequest $request){
    	$category = new Category;
    	$category->cate_name = $request->name;
    	$category->cate_slug = str_slug($request->name);
    	$category->save();
    	return back()->with('thongbao', 'Đã thêm danh mục thành công');
    }

    public function getEditCate($id){
    	$data['cate'] = Category::find($id);
		return view('backend/editcategory', $data);
    }

    public function postEditCate(EditCateRequest $request,$id){
    	$category = Category::find($id);
    	$category->cate_name = $request->name;
    	$category->cate_slug = str_slug($request->name);
    	$category->save();
    	return redirect('admin/category')->with('thongbao', 'Đã sửa danh mục thành công');
    }

    public function getDeleteCate($id){
    	Category::destroy($id);
    	return back()->with('thongbao', 'Đã xóa danh mục thành công');
    }
}
