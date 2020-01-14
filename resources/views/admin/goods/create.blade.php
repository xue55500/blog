<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title></title>
	<link rel="stylesheet" href="/static/admin/css/bootstrap.min.css">  
	<script src="/static/admin/js/jquery.js"></script>
	<script src="/static/admin/js/bootstrap.min.js"></script>
</head>
<body>
<h3>商品添加</h3><hr/>

<form class="form-horizontal" role="form" action="{{url('goods/store')}}" method="post" enctype="multipart/form-data">
@csrf

   <ul id="myTab" class="nav nav-tabs">
	<li class="active">
		<a href="#home" data-toggle="tab">
			 基础信息
		</a>
	</li>
	<li><a href="#ios" data-toggle="tab">商品相册</a></li>
	<li><a href="#desc" data-toggle="tab">商品详情</a></li>
	
</ul>
<div id="myTabContent" class="tab-content">
	<div class="tab-pane fade in active" id="home">
		<p>
          
          <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品名称</label>
		<div class="col-sm-10">
			<input type="text" name="goods_name" class="form-control" id="firstname"
				>	   
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">商品品牌</label>
		<div class="col-sm-10">
		<select class="form-control" name="brand_id">
			<option value="0">请选择商品品牌</option>
				@foreach($brand as $v)
			<option value="{{$v->brand_id}}">{{$v->brand_name}}</option>
			@endforeach
		</select>
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">商品分类</label>
		<div class="col-sm-10">
		<select class="form-control" name="cate_id">
			<option value="0">请选择商品分类</option>
			  @foreach($cate as $v)
			<option value="{{$v->cate_id}}">{{str_repeat('|——',$v->level)}}{{$v->cate_name}}</option>
			@endforeach
		</select>
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品货号</label>
		<div class="col-sm-10">
			<input type="text" name="goods_sn" class="form-control" id="firstname"
				   >
				
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品价格</label>
		<div class="col-sm-10">
			<input type="text" name="goods_price" class="form-control" id="firstname"
				   >
				  
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品库存</label>
		<div class="col-sm-10">
			<input type="text" name="goods_number" class="form-control" id="firstname"
				   >
				 
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品缩略图</label>
		<div class="col-sm-10">
			<input type="file" name="goods_img" class="form-control" id="firstname" 
				   >
		</div>
	</div>
      

		</p>
	</div>
	<div class="tab-pane fade" id="ios">
		<p>
          
          <div class="form-group">
		    <label for="firstname" class="col-sm-2 control-label">商品相册</label>
		 <div class="col-sm-10">
			<input type="file" name="goods_imgs[]" class="form-control"  multiple="multiple" id="firstname" 
				   >
		</div>
	</div>


		</p>
	</div>
	<div class="tab-pane fade" id="desc">
		<p>
          <div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">商品介绍</label>
		<div class="col-sm-10">
		<textarea type="text" name="content" class="form-control" id="lastname" 
				  ></textarea>
		</div>
	</div>


		</p>
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