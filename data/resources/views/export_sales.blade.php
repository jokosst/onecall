<?php
$date= date("d/m/Y");
$filename = "export_sales_$date.xls";
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
<th>Username</th>
<th>ID User</th>
<th>No Hp</th>
<th>Regional</th>
<th>Witel</th>
<th>Datel</th>
<th>STO</th>
<th>Agency</th>
<th>Kode Agency</th>
<th>Role</th>
<th>Status</th>
<th>No KTP</th>
<th>Tmp Lahir</th>
<th>Tgl Lahir</th>
<th>Alamat</th>
<th>No Rek</th>
<th>Bank</th>
<th>Pemilik Bank</th>
<th>Cabang Bank</th>
</tr>
</thead>
<tbody>
<?php  $count = 1; ?>
@foreach($lihat as $data)
<tr>
<td>{{ $count++}}</td>
<td>{{ $data-> nama}}</td>
<td>{{ $data-> username}}</td>
<td>{{ $data-> ID_User}}</td>
<td>'{{ $data-> no_hp}}</td>
<td>{{ $data-> regional}}</td>
<td>{{ $data-> witel}}</td>
<td>{{ $data-> datel}}</td>
<td>{{ $data-> sto}}</td>
<td>{{ $data-> agency}}</td>
<td>{{ $data-> kode_agency}}</td>
<td>{{ $data-> role}}</td>
<td>@if($data->status)
ACTIVE
@else
NON ACTIVE
@endif</td>
<td>'{{ $data-> no_ktp}}</td>
<td>{{ $data-> tmp_lahir}}</td>
<td>{{ $data-> tgl_lahir->format('d-m-Y')}}</td>
<td>{{ $data-> alamat}}</td>
<td>'{{ $data-> no_rek}}</td>
<td>{{ $data-> bank}}</td>
<td>{{ $data-> nama_pemilik_bank}}</td>
<td>{{ $data-> cabang_bank}}</td>
</tr>
@endforeach
</tbody>
</table>
