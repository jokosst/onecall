@include('header')
@include('sidebar')
<script type="text/javascript">
    function sortir_witel(){
    	var count=1;
      var strwitel = $("#txtwitel").val();
      $('#hasil_sortir').empty();

      if(strwitel !=""){
        $("#hasil_sortir").html()
        $.ajax({
          type:"post",
          url:"{{URL::to('sortir_witel_activity')}}",
          data:{"_token": "{{ csrf_token() }}",'strwitel': strwitel},
          success: function(data){      

            console.log(strwitel);
            $.each(data['hasil_sortir'], function(k, v) {
                // For each record in the returned array
                // alert(v.bidang); 
                $('#hasil_sortir').append(
                   
                    "<tr>"
                    +"<td>"+count+"</td>"
                      +"<td>"+v.nama+"</td>"
                      +"<td>"+v.ID_User+"</td>"
                      +"<td>"+v.witel+"</td>"
                      +"<td>"+v.waktu.toString().slice(8,10)+"-"+v.waktu.toString().slice(5,7)+"-"+v.waktu.toString().slice(0,4)+" - "+v.waktu.toString().slice(11,19)+"</td>"
                      +"<td>"+v.log+"</td>"
                       +"<td><div class='btn-group btn-group-sm' style='float: none;'>"
	+"<a href='log/"+v.id_sales+"' class='btn btn-warning btn-sm' ata-toggle='tooltip' data-target='#' data-placement='bottom' title='Lihat'><i class='glyphicon glyphicon-search'></i></a></div></td>"

                     
                   +"</tr>" );
                count++;
           });

            

          }
        });
      }
    };
</script>

	<div class="page-content">
		<div class="container-fluid">
				
		<header class="section-header">
				<div class="tbl">
					<div class="tbl-row">
						<div class="tbl-cell">
							<h2>ACTIVITY</h2>
							<ol class="breadcrumb breadcrumb-simple">
								<li><a href="#">Home</a></li>
								<li class="active">Activity</li>
							</ol>
						</div>
					</div>
				</div>
			</header>
			<form role="form" action="{{URL::to('export_activity')}}" method="post" enctype="multipart/form-data">
   {{ csrf_field() }}
				<div class="row">
					<div class="col-md-6">
			<div class="btn-group btn-group-sm" style="float: none;">
				
							<p class="form-control-static">
	<select name="witel" id="txtwitel" onchange="sortir_witel()" class="form-control">
					<option value="0">WITEL</option>
					<option value="0">-All-</option>
					@foreach($lihat_witel as $data_witel)
					<option value="{{$data_witel->witel}}">{{$data_witel->witel}}</option>
					@endforeach
								</select>
							</p>
							<div style="margin-right: 3px"></div>						
				<p class="form-control-static">
					<button type="submit" name="save" class="btn btn-inline btn-secondary"><i class="font-icon font-icon-download-2"></i></button>
				</p>
						
						</div>
					</div>
					</div>
			</form>
			<section class="card">
				<div class="card-block">
					
					<table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
						<tr>
							<th>No</th>
							<th>Nama</th>
							<th>ID User</th>
							<th>Witel</th>
							<th>Waktu Log</th>							
							<th>Log</th>
							<th>Opsi</th>
						</tr>
						</thead>
						
						<tbody id="hasil_sortir">
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
							<td>
	<div class="btn-group" style="float: none;">
	<a href="log/{{$data->id_sales}}" class="btn btn-warning btn-sm" data-toggle="tooltip" data-target="#" data-placement="bottom" title="Lihat"><i class="glyphicon glyphicon-search"></i></a>
					</div>
							</td>
							
						</tr>
						@endforeach
						
						</tbody>
						
						
					</table>
				</div>
			</section>	
		
				
		</div><!--.container-fluid-->
	</div><!--.page-content-->
@include('footer')