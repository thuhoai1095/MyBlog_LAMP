<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class TheLoaiController extends Controller
{
    public function getDanhSach(){
        $category = Category::all();
        return view('admin.theloai.danhsach',['category'=>$category]);
    }

    public function getThem(){
        return view('admin.theloai.them');

    }

    public function postThem(Request $request){
//        echo $request->name;
        $this->validate($request,
            [
                'name'=>'required|min:3|max:100'
            ],
            [
                'name.required'=>'Ban chua nhap ten the loai',
                'name.min'=>'Ten the loai phai co do dai tu 3 den 100 ki tu',
                'name.max'=>'Ten the loai phai co do dai tu 3 den 100 ki tu',
            ]);

        $category = new Category();
        $category->name = $request->name;
        $category->save();

        return redirect('admin/theloai/them')->with('thongbao','Thêm thành công');
    }

    public function getSua($id){
        $category = Category::find($id);
        return view('admin.theloai.sua',['category'=>$category]);
    }

    public function postSua(Request $request,$id){
        $category = Category::find($id);
        $this->validate($request,
            [
            'name'=>'require|unique:Category,name|min:3|max:100'
        ],
            [
                
        ]);
    }
}
