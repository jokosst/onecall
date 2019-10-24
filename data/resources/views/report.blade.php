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

		.modal-body{
		    height: 80vh;
		    overflow: scroll;
		}
	</style>
	<script type="text/javascript">
	window.onload = ( function () {
	    $('#initable').DataTable({
		    paging: false,
		    searching: false,
		    scrollX:        false,
			scrollCollapse: true,
			fixedColumns:   false
		});
	});
	</script>

	<div class="page-content">
		<div class="container-fluid">
				
		<header class="section-header">
				<div class="tbl">
					<div class="tbl-row">
						<div class="tbl-cell">
							<h2>REPORT USER</h2>
							<ol class="breadcrumb breadcrumb-simple">
								<li><a href="#">Home</a></li>
								<li class="active">Report</li>
							</ol>
						</div>
					</div>
				</div>
			</header>
			<form action="{{url()->full()}}">
						<input type="hidden" name="page" value="{{$page}}">
				<div class="row">
					
					<div class="col-md-2">
				<p class="form-control-static">
				<select name="month" class="form-control">
					<option value="">Bulan</option>
                    <option value="1">Januari</option>
                    <option value="2">Februari</option>
                    <option value="3">Maret</option>
                    <option value="4">April</option>
                    <option value="5">Mei</option>
                    <option value="6">Juni</option>
                    <option value="7">Juli</option>
                    <option value="8">Agustus</option>
                    <option value="9">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>
								</select>
							</p>
						</div>
						<div class="col-md-2">
							<p class="form-control-static">
					<select name="year" class="form-control">
					<option value="">Tahun</option>
					 <option value="2017">2017</option>
                    <option value="2018">2018</option>
                    <option value="2019">2019</option>
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
								</select>
							</p>
						</div>
					<div class="col-md-6">
			<div class="btn-group btn-group-sm" style="float: none;">
				
							<p class="form-control-static">
	<select name="witel" class="form-control">
					<option value="">WITEL</option>
					<option value="">-All-</option>
					@foreach($lihat_witel as $data_witel)
					<option value="{{$data_witel->witel}}">{{$data_witel->witel}}</option>
					@endforeach
								</select>
							</p>
							<div style="margin-right: 3px"></div>						
				<p class="form-control-static">
					<button type="submit" name="save"  value="search" class="btn btn-inline btn-warning"><i class="font-icon font-icon-search"></i></button>
				</p>
													
				<p class="form-control-static">
					<button type="submit" name="save" value="download" class="btn btn-inline btn-secondary"><i class="font-icon font-icon-download-2"></i></button>
				</p>
						
						</div>
					</div>
					</div>
			</form>
			<!-- <section class="card">
				<div class="card-block"> -->
					<div class="box_tabel">
						<form action="{{url()->full()}}">
						<input type="hidden" name="page" value="{{$page}}">
						<input type="search" name="search" placeholder="Cari">
					</form>
					<table id="initable" class="display table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>
							<th rowspan="3">No</th>
							<th rowspan="3">Nama User</th>
							<th rowspan="3">Partner ID</th>	
							<th rowspan="3">Witel</th>						
							<th rowspan="3">Datel</th>
							<th colspan="12" style="text-align:center;">JUMLAH ORDER</th>		
							<th rowspan="2" colspan="2">Total Order</th>
							<th rowspan="3">Point</th>
							<th rowspan="3">Badge</th>
						</tr>
						<tr>
							
							<th colspan="2" style="text-align:center;">Waiting For FCC</th>
							<th colspan="2" style="text-align:center;">Waiting For Backend</th>
							<th colspan="2" style="text-align:center;">Declined</th>
							<th colspan="2" style="text-align:center;">On Progress</th>
							<th colspan="2" style="text-align:center;">Problem</th>
							<th colspan="2" style="text-align:center;">Completed PS</th>
						</tr>
						<tr>
							<th>NFU</th>
							<th>FU</th>
							<th>NFU</th>
							<th>FU</th>
							<th>NFU</th>
							<th>FU</th>
							<th>NFU</th>
							<th>FU</th>
							<th>NFU</th>
							<th>FU</th>
							<th>NFU</th>
							<th>FU</th>
							<th>NFU</th>
							<th>FU</th>
						</tr>
						</thead>
						
						<tbody id="hasil_sortir">
							<?php  $count = 1; ?>
							@foreach($sales as $data)
						<tr>
							<td>{{ $count++}}</td>
							<td>{{$data->nama}}</td>
							<td>{{$data->ID_User}}</td>
							<td>{{$data->witel}}</td>
							<td>{{$data->datel}}</td>

							<td><a href="#" data-toggle="modal" data-target=".detail{{$data->id}}-1-nfu">{{$data->report[1]->NFU}}</a></td>
							<td><a href="#" data-toggle="modal" data-target=".detail{{$data->id}}-1-fu">{{$data->report[1]->FU}}</a></td>

							<td><a href="#" data-toggle="modal" data-target=".detail{{$data->id}}-3-nfu">{{$data->report[3]->NFU}}</a></td>
							<td><a href="#" data-toggle="modal" data-target=".detail{{$data->id}}-3-fu">{{$data->report[3]->FU}}</a></td>

							<td><a href="#" data-toggle="modal" data-target=".detail{{$data->id}}-2-nfu">{{$data->report[2]->NFU}}</a></td>
							<td><a href="#" data-toggle="modal" data-target=".detail{{$data->id}}-2-fu">{{$data->report[2]->FU}}</a></td>

							<td><a href="#" data-toggle="modal" data-target=".detail{{$data->id}}-4-nfu">{{$data->report[4]->NFU}}</a></td>
							<td><a href="#" data-toggle="modal" data-target=".detail{{$data->id}}-4-fu">{{$data->report[4]->FU}}</a></td>

							<td><a href="#" data-toggle="modal" data-target=".detail{{$data->id}}-6-nfu">{{$data->report[6]->NFU}}</a></td>
							<td><a href="#" data-toggle="modal" data-target=".detail{{$data->id}}-6-fu">{{$data->report[6]->FU}}</a></td>

							<td><a href="#" data-toggle="modal" data-target=".detail{{$data->id}}-5-nfu">{{$data->report[5]->NFU}}</a></td>
							<td><a href="#" data-toggle="modal" data-target=".detail{{$data->id}}-5-fu">{{$data->report[5]->FU}}</a></td>

							<td>{{$data->totalNFUOrder}}</td>
							<td>{{$data->totalFUOrder}}</td>

							<td>{{$data->getPoint()}}</td>							
							<td>{{$data->getBadge()}}</td>							
							
						</tr>
						@endforeach
						</tbody>
						
						
					</table>
				<!-- </div> -->
				{!!$pagination!!}
			</div>
			<!-- </section> -->

			
				
		</div><!--.container-fluid-->
	</div><!--.page-content-->
@include('footer')

@foreach($sales as $data)
	@foreach($data->report_detail as $i => $dr)
		<!-- Followed Up -->
		<div class="modal fade detail{{$data->id}}-{{$i}}-fu"
			 tabindex="-1"
			 role="dialog"
			 aria-labelledby="myLargeModalLabel"
			 aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">
							<i class="font-icon-close-2"></i>
						</button>
						<h4 class="modal-title" id="myModalLabel">DETAIL ORDER</h4>
					</div>
					<div class="modal-body">
						<table class="table table-striped table-bordered">
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
								</tr>
							</thead>
							<tbody>
								<?php $count = 1; ?>
								@foreach($dr->FU as $d)
									<tr>
										<td>{{ $count++}}</td>
										<td>{{ $d-> identity}}</td>
										<td>{{ $d-> nama_ktp}}</td>
										<td>{{ $d-> order_dtm}}</td>
										<td>{{ $d->ORDER_DATE_PS}}</td>
										<td>{{ $d-> regional}}</td>
										<td>{{ $d-> witel}}</td>
										<td>{{ $d->XS2}}</td>
										<td>{{ $d-> partner_id}}</td>
										<td>{{ $d-> email}}</td>
										<td>{{ $d-> hp}}</td>
										<td>{{ $d->ND_INET}}</td>
										<td>{{ $d->ND_TELP }}</td>
										<td>{{ $d-> ORDER_ID}}</td>
										<td>				
											@switch($d->statusNum)
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
													<span class="label label-pill label-warning">On Progres {{$d->STATUS_RESUME}}</span>
													@break
												@case(5)
													<span class="label label-pill label-success">Completed PS</span>
													@break
												@case(6)
													<span class="label label-pill label-danger">Problem {{$d->STATUS_RESUME}}</span>
													@break
											@endswitch
										</td>
										<td>{{ $d-> fee}}</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

		<!-- Not Followed Up -->
		<div class="modal fade detail{{$data->id}}-{{$i}}-nfu"
			 tabindex="-1"
			 role="dialog"
			 aria-labelledby="myLargeModalLabel"
			 aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">
							<i class="font-icon-close-2"></i>
						</button>
						<h4 class="modal-title" id="myModalLabel">DETAIL ORDER</h4>
					</div>
					<div class="modal-body">
						<table class="table table-striped table-bordered">
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
								</tr>
							</thead>
							<tbody>
								<?php $count = 1; ?>
								@foreach($dr->NFU as $d)
									<tr>
										<td>{{ $count++}}</td>
										<td>{{ $d-> identity}}</td>
										<td>{{ $d-> nama_ktp}}</td>
										<td>{{ $d-> order_dtm}}</td>
										<td>{{ $d->ORDER_DATE_PS}}</td>
										<td>{{ $d-> regional}}</td>
										<td>{{ $d-> witel}}</td>
										<td>{{ $d->XS2}}</td>
										<td>{{ $d-> partner_id}}</td>
										<td>{{ $d-> email}}</td>
										<td>{{ $d-> hp}}</td>
										<td>{{ $d->ND_INET}}</td>
										<td>{{ $d->ND_TELP }}</td>
										<td>{{ $d-> ORDER_ID}}</td>
										<td>				
											@switch($d->statusNum)
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
													<span class="label label-pill label-warning">On Progres {{$d->STATUS_RESUME}}</span>
													@break
												@case(5)
													<span class="label label-pill label-success">Completed PS</span>
													@break
												@case(6)
													<span class="label label-pill label-danger">Problem {{$d->STATUS_RESUME}}</span>
													@break
											@endswitch
										</td>
										<td>{{ $d-> fee}}</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	@endforeach
@endforeach