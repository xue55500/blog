<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title></title>
	<link rel="stylesheet" href="/static/admin/css/bootstrap.min.css">  
	<script src="/static/admin/js/jquery.js"></script>
</head>
<body>
<h3>品牌添加</h3><hr/>

<form class="form-horizontal" role="form" action="{{url('brand/store')}}" method="post">
@csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">分类名称</label>
		<div class="col-sm-10">
			<input type="text" name="brand_name" class="form-control" id="firstname"
				   placeholder="请输入品牌名称">
				   <b style="color:#9b9fdb">{{$errors->first('cate_name')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">品牌网址</label>
		<div class="col-sm-10">
			<input type="text" name="brand_urn" class="form-control" id="firstname"
				   placeholder="请输入品牌网址">
				   <b style="color:#9b9fdb">{{$errors->first('cate_show')}}</b>
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
		<textarea type="text" name="brand_desc" class="form-control" id="lastname" 
				  ></textarea>
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">添加</button>
		</div>
	</div>
</form>

</body>
<script>
    $('input[name="brand_name"]').blur(function(){
    	//alert(1111);
    	$(this).next().text('');
    	var brand_name=$(this).val();
    	var reg = /^[\u4e00-\u9fa5\w.\-]{1,16}$/;
    	if(!reg.test(brand_name)){
    		$(this).next().text('品牌名称需是中字,字母,数字,下划线,点,横线组成');
    		return false;
    	}
    	 //ajax唯一性
    	$.ajax({
    		method:"get",
             url:"/brand/checkOnly",
             data:{brand_name:brand_name},
             dataType:'jscn',
    	}).done(function(res){
    		if(res!=0){
    			$('input[name="brand_name"]').next().text('品牌名称已存在');
    		}
    	})


 	
 });

     $('input[name="brand_urn"]').blur(function(){
    	//alert(1111);
    	$(this).next().text('');
    	var brand_urn=$(this).val();
    	var reg = /^http:\/\/*/;
    	if(!reg.test(brand_urn)){
    		$(this).next().text('品牌网址需http开头');
    		return;
    	}
 	
 	
 });
</script>
</html>