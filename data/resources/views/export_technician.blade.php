<?php
$date= date("d/m/Y");
$filename = "export_technician_$date.xls";
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
<th>email</th>
<th>No Telegram</th>
<th>Regional</th>
<th>Witel</th>
<th>Datel</th>
<th>STO</th>
<th>Role</th>
</tr>
</thead>
<tbody>
<?php  $count = 1; ?>
@foreach($lihat as $data)
<tr>
<td>{{ $count++}}</td>
<td>{{ $data-> nama}}</td>
<td>{{ $data-> email}}</td>
<td>'{{ $data-> no_telegram}}</td>
<td>{{ $data-> regional}}</td>
<td>{{ $data-> witel}}</td>
<td>{{ $data-> datel}}</td>
<td>{{ $data-> sto}}</td>
<td>{{ $data-> role}}</td>
</tr>
@endforeach
</tbody>
</table>
