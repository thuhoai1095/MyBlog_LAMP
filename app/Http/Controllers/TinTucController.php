<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\User;

class TinTucController extends Controller
{
    public function getDanhSach(){
        $post = Post::all();
        return view('admin.tintuc.danhsach',['post'=>$post]);
    }

    public function getThem(){
        $category = Category::all();
        $user = User::all();
    return view('admin.tintuc.them',['category'=>$category],['user'=>$user]);

    }

    public function postThem(Request $request){
        $this->validate($request,[
            'category'=>'required',
            'title'=>'required|min:3|unique:posts,title',
            'summary'=>'required|min:3',
            'content'=>'required|min:3',
        ],[
            'category.required'=>'Bạn chưa chọn loại tin',
            'title.required'=>'Bạn chưa nhập tiêu đề',
            'title.min'=>'Tiêu đề phải lớn hơn 3 kí tự',
            'title.unique'=>'Tiêu đề đã tồn tại',
            'summary.required'=>'Bạn chưa nhập phần tóm tắt',
            'summary.min'=>'Tóm tắt phải nhiều hơn 3 kí tự',
            'content.required'=>'Bạn chưa nhập phần nội dung',
            'content.min'=>'Nội dung phải nhiều hơn 3 kí tự'
        ]);
        $post = new Post();
        $post->title = $request->title;
        $post->summary = $request->summary;
//        $post->content = $request->content;
        $post->like = 0;
        $post->user_id = $request->user_id;
        $post->category_id = $request->category_id;

        if($request->hasFile('image')){
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
            if($duoi!='jpg' && $duoi!='png'&& $duoi!='jpeg'){
                return redirect('admin/tintuc/them')->with('loi','Bạn chỉ được nhập file có đuôi jpg, png, jpeg');
            }
            $name = $file->getClientOriginalName();
            $image = str_random(4)."_".$name;
           $post->image = $image;
        }else{
            $post->image = "";
        }
        $post->save();
        return redirect('admin/tintuc/them')->with('thongbao','Post bài thành công');

    }


    function getXoa(Request $request,$id){

    }

    public function postXoa(Request $request, $id){

    }


    public function getSua($id){


    }

    public function postSua(Request $request,$id){
//          echo $request->name;

    }
}
