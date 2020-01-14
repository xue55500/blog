<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $data = Category::get();

        $data = createTRee($data);

        return view('admin.category.index',['data'=>$data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $data = Category::get();
          //无限极分类

         $data = createTRee($data);


         return view('admin.category.create',['data'=>$data]);
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
        $res = Category::insert($post);

        if($res){
            return redirect('/category');
        }
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
        $res =Category::find($id);
        //dd($res);
        $data =Category::get();
        $data = createTRee($data);



        return view('admin.category.edit',['data'=>$data,'res'=>$res]);
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
       $data = $request->except('_token');
        $res =Category::where('cate_id',$id)->update($data);

        if($res!==false){
            return redirect('/category');
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
        $res = Category::destroy($id);
        if($res){
            return redirect('/category');
        }
    }
}
