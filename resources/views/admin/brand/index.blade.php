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
<h3>欢迎[{{session('admin')->d_name}}]登录,<a href="{{url('login/loginDo')}}">退出</a></h3>
<h2><a href="{{url('brand/create')}}">添加</a></h2>

<form>
   <input type="text" name="brand_name" value="{{$query['brand_name']??''}}">
   <input type="text" name="brand_urn" value="{{$query['brand_urn']??''}}">
   <input type="submit" value="搜索">
</form>
<table class="table table-striped">
	<thead>
		<tr>
            <th>品牌id</th>
			<th>品牌名称</th>
			<th>品牌网址</th>
			<th>品牌介绍</th>
			<th>品牌图片</th>
			<th>操作</th>
		</tr>
	</thead>
	<tbody>
    @if($data)
    @foreach($data as $v) 
		<tr>
			<td>{{ $v->brand_id }}</td>
			<td>{{ $v->brand_name }}</td>
			<td>{{$v->brand_urn}}</td>
            <td>{{$v->brand_desc}}</td>
			<td><img src="{{env('UPLOAD_URL')}}{{$v->brand_img}}" width="100"></td>
			<td>
            <a href="{{url('brand/edit/'.$v->brand_id)}}" class="btn btn-info">编辑</a>
            <a href="{{url('brand/destroy/'.$v->brand_id)}}"  class="btn btn-danger">删除</a>
            </td>
		</tr>
        @endforeach
    @endif
    <tr>
       <td colspan="6">
              {{$data->appends($query)->links()}}
        </td>
    </tr>    
	</tbody>
</table>
</body>

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
</html>