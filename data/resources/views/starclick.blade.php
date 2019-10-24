 @include('header')
@include('sidebar')

	<div class="page-content">
		<div class="container-fluid">
				
		<header class="section-header">
				<div class="tbl">
					<div class="tbl-row">
						<div class="tbl-cell">
							<h2>OC_STARCLICK</h2>
							<ol class="breadcrumb breadcrumb-simple">
								<li><a href="#">Beranda</a></li>
								<li class="active">OC STARCLICK</li>
							</ol>
						</div>
					</div>
				</div>
			</header>
			<section class="card">
				<div class="card-block">
					<table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
						<tr>
							<th>No</th>
							<th>Track ID</th>
							<th>Tgl PS</th>
							<th>ND Inet</th>
							<th>STO</th>
							<th>STATUS</th>
							<th>Opsi</th>
						</tr>
						</thead>
						<tfoot>
						<tr>
							<th>No</th>
							<th>Track ID</th>
							<th>Tgl PS</th>
							<th>ND Inet</th>
							<th>STO</th>
							<th>Status</th>
							<th>Opsi</th>
						</tr>
						</tfoot>
						
						<tbody>
							<?php  $count = 1; ?>
						@foreach($lihat_oc_starclick as $data) 
						<tr>
							<td>{{ $count++}}</td>
							<td>{{substr($data->KCONTACT,3,19)}}</td>
							<td>{{ $data-> ORDER_DATE_PS}}</td>
							<td>{{ substr($data-> SPEEDY,10,12)}}</td>
							<td>{{ $data-> XS2}}</td>
							<td>{{ $data-> STATUS_RESUME}}</td>
							<td><a href="#" class="btn btn-secondary btn-sm"><i class="glyphicon glyphicon-search"></i></a></td>
							
						</tr>
						@endforeach
						</tbody>
						
						
					</table>
				</div>
			</section>	
			
		
				
		</div><!--.container-fluid-->
	</div><!--.page-content-->
@include('footer')
 