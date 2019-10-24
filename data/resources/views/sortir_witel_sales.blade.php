<?php  $count = 1; ?>
					@foreach($lihat as $data)
						<tr>
							<td>{{ $count++}}</td>
							<td>{{ $data-> nama}}</td>
							<td>{{ $data-> username}}</td>
							<td>{{ $data-> ID_User}}</td>
							<td>{{ $data-> no_hp}}</td>
							<td>{{ $data-> regional}}</td>
							<td>{{ $data-> witel}}</td>
							<td>{{ $data-> datel}}</td>
							<td>{{ $data-> sto}}</td>
							<td>{{ $data-> agency}}</td>
							<td>{{ $data-> kode_agency}}</td>
							<td>
							<img src="{{ asset('data/storage/profil/'.$data-> foto_profil)}}" width="80">
							</td>
							<td>{{ $data-> role}}</td>
							
							<td>
								@if($data->status)
								<span class="label label-pill label-success">ACTIVE</span>
								@else
								<span class="label label-pill label-error">NON ACTIVE</span>
								@endif
							</td>
							<td><div class="btn-group btn-group-sm" style="float: none;">
	<a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target=".detail{{$data->id}}" data-placement="bottom" title="Detail"><i class="fa fa-search-plus"></i></a>
	<a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target=".ubah_password{{$data->id}}" data-placement="bottom" title="Ubah Password"><i class="fa fa-unlock-alt"></i></a>
	<a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-toggle="modal" data-target=".ubah_data{{$data->id}}" data-placement="bottom" title="Ubah Data"><i class="fa fa-pencil"></i></a>
	<a href="hapus/{{$data->id}}" class="btn btn-danger btn-sm" data-toggle="tooltip"
		data-placement="bottom" title="Hapus" onclick="return confirmSubmit()"><i class="fa fa-trash"></i></a>
					</div>
				</td>		
						</tr>
						@endforeach