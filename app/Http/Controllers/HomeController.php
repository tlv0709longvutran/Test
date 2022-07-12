<?php
    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Http\Requests\ProductRequest;
    use Illuminate\Support\Facades\Validator;
    use App\Rules\Uppercase;

    //use Illuminate\Support\Facades\DB;

    use DB;
    use Illuminate\Support\Facades\DB as FacadesDB;

    class HomeController extends Controller
    {
        public $data = [];
        public function index(){

            $this->data['title'] = 'Đào tạo lập trình web';
            $this->data['message'] = 'Dang ki tai khoan thanh cong';

            //$user = FacadesDB::select('SELECT * FROM users WHERE id > ?' ,[1]);
            // $user = FacadesDB::select('SELECT * FROM users WHERE email=:email' ,[
            //     'email' => 'longvu@gmail.com',
            // ]);
            // dd($user);
            return view('client.home' , $this->data);
        }

        public function product(){

            $this->data['title'] = 'Sản Phẩm';

            return view('client.product' , $this->data);
        }

        public function news(){

            $this->data['title'] = 'Tin Tức';
            return view('client.news' , $this->data);
        }

        public function contact(){

            $this->data['title'] = 'Liên Hệ';
            return view('client.contact' , $this->data);
        }

        public function service(){

            $this->data['title'] = 'Dịch Vụ';
            return view('client.service' , $this->data);
        }

        public function recommand(){

            $this->data['title'] = 'Giới Thiệu';
            return view('client.recommand' , $this->data);
        }

        public function getAdd() {
            $this->data['title'] = 'Thêm sản phẩm';
            $this->data['errorMessage'] = ' Vui long kiem tra lai du lieu';

            return view('client.add' ,$this->data );
        }

        public function postAdd(Request $request) {
            $rule = [
                        'product_name' => ['required' ,'min:6'],
                        'product_price' => ['required','integer']
                    ];
            $message =[
                'required' => ':attribute bắt buộc phải nhập',
                'min' => ':attribute không được nhỏ hơn :min kí tự',
                'integer' => ':attribute phải là số'
            ];

            $attribute= [
                'product_name' => 'Tên Sản Phẩm',
                'product_price' => 'Giá Sản Phẩm'
            ];
            //$validator = Validator::make($request->all() , $rule , $message , $attribute);

            //$validator->validate();

            //$request->validate($rule , $message);

            return response()->json(['status'=>'success']);
            //$validator->validate();
            // if($validator->fails()){
            //     $validator->errors()->add('msg','Vui lòng kiểm tra lại dữ liệu');
            //     //return 'Validate thất bại';
            // }else {
            //     //return ' validate thành công';
            //     return redirect()->route('products')->with('msg','Validate thành công');
            // }
            // return back()->withErrors($validator);



            //     $request->validate($rule , $message);
        }

        public function putAdd(Request $request) {
            dd($request);
        }

        public function downloadImage(Request $request){
            if(!empty($request->image)){
                $image = trim($request->image);

                // $fileName = 'image_'.uniqid().'jpg';
                $fileName = basename($image);

                // return response()->streamDownload(function() use ($image){
                //     $imageContent = file_get_contents($image);
                // } , $fileName   );

                //return response()->download($image);
                return response()->download($image , $fileName);
            }
        }

        public function isUppercase($value , $message , $fail) {
            if($value != mb_strtoupper($value , 'UTF-8')){
                $fail($message);
            }
        }
    }
?>
