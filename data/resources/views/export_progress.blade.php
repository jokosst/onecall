<?php
set_time_limit(30);
ini_set('memory_limit', '512M');
ini_set('max_execution_time', '180');
$date= date("d/m/Y");
$filename = "export_progress_$date.xls";
header("Content-Type: application/vnd.ms-excel; charset=utf-8"); 
header('Content-Disposition: attachment; filename="' . $filename . '"'); 
header("Pragma: no-cache"); 
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");
?>
<table border="1px">
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
</tr>
</thead>
<tbody>
<?php  $count = 1; ?>
@foreach($lihat as $data)
<tr>
<td>{{ $count++}}</td>
<td>{{ $data-> track_id}}</td>
<td>{{ $data-> nama}}</td>
<td>{{ $data-> id_user}}</td>
<td>'{{ $data-> no_hp}}</td>
<td>'{{ $data-> no_hp_alt}}</td>
<td>{{ $data-> appointment->format('d F Y')}}</td>
<td>@if($data->appointment_waktu != null)
{{$data->appointment_waktu}}
@else
	belum ada
@endif</td>
							<td>				
							@switch($data->statusNum)
								@case(1)
									Waiting For FCC
								    @break
								@case(2)
									DECLINED
									@break
								@case(3)
									Waiting For Back End
									@break
								@case(4)
									On Progres {{$data->STATUS_RESUME}}
									@break
								@case(5)
									Completed PS
									@break
								@case(6)
									Problem {{$data->STATUS_RESUME}}
									@break
							@endswitch				
							</td>
							<td>{{ $data-> WITEL}}</td>
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
</tr>
@endforeach
</tbody>
</table>
