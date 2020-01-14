 @if($data)
    @foreach($data as $v) 
        <tr>
            <td>{{$v->w_id}}</td>
              <td>{{ $v->w_name }}</td>
        <td>{{$v->w_fei}}</td>
        <td>{{ $v->w_zhong }}</td>
        <td>{{$v->w_xian}}</td>
        <td>{{ $v->w_zuo }}</td>    
            <td><img src="{{env('UPLOAD_URL')}}{{$v->w_file}}" width="50"></td>
            <td>
           <!--  <a href="{{url('wenzhang/edit/'.$v->w_id)}}" class="btn btn-info">编辑</a> -->
            <a onclick="ajaxdel({{$v->w_id}})" href="javascript:void(0)"  class="btn btn-danger">删除</a>
            </td>
        </tr>


        @endforeach
        
    @endif

    <tr>
       <td colspan="6">
              {{$data->appends($query)->links()}}
        </td>
    </tr>    
    