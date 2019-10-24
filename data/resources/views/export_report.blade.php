<?php
$date= date("d/m/Y");
$filename = "export_report_$date.xls";
header("Content-Type: application/vnd.ms-excel; charset=utf-8"); 
header('Content-Disposition: attachment; filename="' . $filename . '"'); 
header("Pragma: no-cache"); 
header("Expires: 0");
?>
<table border="1px">
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
<tbody>
<?php  $count = 1; ?>
							@foreach($sales as $data)
						<tr>
							<td>{{ $count++}}</td>
							<td>{{$data->nama}}</td>
							<td>{{$data->ID_User}}</td>
							<td>{{$data->witel}}</td>
							<td>{{$data->datel}}</td>

							<td>{{$data->report[1]->NFU}}</td>
							<td>{{$data->report[1]->FU}}</td>

							<td>{{$data->report[3]->NFU}}</td>
							<td>{{$data->report[3]->FU}}</td>

							<td>{{$data->report[2]->NFU}}</td>
							<td>{{$data->report[2]->FU}}</td>

							<td>{{$data->report[4]->NFU}}</td>
							<td>{{$data->report[4]->FU}}</td>

							<td>{{$data->report[6]->NFU}}</td>
							<td>{{$data->report[6]->FU}}</td>

							<td>{{$data->report[5]->NFU}}</td>
							<td>{{$data->report[5]->FU}}</td>

							<td>{{$data->totalNFUOrder}}</td>
							<td>{{$data->totalFUOrder}}</td>

							<td>{{$data->getPoint()}}</td>							
							<td>{{$data->getBadge()}}</td>							
							
						</tr>
						@endforeach
</tbody>
</table>
