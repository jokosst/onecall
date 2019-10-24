<?php
$date= date("d/m/Y");
$filename = "download_point_$date.xls";
header("Content-Type: application/vnd.ms-excel; charset=utf-8"); 
header('Content-Disposition: attachment; filename="' . $filename . '"'); 
header("Pragma: no-cache"); 
header("Expires: 0");
?>
<table border="1px">
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

						<tbody>
							<?php  $count = 1; ?>
							@foreach($lihat as $data)
							<tr>
								<td>{{ $count++}}</td>
								<td>{{$data->nama}}</td>
								<td>{{$data->ID_User}}</td>
								<td>{{$data->witel}}</td>
								<td>{{$data->point}}</td>
								<td>{{$data->LevelBadge($data->point)}}</td>
							</tr>
							@endforeach
						
						</tbody>
</table>
