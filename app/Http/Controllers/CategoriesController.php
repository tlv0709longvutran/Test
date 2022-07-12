<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    //
    public function __construct(Request $request){
        /**
         * Nếu là trang danh sách chuyên mục thì hiển thị ra dòng chữ xin chào unicode
         */
        // if($request->is('categories')){
        //     echo 'Xin chào Unicode';
        // }
    }
    // Hien thi danh sach chuyen muc(Phuong thuc get)
    public function index(Request $request){

        // $path = $request->path();
        // echo $path;    

        // $id = request('id');
        // dd($id);

        // $name = request('name' , 'Unicode'); // Tra ve gia tri mac dinh khi khong co tham so thu nhat

        // dd($name);

        $id = $request()->query('id');

        dd($id);

        return view('Client/Category/list');
    }
    // Lay ra 1 chuyen muc theo id(Phuong thuc Get)
    public function getCategory($id){
        return view('Client/Category/edit');
    }
    // Cap nhat 1 chuyen muc(Phuong thuc POST)
    public function updateCategory($id){
        return 'Submit Sửa chuyên mục : '.$id;
    }
    
    // Show form them du lieu (Phuong thuc GET)
    public function addCategory(){
        return view('Client/Category/add');
    }
    // Them du lieu vao chuyen muc(Phuong thuc POST)
    public function handleCategory(Request $request){
        // $Alldata = $request->all();

        // dd($Alldata);
        //print_r($_POST);
        //return 'Submit Thêm chuyên mục';

        $cateName = $request->category_name;
        dd($cateName);
    }

    // Xoa du lieu (Phuong thuc Delete)
    public function deleteCategory($id){
        return 'Submit Xóa chuyên mục: '.$id;
    }
}
