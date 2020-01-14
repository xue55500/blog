<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title></title>
	<link rel="stylesheet" href="/static/admin/css/bootstrap.min.css">  
	
</head>
<body>
<h3>品牌编辑</h3><hr/>

<form class="form-horizontal" role="form" action="{{url('brand/update/'.$data->brand_id)}}" method="post" enctype="multipart/form-data">
@csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">品牌名称</label>
		<div class="col-sm-10">
			<input type="text"value="{{$data->brand_name}}"  name="brand_name" class="form-control" id="firstname" 
				   placeholder="请输入品牌名称">
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">品牌网址</label>
		<div class="col-sm-10">
			<input type="text"value="{{$data->brand_urn}}" name="brand_urn" class="form-control" id="firstname" 
				   placeholder="请输入品牌网址">
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">品牌LoGO</label>
		<div class="col-sm-10">
			<input type="file" name="brand_img" class="form-control" id="firstname" 
				   >
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">品牌介绍</label>
		<div class="col-sm-10">
		<img src="{{env('UPLOAD_URL')}}{{$data->brand_img}}" width="100">
		<textarea type="text" name="brand_desc" class="form-control" id="lastname" 
				  > {{$data->brand_desc}}</textarea>
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">编辑</button>
		</div>
	</div>
</form>

</body>
</html>