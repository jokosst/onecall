<?php
$date= date("d/m/Y");
$filename = "export_activity_$date.xls";
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
<th>Waktu Log</th>							
<th>Log</th>
</tr>
</thead>
<tbody>
<?php  $count = 1; ?>
@foreach($lihat as $data)
<tr>
<td>{{ $count++}}</td>
<td>{{ $data-> nama}}</td>
<td>{{ $data-> ID_User}}</td>
<td>{{ $data-> witel}}</td>
<td>{{ Carbon\Carbon::parse($data-> waktu)->format('d M Y - H:i:s')}}</td>
<td>
								<?php
              $id = $data->id;
              $log = App\UserLog::where('id',$id)
              ->select('log')
              ->first();
            	echo $log->log;

								?>

</td>
</tr>
@endforeach
</tbody>
</table>
