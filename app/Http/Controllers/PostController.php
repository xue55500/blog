<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use App\Brand;

use App\Http\Requests\StoreBlogPost;

use Validator;
  
use Illuminate\Support\Facades\Cache;

use Illuminate\Support\Facades\Redis;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
  


     
       $word = request()->word??'';
            $where=[];
       if( $word){
           $where[]=['brand_name','like',"%$word%"];
       }
       $page=request()->page;

       $data=Redis::get('data_'.$page.'_'.$word);
       //dump($data);
       if(!$data){
        echo '数据库';
       

       // if($brand_urn){
       //     $where[]=['brand_urn','like',"%$brand_urn%"];
       // }
         $data = Brand::where($where)->orderBy('brand_id','desc')->paginate(2);
         $data =serialize($data);
         Redis::setex('data_'.$page.'_'.$word,20,$data);
       }
      
         $data =unserialize($data);


          $query = request() -> all();

        if(request()->ajax()){
            return view('admin.brand.ajaxindex',['data'=>$data,'query'=>$query]);
        }
       
       return view('admin.brand.index',['data'=>$data,'query'=>$query]);
       
    }

    /**
     * Show the form for creating a new resource.
     *添加的页面
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *执行添加
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validatedData = $request->validate([ 
        //      'brand_name' => 'required|unique:brand|max:255'  ,
        //      'brand_urn' =>'required',

        // ],['brand_name.required'=>'品牌名称必填!',
        //     'brand_name.unique'=>'品牌已存在!',
        //     'brand_urn.required'=>'品牌网址必填!'
        // ]);


        $post = $request -> except('_token');

        // $validator = Validator::make($post, [
        //         'brand_name' => 'required|unique:brand|max:255'  ,
        //         'brand_urn' =>'required',
    
        //    ],['brand_name.required'=>'品牌名称必填!',
        //         'brand_name.unique'=>'品牌已存在!',
        //         'brand_urn.required'=>'品牌网址必填!'
        //     ]);
        //     if ($validator->fails()) {
        //     return redirect('brand/create')
        //     ->withErrors($validator)
        //    ->withInput();
        //     }
           
        // dd($post);
       //文件上传
       if($request->hasFile('brand_img')){
          $post['brand_img'] = $this->uploads('brand_img');
       }
       

        $res=Brand::insert($post);
       // $res = Db::table('brand') ->insert($post);
        //   $brand = new Brand();
        //   $brand->brand_name=$post['brand_name'];
        //   $brand->brand_urn =$post['brand_urn'];
        //   $brand->brand_desc=$post['brand_desc'];
        //   $res = $brand->save();
          
       //

        if($res){
            return redirect('/brand');
        }
    }

    public function uploads($brand_img){
        if (request()->file($brand_img)->isValid()) {
            $photo = request()->file($brand_img);
            $store_result = $photo->store('uploads');
            return $store_result;
            }
            exit('未获取到上传文件或上传过程出错');

}
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $data =Brand::where('brand_id',$id)->first();
      return view('admin.brand.edit',['data'=>$data]);
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
      $post = $request-> except('_token');
       //文件上传
       if($request->hasFile('brand_img')){
        $post['brand_img'] = $this->upload('brand_img');
     }
      //dd($post);
      $res =Brand::where('brand_id',$id)->update($post);
     
      if($res!==false){
          return redirect('/brand');
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //$res = Db::table('brand')->where('brand_id',$id)->delete();
        $res = Brand::destroy('brand_id',$id);
        if($res!==false){
            return redirect('/brand');
        }
    }
    public function checkOnly(){
      $brand_name = request()->brand_name;
      $where = [];
      if($brand_name){
          $where['brand_name']=$brand_name;
      }
      $count =  Brand::where($where)->count();
      echo $count;
    }
}
