<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>列表</title>
</head>
<body>
	<tr>
		<td>id</td>
		<td>用户名</td>
		<td>w_id</td>
		<td>时间</td>
	</tr>
	@foreach($data as $v)
	<tr>
		<td>{{$v.c_id}}</td>
		<td>{{$v->w_id}}</td>
		<td>{{$v->d_id}}</td>
		<td>{{$v->c_time}}</td>
	</tr>
	@endforeach
</body>
</html>