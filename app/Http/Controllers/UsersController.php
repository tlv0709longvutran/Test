<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\Users;
use SebastianBergmann\CodeUnit\FunctionUnit;

class UsersController extends Controller
{
    private $users;
    public function __construct()
    {
        $this->users = new Users();
    }

    public function index() {

        $title = 'Danh sách người dùng';

        $this->users->learnQueryBuilder();

        $usersList = $this->users->getAllUser();

        return view('client.users.list' , compact('title','usersList'));
    }

    public function add(){
        $title = ' Thêm người dùng';

        return view('client.users.add' , compact('title'));
    }

    public function postAdd(Request $request){
        $request->validate([
            'fullname' => 'required|min:5',
            'email' => 'required|email|unique:users'
        ], [
            'fullname.required' => ' Họ và tên bắt buộc phải nhập',
            'fullname.min' => 'Họ và tên phải từ :min kí tự trở lên',
            'email.required' => 'Email bắt buộc phải nhập',
            'email.email' => ' Email không đúng định dạng',
            'email.unique' => 'Email đã tồn tại trên hệ thống'
        ]);

        $dataInsert = [
            $request->fullname,
            $request->email,
            date('Y-m-d H:i:s')

        ];

        $this->users->addUsers($dataInsert);

        return redirect()->route('users.index')->with('msg' , 'Thêm người dùng thành công');
    }

    public function getEdit(Request $request,$id = 0){
        $title = 'Cập nhật người dùng';

        if(!empty($id)){
            $usersDetail =  $this->users->getDetail($id);
            if(!empty($usersDetail[0])){
                $request->session()->put('id',$id);
                $usersDetail = $usersDetail[0];
            }else{
                return redirect()->route('users.index')->with('msg' , 'Người dùng không tồn tại');
            }
        }else{
            return redirect()->route('users.index')->with('msg' , 'Liên kết không tồn tại');
        }

        return view('client.users.edit' , compact('title' , 'usersDetail'));
    }

    public function postEdit(Request $request){
        $id = session('id');
        if(empty($id)){
            return back()->with('msg','Liên kết không tồn tại');
        }
        $request->validate([
            'fullname' => 'required|min:5',
            'email' => 'required|email|unique:users,email,'.$id
        ], [
            'fullname.required' => ' Họ và tên bắt buộc phải nhập',
            'fullname.min' => 'Họ và tên phải từ :min kí tự trở lên',
            'email.required' => 'Email bắt buộc phải nhập',
            'email.email' => ' Email không đúng định dạng',
            'email.unique' => 'Email đã tồn tại trên hệ thống'
        ]);
        $dataUpdate = [
            $request->fullname,
            $request->email,
            date('Y-m-d H:i:s')
        ];
        $this->users->updateUser($dataUpdate , $id);

        return back()->with('msg','Cập nhật người dùng');
    }

    public function delete($id = 0){
        if(!empty($id)){
            $usersDetail =  $this->users->getDetail($id);
            if(!empty($usersDetail[0])){
                $deleteStatus = $this->users->deleteUser($id);

                if($deleteStatus){
                    $msg = 'Xóa người dùng thành công';
                }else{
                    $msg = 'Bạn không thể xóa người dùng lúc này . Vui lòng thử lại sau';
                }
            }else{
                $msg = 'Người dùng không tồn tại';
            }
        }else{
            $msg = 'Liên kết không tồn tại';
        }

        return redirect()->route('users.index')->with('msg' , $msg);

    }
}
