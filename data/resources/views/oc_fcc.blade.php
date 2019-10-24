@include('header')
@include('sidebar')

	<div class="page-content">
		<div class="container-fluid">
				
		<header class="section-header">
				<div class="tbl">
					<div class="tbl-row">
						<div class="tbl-cell">
							<h2>OC_FCC</h2>
							<ol class="breadcrumb breadcrumb-simple">
								<li><a href="#">Beranda</a></li>
								<li class="active">OC FCC</li>
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
							<th>witel</th>
							<th>Nama</th>
							<th>Email</th>
							<th>No Hp</th>
							<th>Opsi</th>
						</tr>
						</thead>
						<tfoot>
						<tr>
							<th>No</th>
							<th>Track ID</th>
							<th>witel</th>
							<th>Nama</th>
							<th>Email</th>
							<th>No Hp</th>
							<th>Opsi</th>
						</tr>
						</tfoot>
						
						<tbody>
							<?php  $count = 1; ?>
						@foreach($lihat_oc_fcc as $data) 
						<tr>
							<td>{{ $count++}}</td>
							<td>{{ $data-> identity}}</td>
							<td>{{ $data-> witel}}</td>
							<td>{{ $data-> nama_ktp}}</td>
							<td>{{ $data-> email}}</td>							
							<td>{{ $data-> hp}}</td>
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