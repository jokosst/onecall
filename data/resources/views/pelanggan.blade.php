@include('header')
@include('sidebar')

	<style type="text/css">
		.table-wrap{
			max-width: 100%;
			max-height: 80vh;
			overflow: scroll;
		}
		.pagination{
			display: flex;
		}

		.pagination li.disable{
			pointer-events: none;
		}
	</style>
	<script type="text/javascript">
	window.onload = ( function () {
		    $('#myTable').DataTable({
			    paging: false,
			    searching: false,

			});
		} );
	</script>

	<div class="page-content">
		<div class="container-fluid">
				
		<header class="section-header">
				<div class="tbl">
					<div class="tbl-row">
						<div class="tbl-cell">
							<h2>ORDER</h2>
							<ol class="breadcrumb breadcrumb-simple">
								<li><a href="#">Home</a></li>
								<li class="active">Order</li>
							</ol>
						</div>
					</div>
				</div>
			</header>
			<section class="card">
				<div class="card-block">
					<form action="{{url()->full()}}">
						<input type="hidden" name="page" value="{{$page}}">
						<input type="search" name="search" placeholder="Cari">
					</form>
					<div class="table-wrap">
					<table id="myTable" class="stripe row-border order-column display table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
						<tr>
							<th>No</th>
							<th>Track ID</th>
							<th>Nama</th>
							<th>Tgl Input</th>
							<th>Tgl PS</th>
							<th>Regional</th>
							<th>Witel</th>
							<th>STO</th>
							<th>Patner ID</th>
							<th>Email</th>
							<th>No. HP</th>
							<th>ND INET</th>
							<th>ND Telpon</th>
							<th>No SC</th>
							<th>Status</th>
							<th>Fee</th>
							<th>Opsi</th>
						</tr>
						</thead>
						
						<tbody>
							<?php $count = 1; ?>							
						@foreach($lihat_pelanggan as $data)
						<tr>
							<td>{{ $count++}}</td>
							<td>{{ $data-> identity}}</td>
							<td>{{ $data-> nama_ktp}}</td>
							<td>{{ $data-> order_dtm}}</td>
							<td>{{ $data->ORDER_DATE_PS}}</td>
							<td>{{ $data-> regional}}</td>
							<td>{{ $data-> witel}}</td>
							<td>{{ $data->XS2}}</td>
							<td>{{ $data-> partner_id}}</td>
							<td>{{ $data-> email}}</td>
							<td>{{ $data-> hp}}</td>
							<td>{{ $data->ND_INET}}</td>
							<td>{{ $data->ND_TELP }}</td>
							<td>{{ $data-> ORDER_ID}}</td>
							<td>				
							@switch($data->statusNum)
								@case(1)
									<span class="label label-pill label-warning">Waiting For FCC</span>
								    @break
								@case(2)
									<span class="label label-pill label-danger">DECLINED</span>
									@break
								@case(3)
									<span class="label label-pill label-warning">Waiting For Back End</span>
									@break
								@case(4)
									<span class="label label-pill label-warning">On Progres {{$data->STATUS_RESUME}}</span>
									@break
								@case(5)
									<span class="label label-pill label-success">Completed PS</span>
									@break
								@case(6)
									<span class="label label-pill label-danger">Problem {{$data->STATUS_RESUME}}</span>
									@break
							@endswitch				
							</td>
							<td>{{ $data-> fee}}</td>
							<td><a href="#" class="btn btn-secondary btn-sm" data-toggle="modal"
						data-target=".detail{{$data->identity}}"><i class="glyphicon glyphicon-search"></i></a></td>
						
						</tr>
						@endforeach
						</tbody>
						
						
					</table>
					</div>
					{!!$paginationLinks!!}

				</div>
			</section>	
			
		</div><!--.container-fluid-->
	</div><!--.page-content-->
@include('footer')
@foreach($lihat_pelanggan as $data)
<div class="modal fade detail{{$data->identity}}"
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
								<h4 class="modal-title" id="myModalLabel">DETAIL ORDER</h4>
							</div>
							<div class="modal-body">
							
								
						<div class="form-group row">
						<label class="col-sm-4 form-control-label"><span class="label label-warning">Track ID</span></label>
						<div class="col-sm-8">
							<p class="form-control-static"> : {{ $data-> identity}}</p>
						</div>

					</div>
				<hr>
				
					<div class="form-group row">
						<label class="col-sm-4 form-control-label">Status Startclick</label>
						<div class="col-sm-8">
							<p class="form-control-static">: {{$data->STATUS_RESUME}}</p>
						</div>
					</div>
					<hr>
					<div class="form-group row">
						<label class="col-sm-4 form-control-label">Status fcc</label>
						<div class="col-sm-8">
							<p class="form-control-static">: {{ $data-> reason}}</p>
						</div>
					</div>
				
				<hr>
					<div class="form-group row">
						<label class="col-sm-4 form-control-label">Alamat</label>
						<div class="col-sm-8">
							<p class="form-control-static">: {{  $data-> appointment}}</p>
						</div>
					</div>



							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-rounded btn-default" data-dismiss="modal">Keluar</button>
								
							</div>
						</div>
					</div>
				</div><!--.modal-->
@endforeach