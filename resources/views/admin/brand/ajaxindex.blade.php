 @if($data)
    @foreach($data as $v) 
		<tr>
			<td>{{ $v->brand_id }}</td>
			<td>{{ $v->brand_name }}</td>
			<td>{{$v->brand_urn}}</td>
            <td>{{$v->brand_desc}}</td>
			<td><img src="{{env('UPLOAD_URL')}}{{$v->brand_img}}" width="100"></td>
			<td>
            <a href="{{url('brand/edit/'.$v->brand_id)}}" class="btn btn-info">编辑</a>
            <a href="{{url('brand/destroy/'.$v->brand_id)}}"  class="btn btn-danger">删除</a>
            </td>
		</tr>
        @endforeach
    @endif
    <tr>
       <td colspan="6">
              {{$data->appends($query)->links()}}
        </td>
    </tr>    