<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>添加</title>
</head>
<body>
	 <form class="form-horizontal" role="form" action="{{url('wenzhang/update/'.$data->w_id)}}" method="post" enctype="multipart/form-data">
     @csrf
	     <table border="1px">
	          <tr>
	          	<td>小区名</td>
	          	<td>
	          	    <input type="text" name="w_name" value="{{$data->w_name}}">
	          	</td>
	          </tr>
	           <tr>
	          	<td>地理位置</td>
	          	<td>
	          	    <input type="text" name="w_fei" value="{{$data->w_fei}}">
	          	</td>
	          </tr>
	           <tr>
	          	<td>面积</td>
	          	<td>
	          	    <input type="text" name="w_zhong" value="{{$data->w_zhong}}">
	          	</td>
	          </tr>
	           <tr>
	          	<td>导购员</td>
	          	<td>
	          	    <input type="text" name="w_xian" value="{{$data->w_xian}}">
	          	</td>
	          </tr>
	          <td>联系电话</td>
	          	<td>
	          	    <input type="text" name="w_zuo" value="{{$data->w_zuo}}">
	          	</td>
	          </tr>
	          <tr>
	          	<td>上传文件</td>
	          	<td><input type="file" name="w_file"><img src="{{env('UPLOAD_URL')}}{{$data->w_file}}" width="50"></td>
	          </tr>
	          <tr>
	          	<td></td>
	          	<td><input type="submit" value="加入购物车"></td>
	          </tr>
	     </table>
    </form>
</body>
</html>