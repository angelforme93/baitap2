<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Slide;
use App\Danhmuc;
use App\Sanpham,App\User,App\custemmer,App\bill,App\bill_details;
use Cart;
use Validator;
use Auth;
use Carbon\Carbon;

use Illuminate\Http\Request;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function index(){
        $slide=Slide::all();
        $new_sp=Sanpham::where('new',1)->paginate(4);
        $top_sp=Sanpham::where('promotion_price','<>',0)->paginate(8);
        return view('index',compact('slide','new_sp','top_sp'));
    }

    public function category($id){
        $danhmuc=Danhmuc::all();
        $dm_sp=Sanpham::where('id_type',$id)->paginate(6);
        
        return view ('category',compact('danhmuc','dm_sp'));

    }
    public function chitietsp($id){
        $sanpham=Sanpham::where('id',$id)->first();
        $sp_type=Sanpham::where('id_type',$sanpham->id_type)->paginate(3);
        
        return view ('chitietsp',compact('sanpham','sp_type'));
    }
    public function themgiohang($id){
        $sp=Sanpham::find($id);
        if( $sp->promotion_price <> 0 )
                $price=$sp->promotion_price;
            
         else
                $price=$sp->unit_price;

        $san_p=[
            'id'=>$id,
            'name'=>$sp->name,
            'qty'=>'1',

            
            'price'=>$price,
            'options'=>[
                'image'=>$sp->image
            ]
            ];
            Cart::add($san_p);
           
            return redirect('index');

    }
    public function suahang(){
        return view ('shopping_cart');
    }
    public function login(){
        return view ('login');
    }
    public function checkLogin(Request $req)
    {
        $this->validate($req,
        [
            'email'=>'required|email',
            'password'=>'required|min:6',
        ],
        [
            'email.required'=>'Email không được để trống',
            'email.email'=>'Phải nhập đúng định dạng Email',
            'password.required'=>'Mật khẩu không được để trống',
            'password.min'=>'Mật khẩu phải từ 6 ký tự',
        ]
        );

        $arr=[
            'email'=>$req->email,
            'password'=>$req->password
        ];
           
             if(Auth::attempt($arr))
             {
               return redirect('index')->with('thongbao','Đăng nhập thành công');
             }
             else {
                return back()->with('thongbao','Email hoặc mật khẩu không chính xác');
             }     
    }
    public function Logout(){
        Auth::logout();
        return redirect('index')->with('thongbao','Đã đăng xuất');;
    }
    public function taouser(){
        return view ('taotk');
    }
    public function addUser(Request $req)
    {
        $this->validate($req,
        [
            'fullname'=>'required|min:3',
            'phone'=>'min:7|numeric',
            'pass'=>'required|min:6',

            'repass'=>'same:pass'
            
        ],
        [
            'fullname.required'=>'Tên không được để trống',
            'fullname.min'=>'Tên ít nhất 3 ký tự',
            
            'phone.min'=>'Số điện thoại không đúng',
         
            'phone.numeric'=>'Số điện thoại không đúng',
            'pass.required'=>'Mật khẩu không được để trống',
            'pass.min'=>'Mật khẩu ít nhất 6 ký tự',
            'repass.same'=>'Xác nhận lại mật khẩu không đúng'

        ]);
        $user=new User;
        $user->full_name = $req->fullname;
        $user->email = $req->email;
        $user->password = bcrypt($req->pass);
        $user->phone = $req->phone;
        $user->Lv=$req->chucvu;
        $user->save();
       
        return back()->with('thongbao','Tạo User thành công');
        
    }
    public function deleteCart(Request $req)
    {
        Cart::remove($req->rowId);
    }
    public function updateCart(Request $req)
    {
        Cart::update($req->rowId,$req->qty);
    }
    public function xacnhandonhang(Request $req){
            $custem=[
                 'email'=>$req->email,
                 'fullname'=>$req->name,
                 'phone'=>$req->phone,
                 'diachi'=>$req->add
            ];
            custemmer::insert($custem);
        
         $time=Carbon::now('Asia/Ho_Chi_Minh');   
                $bill=[
                    'qty'=>Cart::Count(),
                    'total'=>Cart::total(),
                    'email'=>$req->email,
                    'ngaytao'=>$time->toDateTimeString()
                ];
                 
               
                  bill::insert($bill);
            foreach (Cart::Content() as $cart) {
                # code...
                $sp=[
                    'email'=>$req->email,
                    'id_sp'=>$cart->id,
                    'soluong'=>$cart->qty,
                    'giaca'=>$cart->price
                ];
                bill_details::insert($sp);
            }
            return back()->with('thongbao','ĐẶT HÀNG THÀNH CÔNG');
            
    }
    public function hoanthanhdathang()
    {
        
        $user = custemmer
            ::join('bill_details','custemmer.email','=', 'bill_details.email')
             ->join('bill','custemmer.email','=','bill.email')
            ->join('products','products.id','=','bill_details.id_sp')
            ->select('custemmer.email','fullname','diachi','phone','bill.ngaytao','bill.total','products.name','bill_details.soluong'
            ,'bill_details.giaca','products.image')
            ->get();
           
        return view ('hoanthanh',compact('user'));
    }
    public function search(Request $req){
        $tukhoa=$req->seach;
          $query=str_replace(' ','%', $tukhoa);
          $data=Sanpham::where('name','like','%' . $query . '%')->paginate(8);
          return view('search',compact('data'));
        
    }

}
