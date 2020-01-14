<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator; 

use App\Wenzhang;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;

class WenzhangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
   {
    //     $w_name =request()->w_name;
    //     $page=request()->page;
        
    //     $data =redis::get('data_'.$w_name.'_'.$page);
        
    //     if(!$data){
    //         echo '数据库';
    //              $where=[];
    //             if($w_name){
    //             $where[]=['w_name','like',"%$w_name%"];
    //         }
        
    //              $data= Wenzhang::where($where)->paginate(2);
    //              $data=serialize($data);
    //              Redis::setex('data_'.$w_name.'_'.$page,20,$data);
    //        }
    //             $data = unserialize($data);
               
    //      $query = request() -> all();
  //         $w_name =request()->w_name;
  //         $page = request()->page;
  //         $data = redis::get('data_'.$w_name.'_'.$page);
  //         if(!$data){
  //           echo '数据库';
  //           $where=[];
  //           if($w_name){
  //               $where[]=['w_name','like',"%$w_name%"];
  //           }
  // $data =Wenzhang::where($where)->paginate(2);
  //           $data=serialize($data);
  //           Redis::setex('data_'.$w_name.'_'.$page,20,$data);
           
  //         }

  //           $data = unserialize($data);
  //           $query=request()->all();
    
    // $w_name = request()->w_name;
    // $page = request()->page;
    //  $data = redis::get('data_'.$w_name.'_'.$page);
    // if(!$data){
    //     echo '数据库'; 
    //     $where=[];
    //     if($w_name){
    //         $where[]=['w_name','like',"%$w_name%"];
    //     }
    //     $data = Wenzhang::where($where)->paginate(2);
    //     $data =serialize($data);
    //      Redis::setex('data_'.$w_name.'_'.$page,20,$data);
    //     //dd($data);
    // }
    //     $data = unserialize($data);
    //      $query=request()->all();
         $w_name = request()->w_name;
         $page = request()->page;
         $data=redis::get('data_'.$w_name.'_'.$page);
         if(!$data){
            echo '数据库';
            $where=[];
            if($w_name){
                $where[]=['w_name','like',"%$w_name%"];
            }
            $data = Wenzhang::where($where)->paginate(2);
            $data = serialize($data);
            Redis::setex('data_'.$w_name.'_'.$page,20,$data);


         }
         $data = unserialize($data);
      $query=request()->all();
         if(request()->ajax()){
            return view('admin.wenzhang.ajaxindex',['data'=>$data,'query'=>$query]);
          }

        
         return view('admin.wenzhang.index',['data'=>$data,'query'=>$query]);
       
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.wenzhang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $post = $request -> except('_token');

             if($request->hasFile('w_file')){
            $post['w_file'] = $this->upload('w_file');
         }
         // dd($post);
       $res=Wenzhang::insert($post);

        if($res){
            return redirect('/wenzhang');
        }
    }

     public function upload($w_file){
        if (request()->file($w_file)->isValid()) {
             $photo = request()->file($w_file);
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
        $data =Wenzhang::where('w_id',$id)->first();
        //dd($data);
      return view('admin.wenzhang.edit',['data'=>$data]);
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
        if($request->hasFile('w_file')){
            $post['w_file'] = $this->upload('w_file');
         }
      //dd($post);
      $res =Wenzhang::where('w_id',$id)->update($post);
     
      if($res!==false){
          return redirect('/wenzhang');
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
        // echo $id;die;
         //$res = Db::table('brand')->where('brand_id',$id)->delete();
        $res = Wenzhang::destroy($id);
        if($res){
           if(request()->ajax()){
            echo json_encode(['code'=>'00000','msg'=>'删除成功']);die;
           }
          
        }
    }
}
