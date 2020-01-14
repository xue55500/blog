<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title></title>
	<link rel="stylesheet" href="/static/admin/css/bootstrap.min.css">  
	
</head>
<body>
<h3>品牌添加</h3><hr/>
<!-- @if ($errors->any())
 <div class="alert alert-danger">
 <ul>
 @foreach ($errors->all() as $error)
 <li>{{ $error }}</li>
 @endforeach
 </ul>
 </div>
@endif -->
<form class="form-horizontal" role="form" action="{{url('category/store')}}" method="post" enctype="multipart/form-data">
@csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">分类名称</label>
		<div class="col-sm-10">
			<input type="text" name="cate_name" class="form-control" id="firstname"
				   placeholder="请输入分类名称">
				   <b style="color:#9b9fdb">{{$errors->first('cate_name')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">是否显示</label>
		<div class="col-sm-10">
			<input type="radio" name="cate_show" id="firstname" value="1">是
			<input type="radio" name="cate_show" id="firstname" value="2">否

		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">是否导航栏</label>
		<div class="col-sm-10">
			<input type="radio" name="cate_nav_show" id="firstname" value="1">是
			<input type="radio" name="cate_nav_show" id="firstname" value="2">否
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">父类</label>
		<div class="col-sm-10">
		<select class="form-control" name="parent_id">
			<option value="0">请选择</option>
			@foreach($data as $v)
			<option value="{{$v->cate_id}}">{{str_repeat('|——',$v->level)}}{{$v->cate_name}}</option>
			@endforeach
		</select>
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">添加</button>
		</div>
	</div>
</form>

</body>
</html>