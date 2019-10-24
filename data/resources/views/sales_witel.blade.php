@include('header2')
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

		/* .modal-body{
		    height: 80vh;
		    overflow: scroll;
		} */
	</style>
<script type="text/javascript">
    function cari(){
      var strregional = $("#txtregional").val();
      $('.hasil').empty();
// $('#initable').DataTable({
// 		    paging: false,
// 		    searching: false,
// 		    scrollX:        false,
// 			scrollCollapse: true,
// 			fixedColumns:   false
// 		});
      if(strregional !=""){
        $(".hasil").html()
        $.ajax({
          type:"post",
          url:"{{URL::to('cari_regional')}}",
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
      $('.hasil_witel_agency').empty();

      if(strwitel !=""){
        $(".hasil_witel").html()
        $(".hasil_witel_agency").html()
        $.ajax({
          type:"post",
          url:"{{URL::to('cari_witel')}}",
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

  $(".hasil_witel_agency").append('<option>Pilih</option>');
            $.each(data["hasil_witel_agency"], function(k, v) { 
                $(".hasil_witel_agency").append(
                    '<option value="'+v.id+'">'+v.agency+'</option>'
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
          url:"{{URL::to('cari_datel')}}",
          data:{"_token": "{{ csrf_token() }}",'strdatel': strdatel},
          success: function(data){         

            console.log(strdatel);
 
            $.each(data['hasil_datel'], function(k, v) { 
                $("#hasil_datel").append(
                    '<option value="'+v.sto+'">'+v.sto+'</option>'
                    );
                
            });
            

          }
        });
      }
    };
     function cari_agency(){
      var stragency = $("#txtagency").val();
      $('#hasil_agency').empty();

      if(stragency !=""){
        $("#hasil_agency").html()
        $.ajax({
          type:"post",
          url:"{{URL::to('cari_agency')}}",
          data:{"_token": "{{ csrf_token() }}",'stragency': stragency},
          success: function(data){         

            console.log(stragency);
 
            $.each(data['hasil_agency'], function(k, v) { 
                $("#hasil_agency").append(
                    '<option value="'+v.kode_agency+'">'+v.kode_agency+'</option>'
                    );
                
            });
            

          }
        });
      }
    };
  function cari_username(){
      var username = $("#username").val();
      $('#hasil_username').empty();

      if(username !=""){
        $("#hasil_username").html()
        $.ajax({
          type:"post",
          url:"{{URL::to('cari_username')}}",
          data:{"_token": "{{ csrf_token() }}",'username': username},
          success: function(data){        
			console.log(username); 

            $.each(data['hasil_username'], function(k, v) { 
            	if(v.username){
                $("#hasil_username").append(
                    '<p style="color:red;">*username already exists</p>'
                    );
            }else{
            	$("#hasil_username").append(
                    '<p style="color:green;">*Username is empty</p>'
                    );

            }
                
            });
            
            }
        });
      }
    };  
    
</script>
<?php
$witel_id =\Auth::user()->witel;
?>

	<div class="page-content">
		<div class="container-fluid">
				
		<header class="section-header">
				<div class="tbl">
					<div class="tbl-row">
						<div class="tbl-cell">
							<h2>SALES</h2>
							<ol class="breadcrumb breadcrumb-simple">
								<li><a href="#">Home</a></li>
								<li class="active">Sales</li>
							</ol>
						</div>
					</div>
				</div>
			</header>
<form role="form" action="{{URL::to('export_sales')}}" method="post" enctype="multipart/form-data">
   {{ csrf_field() }}
				<div class="row">
					<div class="col-md-6">
			<div class="btn-group btn-group-sm" style="float: none;">
				
							<p class="form-control-static">
	<select name="witel" class="form-control">
					<option value="{{$witel_id}}">{{$witel_id}}</option>
								</select>
							</p>
							<div style="margin-right: 3px"></div>
							<p class="form-control-static">
	<select name="status" class="form-control">
					<option value="0">Status</option>
					<option value="0">-All-</option>
					<option value="1">Active</option>
					<option value="2">Non Active</option>
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
		
			<!-- <section class="card">
				<div class="card-block"> -->
					<div class="box_tabel">
						{{-- <form id="orderbyform" method="get">
							<select name="orderby" id="srtwitel" onchange="$('#orderbyform').submit()" class="form-control">
								<option value="">Order By</option>
								<option value="nama">Name</option>
							</select>
						</form> --}}
						<form method="get">
							<input type="text" name="search" placeholder="Nama" class="form-control" style="width:200px;max-width: 87vw;float: left;margin-right:5px; ">
							<input type="text" name="ID_User" placeholder="ID User" class="form-control" style="width:200px;max-width: 87vw;float: left;margin-right:5px;">
							<input type="text" name="username" placeholder="Username" class="form-control" style="width:200px;max-width: 87vw;float: left">
				<div class="row">
					<div class="col-md-6">
			<div class="btn-group btn-group-sm" style="float: none;">
				
							<p class="form-control-static">
	<select name="witel" class="form-control">
					<option value="{{$witel_id}}">{{$witel_id}}</option>
								</select>
							</p>
							<div style="margin-right: 3px"></div>
							<p class="form-control-static">
	<select name="status"class="form-control">
						<option value="0">Status</option>
					<option value="0">-All-</option>
					<option value="1">Active</option>
					<option value="2">Non Active</option>
								</select>
							</p>
							<div style="margin-right: 3px"></div>						
				<p class="form-control-static">
					<button type="submit" class="btn btn-inline btn-warning">Cari</button>
				</p>
						
						</div>
					</div>
					</div>
			</form>
						<a href="#" class="btn btn-inline btn-primary"  data-toggle="modal"
						data-target=".tambah_dgn_modal"><i class="fa fa-plus-circle"></i> Tambah</a>

						@if(Session::has('error'))
          <p style="color:red;" ;>*{{Session::get('error')}}</p>
          @elseif(Session::has('sukses_ubah_pass'))
          <p style="color:red;" ;>*{{Session::get('sukses_ubah_pass')}}</p>
        @endif
					<table id="initable" class="display table table-striped table-bordered" cellspacing="0" width="100%">
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
							<th>Foto Profil</th>
							<th>Role</th>
							<th>Status</th>
							<th>Opsi</th>
						</tr>
						</thead>
						
						
						<tbody id="hasil_sortir">
							<?php  $count = 1; ?>
					@foreach($lihat as $data)
						<tr>
							<td>{{ $count++}}</td>
							<td>{{ $data-> nama}}</td>
							<td>{{ $data-> username}}</td>
							<td>{{ $data-> ID_User}}</td>
							<td>{{ $data-> no_hp}}</td>
							<td>{{ $data-> regional}}</td>
							<td>{{ $data-> witel}}</td>
							<td>{{ $data-> datel}}</td>
							<td>{{ $data-> sto}}</td>
							<td>{{ $data-> agency}}</td>
							<td>{{ $data-> kode_agency}}</td>
							<td>
							<img src="{{ asset('data/storage/profil/'.$data-> foto_profil)}}" width="80">
							</td>
							<td>{{ $data-> role}}</td>
							
							<td>
								@if($data->status)
								<span class="label label-pill label-success">ACTIVE</span>
								@else
								<span class="label label-pill label-error">NON ACTIVE</span>
								@endif
							</td>
							<td><div class="btn-group btn-group-sm" style="float: none;">
	<a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target=".detail{{$data->id}}" data-placement="bottom" title="Detail"><i class="fa fa-search-plus"></i></a>
	<a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target=".ubah_password{{$data->id}}" data-placement="bottom" title="Ubah Password"><i class="fa fa-unlock-alt"></i></a>
	<a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-toggle="modal" data-target=".ubah_data{{$data->id}}" data-placement="bottom" title="Ubah Data"><i class="fa fa-pencil"></i></a>
	<a href="hapus/{{$data->id}}" class="btn btn-danger btn-sm" data-toggle="tooltip"
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
					{!!$pagination!!}
				</div>
			<!-- </section>	 -->
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
								<h4 class="modal-title" id="myModalLabel"><i class="fa fa-dot-circle-o"></i> TAMBAH SALES</h4>
							</div>
							<form action="tambah_sales" method="post" enctype="multipart/form-data">
								{{ csrf_field() }}
							<div class="modal-body">

					<div class="form-group row">
						<label class="col-sm-4 form-control-label">1. Nama</label>
						<div class="col-sm-8">
							<p class="form-control-static"><input type="text" name="nama" class="form-control" required></p>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-4 form-control-label">2. Username</label>
						<div class="col-sm-8">
							<p class="form-control-static">
									<input type="text" name="username" class="form-control" id="username" onchange="cari_username()" required>
									<div id="hasil_username"></div>
							</p>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-4 form-control-label">3. Password</label>
						<div class="col-sm-8">
							<p class="form-control-static"><input type="text" name="password" class="form-control" required></p>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-4 form-control-label">4. ID User</label>
						<div class="col-sm-8">
							<p class="form-control-static"><input type="text" name="ID_User" class="form-control" required></p>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-4 form-control-label">5. No HP</label>
						<div class="col-sm-8">
							<p class="form-control-static"><input type="text" name="no_hp" class="form-control" required></p>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-4 form-control-label">6. Regional</label>
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
						<label class="col-sm-4 form-control-label">7. Witel</label>
						<div class="col-sm-8">
							<p class="form-control-static"  >
	<select name="witel" class="hasil form-control" id="txtwitel" onchange="cari_witel()"> 							
								<option>Pilih Witel</option>
							
								</select>
							</p>
						</div>
					</div>
					
					<div class="form-group row">
						<label class="col-sm-4 form-control-label">8. Datel</label>
						<div class="col-sm-8">
					<p class="form-control-static">
						<select name="datel" class="hasil_witel form-control" id="txtdatel" onchange="cari_datel()">
								<option value="0">Pilih Datel</option>
								</select>
							</p>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-4 form-control-label">9. STO</label>
						<div class="col-sm-8">
							<p class="form-control-static">
             <select name="sto" id="hasil_datel"  class="form-control">
								<option value="0">Pilih STO</option>
								</select>
							</p>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-4 form-control-label">10. Agency</label>
						<div class="col-sm-8">
							<p class="form-control-static">
				<select name="agency" class="hasil_witel_agency form-control" id="txtagency" onchange="cari_agency()">
								<option value="0">Pilih Agency</option>
								</select>
							</p>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-4 form-control-label">11. Kode Agency</label>
						<div class="col-sm-8">
							<p class="form-control-static">
							<select name="kode_agency" class="form-control" id="hasil_agency">
								<option value="0">pilih</option>
								</select></p>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-4 form-control-label">12. Foto Profil</label>
						<div class="col-sm-8">
							 <div class="input-group">
                <label class="input-group-btn">
                    <span class="btn btn-info">
                        <i class="fa fa-folder-o"></i> Browse&hellip; <input type="file" name="foto_profil" style="display: none;" multiple>
                    </span>
                </label>
                <input type="text" class="form-control" readonly>
            </div>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-4 form-control-label">13. Role</label>
						<div class="col-sm-8">
							<p class="form-control-static">
								<select name="role" class="form-control">
									<option value="sales">sales</option>
									<option value="sales CAP">sales CAP</option>
								<option value="outlet canvasser">outlet canvasser</option>
								<option value="outlet mandiri">outlet mandiri</option>
								<option value="Plasa">Plasa</option>
								</select>
							</p>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-4 form-control-label">14. No KTP</label>
						<div class="col-sm-8">
							<p class="form-control-static"><input type="number" name="no_ktp" class="form-control"></p>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-4 form-control-label">15. Tempat Lahir</label>
						<div class="col-sm-8">
							<p class="form-control-static"><input type="text" name="tmp_lahir" class="form-control"></p>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-4 form-control-label">16. Tgl Lahir</label>
						<div class="col-sm-8">
							<p class="form-control-static">
								<input class="flatpickr form-control" id="flatpickr" type="text" name="tgl_lahir" ></p>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-4 form-control-label">17. Alamat</label>
						<div class="col-sm-8">
							<p class="form-control-static"><textarea rows="4" name="alamat" class="form-control"></textarea></p>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-4 form-control-label">18. No Rek</label>
						<div class="col-sm-8">
							<p class="form-control-static"><input type="number" name="no_rek" class="form-control"></p>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-4 form-control-label">19. Bank</label>
						<div class="col-sm-8">
							<p class="form-control-static"><input type="text" name="bank" class="form-control"></p>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-4 form-control-label">20. Nama Pemilik</label>
						<div class="col-sm-8">
							<p class="form-control-static"><input type="text" name="nama_pemilik_bank" class="form-control"></p>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-4 form-control-label">21. Cabang Bank</label>
						<div class="col-sm-8">
							<p class="form-control-static"><input type="text" name="cabang_bank" class="form-control"></p>
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
@include('footer2')
<!-- modal ubah password -->
@foreach($lihat as $data)
				<div class="modal fade ubah_password{{$data->id}}"
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
								<h4 class="modal-title" id="myModalLabel"><i class="fa fa-unlock-alt"></i> UBAH PASSWORD SALES</h4>
							</div>
							<form action="{{URL::to('ubah_password_sales')}}/{{$data->id}}" method="post" enctype="multipart/form-data">
								{{ csrf_field() }}
							<div class="modal-body">
								<div class="form-group row">
						<label class="col-sm-4 form-control-label">Username</label>
						<div class="col-sm-8">
							<p class="form-control-static"><input type="text" name="username" class="form-control" value="{{$data->username}}"></p>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-4 form-control-label">Password</label>
						<div class="col-sm-8">
							<p class="form-control-static"><input type="text" name="password" class="form-control" placeholder="Password Baru" required></p>
						</div>
					</div>
							</div>
							<div class="modal-footer">
								<button type="submit" name="save" class="btn btn-inline btn-success"><i class="fa fa-save"></i> UBAH</button>
							</div>
							</form>
							</div>
							</div>
							</div>
@endforeach
<!-- ubah data keseluruhan tanpa password -->
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
								<h4 class="modal-title" id="myModalLabel"><i class="fa fa-dot-circle-o"></i> UBAH SALES</h4>
							</div>
							<form action="{{URL::to('ubah_data')}}/{{$data->id}}" method="post" enctype="multipart/form-data">
								{{ csrf_field() }}
							<div class="modal-body">

					<div class="form-group row">
						<label class="col-sm-4 form-control-label">1. Nama</label>
						<div class="col-sm-8">
							<p class="form-control-static"><input type="text" name="nama" class="form-control" value="{{$data->nama}}"></p>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-4 form-control-label">2. Username</label>
						<div class="col-sm-8">
							<p class="form-control-static"><input type="text" name="username" class="form-control" value="{{$data->username}}"></p>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-4 form-control-label">3. ID User</label>
						<div class="col-sm-8">
							<p class="form-control-static"><input type="text" name="ID_User" class="form-control" value="{{$data->ID_User}}"></p>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-4 form-control-label">4. No HP</label>
						<div class="col-sm-8">
							<p class="form-control-static"><input type="text" name="no_hp" class="form-control" value="{{$data->no_hp}}"></p>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-4 form-control-label">5. Regional</label>
						<div class="col-sm-8">
							<p class="form-control-static"><select name="regional" class="form-control">
						<option value="{{$data->regional}}">{{$data->regional}}</option>
						<option>pilih</option>
						@foreach($lihat_regional as $datap)
						<option value="{{$datap->regional}}">{{$datap->regional}}</option>
						@endforeach
								</select></p>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-4 form-control-label">6. Witel</label>
						<div class="col-sm-8">
							<p class="form-control-static"><select name="witel" class="form-control">
	             <option value="{{$data->witel}}">{{$data->witel}}</option>
								<option value="0">pilih</option>
								@foreach($lihat_witel as $datap)
						<option value="{{$datap->witel}}">{{$datap->witel}}</option>
						@endforeach
								</select></p>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-4 form-control-label">7. Datel</label>
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
						<label class="col-sm-4 form-control-label">8. STO</label>
						<div class="col-sm-8">
							<p class="form-control-static"><select name="sto" class="form-control">
	             <option value="{{$data->sto}}">{{$data->sto}}</option>
								<option value="0">pilih</option>
								@foreach($lihat_sto as $datap)
						<option value="{{$datap->sto}}">{{$datap->sto}}</option>
						@endforeach
								</select></p>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-4 form-control-label">10. Agency</label>
						<div class="col-sm-8">
							<p class="form-control-static">
								<select name="agency" class="form-control">
								  <option value="{{$data->agency}}">{{$data->agency}}</option>
								<option value="0">pilih</option>
								@foreach($lihat_agency as $datap)
									<option value="{{$datap->agency}}">{{$datap->agency}}</option>
									@endforeach
								</select></p>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-4 form-control-label">11. Kode Agency</label>
						<div class="col-sm-8">
							<p class="form-control-static">
								<select name="kode_agency" class="form-control">
								  <option value="{{$data->kode_agency}}">{{$data->kode_agency}}</option>
								<option value="0">pilih</option>
								@foreach($lihat_kode_agency as $datap)
							<option value="{{$datap->kode_agency}}">{{$datap->kode_agency}}</option>
									@endforeach
								</select></p>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-4 form-control-label">11. Foto Profil</label>
						<div class="col-sm-8">
							 <div class="input-group">
                <label class="input-group-btn">
                    <span class="btn btn-info">
                        <i class="fa fa-folder-o"></i> Browse&hellip; <input type="file" name="foto_profil" style="display: none;" multiple>
                    </span>
                </label>
                <input type="text" class="form-control" readonly>
            </div>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-4 form-control-label">12. Role</label>
						<div class="col-sm-8">
							<p class="form-control-static">
								<select name="role" class="form-control">
									<option value="{{$data->role}}">{{$data->role}}</option>
									<option value="kosong">-ubah-</option>
									<option value="sales">sales</option>
									<option value="sales CAP">sales CAP</option>
								<option value="outlet canvasser">outlet canvasser</option>
								<option value="outlet mandiri">outlet mandiri</option>
								<option value="Plasa">Plasa</option>
								</select>
							</p>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-4 form-control-label">13. No KTP</label>
						<div class="col-sm-8">
							<p class="form-control-static"><input type="number" name="no_ktp" class="form-control" value="{{$data->no_ktp}}"></p>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-4 form-control-label">14. Tempat Lahir</label>
						<div class="col-sm-8">
							<p class="form-control-static"><input type="text" name="tmp_lahir" class="form-control" value="{{$data->tmp_lahir}}"></p>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-4 form-control-label">15. Tgl Lahir</label>
						<div class="col-sm-8">
							<p class="form-control-static"><input class="flatpickr form-control" id="flatpickr" type="text"  name="tgl_lahir" value="{{$data->tgl_lahir}}"></p>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-4 form-control-label">16. Alamat</label>
						<div class="col-sm-8">
							<p class="form-control-static"><textarea rows="4" name="alamat" class="form-control">{{$data->alamat}}</textarea></p>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-4 form-control-label">17. No Rek</label>
						<div class="col-sm-8">
							<p class="form-control-static"><input type="number" name="no_rek" class="form-control" value="{{$data->no_rek}}"></p>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-4 form-control-label">18. Bank</label>
						<div class="col-sm-8">
							<p class="form-control-static"><input type="text" name="bank" class="form-control" value="{{$data->bank}}"></p>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-4 form-control-label">19. Nama Pemilik</label>
						<div class="col-sm-8">
							<p class="form-control-static"><input type="text" name="nama_pemilik_bank" class="form-control" value="{{$data->nama_pemilik_bank}}"></p>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-4 form-control-label">20. Cabang Bank</label>
						<div class="col-sm-8">
							<p class="form-control-static"><input type="text" name="cabang_bank" class="form-control" value="{{$data->cabang_bank}}"></p>
						</div>
					</div>
			
							</div>
							<div class="modal-footer">
								<button type="submit" name="save" class="btn btn-inline btn-success"><i class="fa fa-save"></i> UBAH</button>
							</div>
	</form>		
						</div>
					</div>
				</div>
@endforeach

<!-- Detail -->
@foreach($lihat as $data)
				<div class="modal fade detail{{$data->id}}"
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
								<h4 class="modal-title" id="myModalLabel"><i class="fa fa-search-plus"></i> DETAIL {{$data->nama}}</h4>
							</div>
							
							<div class="modal-body">
								<div class="form-group row">
						<label class="col-sm-4 form-control-label">No KTP</label>
						<div class="col-sm-8">
							<p class="form-control-static">: {{$data->no_ktp}}</p>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-4 form-control-label">TTL</label>
						<div class="col-sm-8">
							<p class="form-control-static">: {{$data->tmp_lahir}}, {{$data->tgl_lahir->format('d-m-Y')}}</p>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-4 form-control-label">Alamat</label>
						<div class="col-sm-8">
							<p class="form-control-static">: {{$data->alamat}}</p>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-4 form-control-label">No Rekening</label>
						<div class="col-sm-8">
							<p class="form-control-static">: {{$data->no_rek}}</p>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-4 form-control-label">Bank</label>
						<div class="col-sm-8">
							<p class="form-control-static">: {{$data->bank}}</p>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-4 form-control-label">Pemilik Bank</label>
						<div class="col-sm-8">
							<p class="form-control-static">: {{$data->nama_pemilik_bank}}</p>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-4 form-control-label">Cabang Bank</label>
						<div class="col-sm-8">
							<p class="form-control-static">: {{$data->cabang_bank}}</p>
						</div>
					</div>
							</div>
							
							</div>
							</div>
							</div>
@endforeach