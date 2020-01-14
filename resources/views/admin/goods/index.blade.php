<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>表格展示</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="/static/admin/js/jquery.js"></script>
	
</head>
<body>
<h3>表格展示</h3>
<h2><a href="{{url('goodscreate')}}">添加</a></h2>
<table class="table table-striped">
	<thead>
		<tr>
            <th>商品id</th>
			<th>商品名称</th>
			<th>商品品牌</th>
			<th>商品分类</th>
			<th>商品货号</th>
			<th>商品价格</th>
			<th>商品库存</th>
			<th>商品缩略图</th>
			<th>商品相册</th>
			<th>添加时间</th>
			<th>商品介绍</th>
			<th>操作</th>
		</tr>
	</thead>
	<tbody>
    
    @foreach($data as $v) 
		<tr>
			<td>{{ $v->goods_id }}</td>
			<td>{{ $v->goods_name }}</td>
			<td>{{$v->brand_name}}</td>
            <td>{{$v->cate_name}}</td>
			<td>{{$v->goods_sn}}</td>
			<td>{{ $v->goods_price }}</td>
			<td>{{ $v->goods_number }}</td>
			<td><img src="{{env('UPLOAD_URL')}}{{$v->goods_img}}" width="50"></td>
			<td>
			@if($v->goods_imgs)
			    @foreach($v->goods_imgs as $vv)
			    <img src="{{env('UPLOAD_URL')}}{{$vv}}" width="50">
			    @endforeach
			    @endif
			</td>
			<td>{{date("Y-m-d H:i:s",$v->add_time)}}</td>
			<td>{{$v->content}}</td>
			<td>
			 <a href="{{url('goods/show/'.$v->goods_id)}}" class="btn btn-info">详情页</a>
            <a href="{{url('goods/edit/'.$v->goods_id)}}" class="btn btn-info">编辑</a>
            <a onclick="ajaxdel({{$v->goods_id}})" href="javascript:void(0)"  class="btn btn-danger">删除</a>
            </td>
		</tr>
        @endforeach
    
	</tbody>
</table>
</body>

<script>
function ajaxdel(id){
       if(!id){
       	return;
       }
       $.get('goods/destroy/'+id,function(res){
       	  if(res.code=='00000'){
       	  	alert(res.msg);
       	  	location.reload();
       	  }
       },'json');
   }


//ajax分页
$(document).on('click','.pagination a',function(){
	//lert(111);
	var url = $(this).attr('href');
	$.get(url,function(res){
		$('tbody').html(res);
	});
	return false;
})
</script>	
</html>