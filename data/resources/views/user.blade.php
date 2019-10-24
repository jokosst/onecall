@include('header')
@include('sidebar')

	<div class="page-content">
		<div class="container-fluid">
				
		<header class="section-header">
				<div class="tbl">
					<div class="tbl-row">
						<div class="tbl-cell">
							<h2>SALES</h2>
							<ol class="breadcrumb breadcrumb-simple">
								<li><a href="#">Home</a></li>
								<li class="active">Sales</li>
							</ol>
						</div>
					</div>
				</div>
			</header>
			<section class="card">
				<div class="card-block">
					<a href="#" class="btn btn-inline btn-primary" data-toggle="modal"
						data-target=".tambah_dgn_modal"><i class="fa fa-plus-circle"></i> Tambah</a>
					<table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
						<tr>
							<th>No</th>
							<th>Nama</th>
							<th>Username</th>
							<th>Email</th>
							<th>No Hp</th>
							<th>Opsi</th>
						</tr>
						</thead>
						<tfoot>
						<tr>
							<th>No</th>
							<th>Nama</th>
							<th>Username</th>
							<th>Email</th>
							<th>No Hp</th>
							<th>Opsi</th>
						</tr>
						</tfoot>
						
						<tbody>
							<?php  $count = 1; ?>
					@foreach($lihat as $data)
						<tr>
							<td>{{ $count++}}</td>
							<td>{{ $data-> nama}}</td>
							<td>{{ $data-> username}}</td>
							<td>{{ $data-> email}}</td>
							<td>{{ $data-> no_hp}}</td>
							<td></td>
							
						</tr>
						@endforeach
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
								<h4 class="modal-title" id="myModalLabel"><i class="fa fa-dot-circle-o"></i> TAMBAH SALES</h4>
							</div>
							<form action="tambah_user" method="post" enctype="multipart/form-data">
							<div class="modal-body">

					<div class="form-group row">
						<label class="col-sm-4 form-control-label">Nama</label>
						<div class="col-sm-8">
							<p class="form-control-static"><input type="text" name="nama" class="form-control" id="inputPassword"></p>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-4 form-control-label">Username</label>
						<div class="col-sm-8">
							<p class="form-control-static"><input type="text" name="username" class="form-control" id="inputPassword"></p>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-4 form-control-label">Password</label>
						<div class="col-sm-8">
							<p class="form-control-static"><input type="text" name="password" class="form-control" id="inputPassword"></p>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-4 form-control-label">Email</label>
						<div class="col-sm-8">
							<p class="form-control-static"><input type="text" name="email" class="form-control" id="inputPassword"></p>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-4 form-control-label">No HP</label>
						<div class="col-sm-8">
							<p class="form-control-static"><input type="text" name="no_hp" class="form-control" id="inputPassword"></p>
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