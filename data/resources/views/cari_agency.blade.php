 <select class="form-control">
 	@foreach($hasil as $data)
	<option value="{{$data->kode_agency}}">{{$data->kode_agency}}</option>
@endforeach
 </select>