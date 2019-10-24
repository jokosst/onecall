@include('header')
@include('sidebar')


	<div class="page-content">
		<div class="container-fluid">
				
		<header class="section-header">
				<div class="tbl">
					<div class="tbl-row">
						<div class="tbl-cell">
							<h2>ADMIN</h2>
							<ol class="breadcrumb breadcrumb-simple">
								<li><a href="#">Home</a></li>
								<li class="active">Admin</li>
							</ol>
						</div>
					</div>
				</div>
			</header>
			<section class="card">
				<div class="card-block">
					<a href="#" class="btn btn-inline btn-primary" data-toggle="modal"
						data-target=".tambah_dgn_modal"><i class="fa fa-plus-circle"></i> Tambah</a>
						@if(Session::has('error'))
          <p style="color:red;" ;>*{{Session::get('error')}}</p>
          @elseif(Session::has('sukses_ubah_admin'))
          <p style="color:red;" ;>*{{Session::get('sukses_ubah_admin')}}</p>
        @endif
					<table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
						<tr>
							<th>No</th>
							<th>Level</th>
							<th>Username</th>
							<th>Witel</th>
							<th>Gambar</th>
							<th>Opsi</th>
						</tr>
						</thead>
						
						
						<tbody>
							<?php  $count = 1; ?>
					@foreach($lihat as $data)
						<tr>
							<td>{{ $count++}}</td>
							<td>{{ $data-> level}}</td>
							<td>{{ $data-> username}}</td>
							<td>{{ $data-> witel}}</td>
							<td>
							<img src="{{ asset('data/storage/profil/'.$data-> foto_profil)}}" width="80">
							</td>
							<td><div class="btn-group btn-group-sm" style="float: none;">
	<a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target=".ubah_password{{$data->id}}" data-placement="bottom" title="Ubah Password"><i class="fa fa-unlock-alt"></i></a>
	<a href="hapus_admin/{{$data->id}}" class="btn btn-danger btn-sm" data-toggle="tooltip"
		data-placement="bottom" title="Hapus" onclick="return confirmSubmit()"><i class="fa fa-trash"></i></a>
					</div>
				</td>
					
						</tr>
						@endforeach

						<script>
                  function confirmSubmit()
                    {
                        var agree=confirm("Apakah anda yakin akan menghapus Data ini?");
                        if (agree)
                            return true ;
                        else
                            return false ;
                    }
                </script>
						</tbody>
						
						
					</table>
				</div>
			</section>	
			<div class="modal fade tambah_dgn_modal"
					 tabindex="-1"
					 role="dialog"
					 aria-labelledby="myLargeModalLabel"
					 aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">
									<i class="font-icon-close-2"></i>
								</button>
								<h4 class="modal-title" id="myModalLabel"><i class="fa fa-dot-circle-o"></i> TAMBAH ADMIN</h4>
							</div>
							<form action="tambah_admin" method="post" enctype="multipart/form-data">
								{{ csrf_field() }}
							<div class="modal-body">

					<div class="form-group row">
						<label class="col-sm-4 form-control-label">1. Level</label>
						<div class="col-sm-8">
							<p class="form-control-static"><input type="text" name="nama" class="form-control" value="admin" disabled></p>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-4 form-control-label">2. Username</label>
						<div class="col-sm-8">
							<p class="form-control-static"><input type="text" name="username" class="form-control" required></p>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-4 form-control-label">3. Password</label>
						<div class="col-sm-8">
							<p class="form-control-static"><input type="text" name="password" class="form-control" required></p>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-4 form-control-label">4. Witel</label>
						<div class="col-sm-8">
							<p class="form-control-static">
								<select name="witel" class="form-control">
									 @foreach($lihat_witel as $data)
									<option value="{{$data->witel}}">{{$data->witel}}</option>
									@endforeach
								</select></p>
						</div>
					</div>

			
							</div>
							<div class="modal-footer">
								<button type="reset" class="btn btn-inline btn-secondary"><i class="fa fa-refresh"></i> RESET</button>
								<button type="submit" name="save" class="btn btn-inline btn-success"><i class="fa fa-save"></i> SIMPAN</button>
							</div>
	</form>		
						</div>
					</div>
				</div>
		
				
		</div><!--.container-fluid-->
	</div><!--.page-content-->
@include('footer')
<!-- modal ubah password -->
@foreach($lihat as $data)
				<div class="modal fade ubah_password{{$data->id}}"
					 tabindex="-1"
					 role="dialog"
					 aria-labelledby="myLargeModalLabel"
					 aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">
									<i class="font-icon-close-2"></i>
								</button>
								<h4 class="modal-title" id="myModalLabel"><i class="fa fa-unlock-alt"></i> UBAH ADMIN</h4>
							</div>
							<form action="{{URL::to('ubah_password_admin')}}/{{$data->id}}" method="post" enctype="multipart/form-data">
								{{ csrf_field() }}
							<div class="modal-body">
								
								<div class="form-group row">
						<label class="col-sm-4 form-control-label">Username</label>
						<div class="col-sm-8">
							<p class="form-control-static"><input type="text" name="username" class="form-control" value="{{$data->username}}"></p>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-4 form-control-label">Password</label>
						<div class="col-sm-8">
							<p class="form-control-static"><input type="text" name="password" class="form-control" placeholder="Password Baru" required></p>
						</div>
					</div>
							</div>
							<div class="modal-footer">
								<button type="submit" name="save" class="btn btn-inline btn-success"><i class="fa fa-save"></i> UBAH</button>
							</div>
							</form>
							</div>
							</div>
							</div>
@endforeach