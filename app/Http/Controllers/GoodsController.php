<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use App\Category;
use App\Goods;
use App\Cart;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Redis;

class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      // // 存
      // Cookie::queue('goods_name', 'zhangsan', 1);
      // // 取
      // echo cookie::get('goods_name');die;


        $pageSize = config('app.pageSize');
        
        $data =Goods::select('goods.*','brand.brand_name','category.cate_name')
              ->leftjoin('brand','goods.brand_id','=','brand.brand_id')
              ->leftjoin('category','goods.cate_id','=','category.cate_id')
              ->orderBy('goods_id','desc')
              ->paginate($pageSize);
       foreach ($data as $v) {
          if($v->goods_imgs){
            $v->goods_imgs = explode('|', $v->goods_imgs);
          }
       }
       //dd($data);
       return view('admin.goods.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        //获取品牌数据
        $brand = Brand::get();

        //获取分类数据
        $cate = Category::get();
          //无限极分类
         $cate = createTRee($cate);

        return view('admin/goods/create',['brand'=>$brand,'cate'=>$cate]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $post = $request->except('_token');
       // dd($post);
        //单个文件上传
         if(request()->hasFile('goods_img')){
            $post['goods_img'] = uploads('goods_img');
         }
         //多文件
         if($request->hasFile('goods_imgs')){
            $goods_imgs=uploads('goods_imgs');
            $post['goods_imgs']=implode('|', $goods_imgs);
         }
          $post['add_time']=time();
          $post['update_timg']=time();
        $res = Goods::insert($post);
        return redirect('/goods');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     $goods = Goods::find($id);
    //     return view('admin.goods.show',['goods'=>$goods]);
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
 public function show($id)
    {
        $data=Goods::where('goods_id',$id)->get();
       $res = Redis::setnx('num'.$id,0);
        if(!$res){ 
          Redis::incr('num'.$id);
        }
        
        $num=Redis::get('num'.$id);
        return view('admin.goods.show',['num'=>$num,'data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = Goods::destroy($id);
        if($res){
           if(request()->ajax()){
            echo json_encode(['code'=>'00000','msg'=>'删除成功']);die;
           }
          
        }
    
    }
    /*
        添加购物车
     */
    public function addcart()
    {
       $goods_id = request()->goods_id;
        $buy_number = 1;
       if(!$this->isLogin()){
       
       }
       //登录存入购物车表
       $this->addDBcart($goods_id,$buy_number);
      
    }
    public function addDBcart($goods_id, $buy_number){
       $goods = Goods::where('goods_id',$goods_id)->first();
       if($goods->goods_number<$goods_number){
         if($res){ echo json_encode(['code'=>'00002','msg'=>'商品不足']);die;
       }
       //求商品信息
       $cart = Goods::where('goods_id',$goods_id)->first();
       //判断库存
       if($cart->buy_number+$buy_number>$goods->goods_number){
             if($res){ echo json_encode(['code'=>'00002','msg'=>'商品不足']);die;}
       }


        $user_id = session('admin')->d_id;
		//dd($user_id);
        //判断用户是否之前购买过
            $cart= Cart::where(['goods_id'=>$goods_id,'d_id'=>$user_id])->first();
            //dd($cart);die;
            if($cart){
                //更新购买数量
               $res = Cart::where(['goods_id'=>$goods_id,'d_id'=>$user_id])->increment('buy_number');
              if($res){ echo json_encode(['code'=>'00000','msg'=>'加入购物车成功']);die;}
            }
         //没有购买够则正常添加到数据库
         
        
       
        $data = [
                  'd_id'=>$user_id,
                  'goods_id'=>$goods_id,
                  'buy_number'=>1,
                  'goods_price'=>$goods->goods_price,
                  'addtime'=>time()

                ];
                
              $res=Cart::insert($data);
              if($res){
               echo json_encode(['code'=>'00000','msg'=>'加入购物车成功']);die;
              }
    }
}
    public function isLogin(){
        $user = session('admin');
        if(!$user){
            return false;
        }
           return true;
    }
}
