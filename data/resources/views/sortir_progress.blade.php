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

	<div class="page-content">
		<div class="container-fluid">
				
		<header class="section-header">
				<div class="tbl">
					<div class="tbl-row">
						<div class="tbl-cell">
							<h2>PROGRESS</h2>
							<ol class="breadcrumb breadcrumb-simple">
								<li><a href="#">Home</a></li>
								<li class="active">Progress</li>
							</ol>
						</div>
					</div>
				</div>
			</header>
			<form role="form" action="{{URL::to('sortir_progress')}}" method="post" enctype="multipart/form-data">
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
            <div class="col-md-2">
              <p class="form-control-static">
	<select name="witel" class="form-control">
					<option value="0">WITEL</option>
					<option value="0">-All-</option>
					@foreach($lihat_witel as $data_witel)
					<option value="{{$data_witel->witel}}">{{$data_witel->witel}}</option>
					@endforeach
								</select>
							</p>
            </div>
					<div class="col-md-6">
			<div class="btn-group btn-group-sm" style="float: none;">
				
							<p class="form-control-static">
	<select name="status" class="form-control">
					<option value="0">STATUS</option>
					<option value="0">-All-</option>
					<option value="1">Waiting For FCC</option>
					<option value="2">DECLINED</option>
					<option value="3">Waiting For Back End</option>
					<option value="4">On Progres</option>
					<option value="5">Completed PS</option>
					<option value="6">Problem</option>
					</select>
							</p>
							<div style="margin-right: 3px"></div>
							<p class="form-control-static">
					<button type="submit" name="save"  value="search" class="btn btn-inline btn-warning"><i class="font-icon font-icon-search"></i></button>
				</p>						
				<p class="form-control-static">
					<button type="submit" name="save" class="btn btn-inline btn-secondary"><i class="font-icon font-icon-download-2"></i></button>
				</p>
						
						</div>
					</div>
					</div>
			</form>
			<!-- <section class="card">
				<div class="card-block"> -->
					<div class="box_tabel">
						<form action="{{url()->full()}}">
						<input type="hidden" name="page" value="">
						<input type="search" name="search" placeholder="Cari">
					</form>
					<table class="display table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
						<tr>
							<th>No</th>
							<th>Track ID</th>
							<th>Nama</th>	
							<th>ID User</th>						
							<th>No HP</th>
							<th>No HP Alt</th>
							<th>Appointment Tgl</th>
							<th>Appointment Waktu</th>
							<th>Status</th>
							<th>Witel</th>
							<th>Waktu FU</th>
							<th>Lat</th>
							<th>Long</th>
							<th>Alamat</th>
							<th>Catatan</th>
							<th>Technician</th>
							<th>ODP</th>
							<th>Foto</th>
							<th>Opsi</th>
						</tr>
						</thead>
						
						<tbody id="hasil_sortir">
							<?php  $count = 1; ?>
					@foreach($lihat_follow as $data)
						<tr>
							<td>{{ $count++}}</td>
							<td>{{ $data-> track_id}}</td>
							<td>{{ $data-> nama}}</td>
							<td>{{ $data-> id_user}}</td>
							<td>{{ $data-> no_hp}}</td>
							<td>{{ $data-> no_hp_alt}}</td>
							<td>{{ $data-> appointment->format('d F Y')}}</td>
							<td>@if($data->appointment_waktu != null)
									{{$data->appointment_waktu}}
							@else
							belum ada
						@endif</td>
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
							<td>{{ $data-> witel}}</td>
							<td>{{$data->timestamp->format('d F Y - H:i:s')}}</td>
							<td>{{ $data-> lat}}</td>
							<td>{{ $data-> lng}}</td>
							<td>{{ $data-> alamat}}</td>
							<td>{{ $data-> catatan}}</td>
							<td>
							@if($data->nama_teknisi != null)
									{{$data->nama_teknisi}}
							@else
							belum di kirim
						@endif</td>
							<td>{{ $data-> LOC_ID}}</td>
							<td>
								@foreach(json_decode($data->foto,true) as $f)
									<img src="{{asset($f)}}" width="150">
								@endforeach
							</td>
							<td>
								 @if(Auth::user()->level == 'super')
								<div class="btn-group btn-group-sm" style="float: none;">
<a href="hapus_progress/{{$data->id}}" class="btn btn-danger btn-sm" data-toggle="tooltip"
		data-placement="bottom" title="Hapus" onclick="return confirmSubmit()"><i class="fa fa-trash"></i></a>
								</div>
								 @endif
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

			<!-- </section>	 -->

			
				
		</div><!--.container-fluid-->
	</div><!--.page-content-->
@include('footer')

<!-- modal edit teknisi --> 