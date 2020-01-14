<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>添加</title>
</head>
<body>
	 <form class="form-horizontal" role="form" action="{{url('wenzhang/store')}}" method="post">
     @csrf
	     <table border="1px">
	          <tr>
	          	<td>新闻名称</td>
	          	<td>
	          	    <input type="text" name="w_name">
	          	</td>
	          </tr>
	          <tr>
	          	<td>新闻内容</td>
	          	<td>
	          	    <input type="text" name="w_fei">
	          	</td>
	          </tr>
	          	<td></td>
	          	<td><input type="submit" value="添加"></td>
	          </tr>
	     </table>
    </form>
</body>
</html>