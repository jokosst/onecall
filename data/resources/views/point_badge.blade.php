@include('header')
@include('sidebar')

	<div class="page-content">
		<div class="container-fluid">
				
		<header class="section-header">
				<div class="tbl">
					<div class="tbl-row">
						<div class="tbl-cell">
							<h2>REPORT POINT & BADGE LEVEL</h2>
							<ol class="breadcrumb breadcrumb-simple">
								<li><a href="#">Home</a></li>
								<li class="active">Point & Badge Level</li>
							</ol>
						</div>
					</div>
				</div>
			</header>
			<form role="form" action="{{URL::to('sortir_report_point')}}" method="post" enctype="multipart/form-data">
   {{ csrf_field() }}
				<div class="row">
					
					<div class="col-md-2">
				<p class="form-control-static">
				<select name="bulan" class="form-control">
					<option value="0">Bulan</option>
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
					<select name="tahun" class="form-control">
					<option value="0">Tahun</option>
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
					<option value="0">WITEL</option>
					<option value="0">-All-</option>
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
			
			<section class="card">
				<div class="card-block">
					<!-- <div class="box_tabel"> -->
					<table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
						<tr>
							<th>No</th>
							<th>Nama</th>
							<th>ID User</th>
							<th>Witel</th>
							<th>Point</th>
							<th>Badge Level</th>
					    </tr>
						</thead>
						
						<tbody id="hasil_sortir">
							<?php  $count = 1; ?>
							@foreach($lihat as $data)
							<tr>
								<td>{{ $count++}}</td>
								<td>{{$data->nama}}</td>
								<td>{{$data->ID_User}}</td>
								<td>{{$data->witel}}</td>
								<td>{{$data->getPoint()}}</td>
								<td>{{$data->getBadge()}}</td>
							</tr>
							@endforeach
						
						</tbody>
						
						
					</table>
				</div>
			</section>	

			
				
		</div><!--.container-fluid-->
	</div><!--.page-content-->
@include('footer')

