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
<h2><a href="{{url('category/create')}}">添加</a></h2>

<form>
   <input type="text" name="brand_name" value="{{$query['brand_name']??''}}">
   <input type="text" name="brand_urn" value="{{$query['brand_urn']??''}}">
   <input type="submit" value="搜索">
</form>
<table class="table table-striped">
	<thead>
		<tr>
            <th>分类id</th>
			<th>分类名称</th>
			<th>是否显示</th>
			<th>是否导航栏显示</th>
			<th>父类</th>
			<th>操作</th>
		</tr>
	</thead>
	<tbody>

    @foreach($data as $v) 
		<tr>
			<td>{{$v->cate_id}}</td>
			<td>{{$v->cate_name}}</td>
			<td>{{$v->cate_show}}</td>
            <td>{{$v->cate_nav_show}}</td>
			<td>{{str_repeat('|——',$v->level)}}{{$v->cate_name}}</td>
			<td>
            <a href="{{url('/category/edit/'.$v->cate_id)}}" class="btn btn-info">编辑</a>
            <a href="{{url('/category/destroy/'.$v->cate_id)}}"  class="btn btn-danger">删除</a>
            </td>
		</tr>
        @endforeach

	</tbody>
</table>
</body>
</html>
<script>
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


	