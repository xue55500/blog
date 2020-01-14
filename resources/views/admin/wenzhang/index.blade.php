<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>列表</title>
<script src="/static/admin/js/jquery.js"></script>
	<table>
  <form>
       新闻昵称<input type="text" name="w_name" value="{{$query['w_name']??''}}">
       <input type="submit" value="搜索">
  </form>
	<thead>
		<tr>
      <th>id</th>
			<th>新闻昵称</th>
			<th>内容</th>
			<th>操作</th>
		</tr>
	</thead>
	<tbody>
    @if($data)
    @foreach($data as $v) 
		<tr>
		    <td>{{$v->w_id}}</td>
			  <td>{{ $v->w_name }}</td>
        <td>{{$v->w_fei}}</td>
         <!--    <td>
            <a onclick="ajaxdel({{$v->w_id}})" href="javascript:void(0)"  class="btn btn-danger">删除</a>
            
            </td>
		</tr> -->


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
<script>
   function ajaxdel(id){
       if(!id){
       	return;
       }
       $.get('wenzhang/destroy/'+id,function(res){
       	  if(res.code=='00000'){
       	  	alert(res.msg);
       	  	location.reload();
       	  }
       },'json');
   }

   $(document).on('click','.pagination a',function(){
    //alert(111);
   var url = $(this).attr('href');
	$.get(url,function(res){
		$('tbody').html(res);
	});
	return false;

  });
</script>
