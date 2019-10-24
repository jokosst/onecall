@include('header')
@include('sidebar')
<script type="text/javascript">
    function cari(){

      var strregional = $("#txtregional").val();
      $('.hasil').empty();

      if(strregional !=""){
        $(".hasil").html()
        $.ajax({
          type:"post",
          url:"{{URL::to('cari_regional_teknisi')}}",
          data:{"_token": "{{ csrf_token() }}",'strregional': strregional},
          success: function(data){   
           console.log(strregional);
      // $(".hasil").append('<select class="form-control">');
       $(".hasil").append('<option>Pilih</option>');
            $.each(data["hasil"], function(k, v) { 
                $(".hasil").append(
                    '<option value="'+v.id+'">'+v.witel+'</option>'
                  );
            });
            // $(".hasil").append('</select>');
            
          }
        });
      }
    };

    function cari_witel(){
      var strwitel = $("#txtwitel").val();
      $('.hasil_witel').empty();

      if(strwitel !=""){
        $(".hasil_witel").html()
        $.ajax({
          type:"post",
          url:"{{URL::to('cari_witel_teknisi')}}",
          data:{"_token": "{{ csrf_token() }}",'strwitel': strwitel},
          success: function(data){         

            console.log(strwitel);
 // $(".hasil_witel").append('<select class="form-control">');
  $(".hasil_witel").append('<option>Pilih</option>');
            $.each(data["hasil_witel"], function(k, v) { 
                $(".hasil_witel").append(
                    '<option value="'+v.id+'">'+v.datel+'</option>'
                    );
                
            });

           // $(".hasil_witel").append('</select>'); 

          }
        });
      }
    };

     function cari_datel(){
      var strdatel = $("#txtdatel").val();
      $('#hasil_datel').empty();

      if(strdatel !=""){
        $("#hasil_datel").html()
        $.ajax({
          type:"post",
          url:"{{URL::to('cari_datel_teknisi')}}",
          data:{"_token": "{{ csrf_token() }}",'strdatel': strdatel},
          success: function(data){         

            console.log(strdatel);
 $("#hasil_datel").append('<option>Pilih</option>');
            $.each(data['hasil_datel'], function(k, v) { 
                $("#hasil_datel").append(
                    '<option value="'+v.sto+'">'+v.sto+'</option>'
                    );
                
            });
            

          }
        });
      }
    };
    
</script>
<script type="text/javascript">
    function sortir_witel(){
    	var count=1;
      var srtwitel = $("#srtwitel").val();
      $('#hasil_sortir').empty();

      if(srtwitel !=""){
        $("#hasil_sortir").html()
        $.ajax({
          type:"post",
          url:"{{URL::to('sortir_witel_technician')}}",
          data:{"_token": "{{ csrf_token() }}",'srtwitel': srtwitel},
          success: function(data){      

            console.log(srtwitel);
            $.each(data['hasil_sortir'], function(k, v) {
                // For each record in the returned array
                // alert(v.bidang); 
                $('#hasil_sortir').append(
                   
                    "<tr>"
                    +"<td>"+count+"</td>"
                      +"<td>"+v.nama+"</td>"
                      +"<td>"+v.email+"</td>"
                      +"<td>"+v.no_telegram+"</td>"
                      +"<td>"+v.regional+"</td>"
                      +"<td>"+v.witel+"</td>"
                      +"<td>"+v.datel+"</td>"
                       +"<td>"+v.sto+"</td>"
                       +"<td>"+v.role+"</td>"
                       +"<td><div class='btn-group btn-group-sm' style='float: none;'>"
	+"<a href='#' class='btn btn-warning btn-sm' data-toggle='modal' data-toggle='modal' data-target='.ubah_data"+v.id+"' data-placement='bottom' title='Ubah Data'><i class='fa fa-pencil'></i></a>"
	+"<a href='hapus_teknisi/"+v.id+"' class='btn btn-danger btn-sm' data-toggle='tooltip'"
		+"data-placement='bottom' title='Hapus' onclick='return confirmSubmit()'><i class='fa fa-trash'></i></a></div></td>"

                     
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
							<h2>TECHNICIAN</h2>
							<ol class="breadcrumb breadcrumb-simple">
								<li><a href="#">Home</a></li>
								<li class="active">Technician</li>
							</ol>
						</div>
					</div>
				</div>
			</header>
			<form role="form" action="{{URL::to('export_technician')}}" method="post" enctype="multipart/form-data">
   {{ csrf_field() }}
				<div class="row">
					<div class="col-md-6">
			<div class="btn-group btn-group-sm" style="float: none;">
				
							<p class="form-control-static">
	<select name="witel" id="srtwitel" onchange="sortir_witel()" class="form-control">
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
					<a href="#" class="btn btn-inline btn-primary" data-toggle="modal"
						data-target=".tambah_dgn_modal"><i class="fa fa-plus-circle"></i> Tambah</a>
					<table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
						<tr>
							<th>No</th>
							<th>Nama</th>
							<th>Email</th>							
							<th>No Telegram</th>
							<th>Regional</th>
							<th>Witel</th>
							<th>Datel</th>
							<th>STO</th>
							<th>Role</th>
							<th>Opsi</th>
						</tr>
						</thead>
						
						<tbody id="hasil_sortir">
							<?php  $count = 1; ?>
					@foreach($lihat as $data)
						<tr>
							<td>{{ $count++}}</td>
							<td>{{ $data-> nama}}</td>
							<td>{{ $data-> email}}</td>
							<td>{{ $data-> no_telegram}}</td>
							<td>{{ $data-> regional}}</td>
							<td>{{ $data-> witel}}</td>
							<td>{{ $data-> datel}}</td>
							<td>{{ $data-> sto}}</td>
							<td>{{ $data-> role}}</td>
							<td>
								<div class="btn-group btn-group-sm" style="float: none;">
	<a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target=".ubah_data{{$data->id}}" data-placement="bottom" title="Ubah Data"><i class="fa fa-pencil"></i></a>
	<a href="hapus_teknisi/{{$data->id}}" class="btn btn-danger btn-sm" data-toggle="tooltip"
		data-placement="bottom" title="Hapus" onclick="return confirmSubmit()"><i class="fa fa-trash"></i></a>
					</div>
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
			</section>	

				

			<!-- Modal tambah teknisi baru -->
			<div class="modal fade tambah_dgn_modal"
					 tabindex="-1"
					 role="dialog"
					 aria-labelledby="myLargeModalLabel"
					 aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">
									<i class="font-icon-close-2"></i>
								</button>
								<h4 class="modal-title" id="myModalLabel"><i class="fa fa-dot-circle-o"></i> TAMBAH TECHNICIAN</h4>
							</div>
							<form action="tambah_teknisi" method="post" enctype="multipart/form-data">
								{{ csrf_field() }}
							<div class="modal-body">

					<div class="form-group row">
						<label class="col-sm-4 form-control-label">1. Nama</label>
						<div class="col-sm-8">
							<p class="form-control-static"><input type="text" name="nama" class="form-control" required></p>
						</div>
					</div>


					<div class="form-group row">
						<label class="col-sm-4 form-control-label">2. Email</label>
						<div class="col-sm-8">
							<p class="form-control-static"><input type="text" name="email" class="form-control" required></p>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-4 form-control-label">3. No Telegram</label>
						<div class="col-sm-8">
							<p class="form-control-static"><input type="text" name="no_telegram" class="form-control" required></p>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-4 form-control-label">4. Regional</label>
						<div class="col-sm-8">
							<p class="form-control-static">
<select name="regional" id="txtregional" onchange="cari()" class="form-control">
								<option value="0">pilih</option>
									@foreach($lihat_regional as $data)
									<option value="{{$data->regional}}">{{$data->regional}}</option>
									@endforeach
								</select>
							</p>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-4 form-control-label">5. Witel</label>
						<div class="col-sm-8">
							<p class="form-control-static">
<select name="witel" class="hasil form-control" id="txtwitel" onchange="cari_witel()"> 							
								<option>Pilih Witel</option>
							
								</select>
							</p>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-4 form-control-label">6. Datel</label>
						<div class="col-sm-8">
							<p class="form-control-static">
<select name="datel" class="hasil_witel form-control" id="txtdatel" onchange="cari_datel()">
								<option value="0">Pilih Datel</option>
								</select>
							</p>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-4 form-control-label">7. STO</label>
						<div class="col-sm-8">
					<select name="sto[]" id="hasil_datel" class="form-control select2" multiple="multiple" style="width: 100%;">
								<option value="0">Pilih STO</option>
								</select>
							
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-4 form-control-label">8. Role</label>
						<div class="col-sm-8">
							<p class="form-control-static">
								<select name="role" class="form-control">
									<option value="Teknisi">Teknisi</option>
									<option value="Team Leader">Team Leader</option>
								</select>
							</p>
						</div>
					</div>
			
							</div>
							<div class="modal-footer">
								<button type="reset" class="btn btn-inline btn-secondary"><i class="fa fa-refresh"></i> RESET</button>
								<button type="submit" name="save" class="btn btn-inline btn-success"><i class="fa fa-save"></i> SIMPAN</button>
							</div>
	</form>		
						</div>
					</div>
				</div>
		
				
		</div><!--.container-fluid-->
	</div><!--.page-content-->
@include('footer')

<!-- modal edit teknisi --> 

@foreach($lihat as $data)
<div class="modal fade ubah_data{{$data->id}}"
					 tabindex="-1"
					 role="dialog"
					 aria-labelledby="myLargeModalLabel"
					 aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">
									<i class="font-icon-close-2"></i>
								</button>
								<h4 class="modal-title" id="myModalLabel"><i class="fa fa-dot-circle-o"></i> EDIT TECHNICIAN</h4>
							</div>
							<form action="{{URL::to('ubah_teknisi')}}/{{$data->id}}" method="post" enctype="multipart/form-data">
								{{ csrf_field() }}
							<div class="modal-body">

					<div class="form-group row">
						<label class="col-sm-4 form-control-label">1. Nama</label>
						<div class="col-sm-8">
							<p class="form-control-static"><input type="text" name="nama" class="form-control" value="{{ $data-> nama}}"></p>
						</div>
					</div>


					<div class="form-group row">
						<label class="col-sm-4 form-control-label">2. Email</label>
						<div class="col-sm-8">
							<p class="form-control-static"><input type="text" name="email" class="form-control" value="{{ $data-> email}}"></p>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-4 form-control-label">3. No Telegram</label>
						<div class="col-sm-8">
							<p class="form-control-static"><input type="text" name="no_telegram" class="form-control" value="{{ $data-> no_telegram}}"></p>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-4 form-control-label">4. Regional</label>
						<div class="col-sm-8">
							<p class="form-control-static">
								<select name="regional" class="form-control">
						<option value="{{$data->regional}}">{{$data->regional}}</option>
						<option>pilih</option>
						@foreach($lihat_regional as $datap)
						<option value="{{$datap->regional}}">{{$datap->regional}}</option>
						@endforeach
								</select>
							</p>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-4 form-control-label">5. Witel</label>
						<div class="col-sm-8">
							<p class="form-control-static">
      <select name="witel" class="form-control">
	             <option value="{{$data->witel}}">{{$data->witel}}</option>
								<option value="0">pilih</option>
								@foreach($lihat_witel as $datap)
						<option value="{{$datap->witel}}">{{$datap->witel}}</option>
						@endforeach
								</select>
							</p>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-4 form-control-label">6. Datel</label>
						<div class="col-sm-8">
				<p class="form-control-static"><select name="datel" class="form-control">
	             <option value="{{$data->datel}}">{{$data->datel}}</option>
								<option value="0">pilih</option>
								@foreach($lihat_datel as $datap)
						<option value="{{$datap->datel}}">{{$datap->datel}}</option>
						@endforeach
								</select></p>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-4 form-control-label">7. STO</label>
						<div class="col-sm-8">
				<select name="sto[]" class="select2" multiple="multiple">
	             <option value="{{$data->sto}}">{{$data->sto}}</option>
								<option value="0">pilih</option>
								@foreach($lihat_sto as $datap)
						<option value="{{$datap->sto}}">{{$datap->sto}}</option>
						@endforeach
								</select>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-4 form-control-label">8. Role</label>
						<div class="col-sm-8">
							<p class="form-control-static">
								<select name="role" class="form-control">
									<option value="{{$data->role}}">{{$data->role}}</option>
									<option value="kosong">-ubah-</option>
									<option value="Teknisi">Teknisi</option>
									<option value="Team Leader">Team Leader</option>
								</select>
							</p>
						</div>
					</div>
			
							</div>
							<div class="modal-footer">
								<button type="reset" class="btn btn-inline btn-secondary"><i class="fa fa-refresh"></i> RESET</button>
								<button type="submit" name="save" class="btn btn-inline btn-success"><i class="fa fa-save"></i> SIMPAN</button>
							</div>
	</form>		
						</div>
					</div>
				</div>
				@endforeach