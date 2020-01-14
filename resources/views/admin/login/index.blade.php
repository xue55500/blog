<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>列表</title>
<script src="/static/admin/js/jquery.js"></script>
	<table>
	<thead>
		<tr>
      <th>id</th>
			<th>用户昵称</th>
			<th>用户身份</th>
			<th>操作</th>
		</tr>
	</thead>
	<tbody>
    @if($data)
    @foreach($data as $v) 
		<tr>
		    <td>{{$v->d_id}}</td>
			  <td>{{ $v->d_name }}</td>
        <td>{{$v->d_paa==1?'主管':'库管员'}}</td>
		</tr>


        @endforeach
        
    @endif

    <tr>
       <td colspan="6">
              {{$data->appends($query)->links()}}
        </td>
    </tr>    
	
</table>
</body>
</html>