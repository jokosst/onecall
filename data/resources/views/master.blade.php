@include('header')
@include('sidebar')
<script type="text/javascript">
	 function cari_witel(){
      var strwitel = $("#txtwitel").val();
      $('.hasil_witel_agency').empty();

      if(strwitel !=""){
        $(".hasil_witel_agency").html()
        $.ajax({
          type:"post",
          url:"{{URL::to('cari_witel')}}",
          data:{"_token": "{{ csrf_token() }}",'strwitel': strwitel},
          success: function(data){         

            console.log(strwitel);

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
</script>

	<div class="page-content">
		<div class="container-fluid">
				
		<header class="section-header">
				<div class="tbl">
					<div class="tbl-row">
						<div class="tbl-cell">
							<h2>MASTER</h2>
							<ol class="breadcrumb breadcrumb-simple">
								<li><a href="#">Home</a></li>
								<li class="active">Master</li>
							</ol>
						</div>
					</div>
				</div>
			</header>

			
				 <div class="row">
				 	<div class="col-xl-4 dahsboard-column">
	                <section class="box-typical box-typical-dashboard panel panel-default">
	                	<a href="#" class="btn btn-inline btn-info" data-toggle="modal"
						data-target=".tambah_regional"><i class="fa fa-plus-circle"></i> Tambah</a>
	                    <header class="box panel-heading">
	                        <h3 class="panel-title">#1. REGIONAL</h3>
	                        
	                    </header>
	                    <div class="box-typical-body panel-body">
	                        <table class="tbl-typical">
	                        	<tr>
	                                <th align="center">Regional</th>
	                                <th align="center">Opsi</th>
	                            </tr>
	                            @foreach($lihat_regional as $data)
	                            <tr>
	                                <td align="center">{{$data->regional}}</td>
	                                <td align="center"><a href="hapus_regional/{{$data->id}}" class="btn btn-danger btn-sm" data-toggle="tooltip"
		data-placement="bottom" title="Hapus"><i class="fa fa-trash"></i></a></td>
	                            </tr>
@endforeach

	                        </table>
	                    </div>
	                </section>
	            </div>
	            
	            <div class="col-xl-4 dahsboard-column">
	                <section class="box-typical box-typical-dashboard panel panel-default">
	                	<a href="#" class="btn btn-inline btn-info" data-toggle="modal"
						data-target=".tambah_witel"><i class="fa fa-plus-circle"></i> Tambah</a>
	                    <header class="box panel-heading">
	                        <h3 class="panel-title">#2. REGIONAL & WITEL</h3>
	                        
	                    </header>
	                    <div class="box-typical-body panel-body">
	                        <table class="tbl-typical">
	                        	<tr>
	                                <th align="center">Regional</th>
	                                 <th align="center">Witel</th>
	                                <th align="center">Opsi</th>
	                            </tr>
	                            @foreach($lihat_witel as $data)
	                            <tr>
	                                <td align="center">{{$data->regional}}</td>
	                                <td align="center">{{$data->witel}}</td>
	                                <td align="center"><a href="hapus_witel/{{$data->id}}" class="btn btn-danger btn-sm" data-toggle="tooltip"
		data-placement="bottom" title="Hapus"><i class="fa fa-trash"></i></a></td>
	                            </tr>
@endforeach

	                        </table>
	                    </div>
	                </section>
	            </div>
	            
	            <div class="col-xl-4 dahsboard-column">
	                <section class="box-typical box-typical-dashboard panel panel-default">
	                	<a href="#" class="btn btn-inline btn-info" data-toggle="modal"
						data-target=".tambah_datel"><i class="fa fa-plus-circle"></i> Tambah</a>
	                    <header class="box panel-heading">
	                        <h3 class="panel-title">#3. WITEL & DATEL</h3>
	                    </header>
	                    <div class="box-typical-body panel-body">
	                        <table class="tbl-typical">
	                        	<tr>
	                                <th align="center">Witel</th>
	                                <th align="center">Datel</th>
	                                <th align="center">Opsi</th>
	                            </tr>
	                             @foreach($lihat_datel as $data)
	                            <tr>
	                                <td align="center">{{$data-> witel}}</td>
	                               <td align="center">{{$data-> datel}}</td>
	                                <td align="center"><a href="hapus_datel/{{$data->id}}" class="btn btn-danger btn-sm" data-toggle="tooltip"
		data-placement="bottom" title="Hapus"><i class="fa fa-trash"></i></a></td>
	                            </tr>
@endforeach
	                        </table>
	                    </div>
	                </section>
	            </div>
	            <div class="col-xl-4 dahsboard-column">
	                <section class="box-typical box-typical-dashboard panel panel-default">
	                	<a href="#" class="btn btn-inline btn-info" data-toggle="modal"
						data-target=".tambah_sto"><i class="fa fa-plus-circle"></i> Tambah</a>
	                    <header class="box panel-heading">
	                        <h3 class="panel-title">#4. STO</h3>
	                    </header>
	                    <div class="box-typical-body panel-body">
	                        <table class="tbl-typical">
	                        	<tr>
	                                <th align="center">Datel</th>
	                                <th align="center">STO</th>
	                                <th align="center">AREA</th>
	                                <th>Opsi</th>
	                            </tr>
	                             @foreach($lihat_STO as $data)
	                            <tr>
	                                <td>{{$data->datel}}</td>
	                                 <td>{{$data->sto}}</td>
	                                <td>{{$data->area}}</td>
	                                <td><a href="hapus_sto/{{$data->id}}" class="btn btn-danger btn-sm" data-toggle="tooltip"
		data-placement="bottom" title="Hapus"><i class="fa fa-trash"></i></a></td>
	                            </tr>
@endforeach
	                        </table>
	                    </div>
	                </section>
	            </div>
 <div class="col-xl-4 dahsboard-column">
	                <section class="box-typical box-typical-dashboard panel panel-default">
	                	<a href="#" class="btn btn-inline btn-info" data-toggle="modal"
						data-target=".tambah_agency"><i class="fa fa-plus-circle"></i> Tambah</a>
	                    <header class="box panel-heading">
	                        <h3 class="panel-title">#AGENCY</h3>
	                    </header>
	                    <div class="box-typical-body panel-body">
	                        <table class="tbl-typical">
	                        	<tr>
	                                <th align="center">No</th>
	                                 <th>Witel</th>
	                                <th>Agency</th>
	                                <th align="center">Opsi</th>
	                            </tr>
	                            <?php  $count = 1; ?>
	                            @foreach($lihat_agency as $data)
	                            <tr>
	                                <td align="center">{{ $count++}}</td>
	                                <td>{{ $data->witel}}</td>
	                                <td>{{ $data->agency}}</td>
	                                <td align="center"><a href="hapus_agency/{{$data->id}}" class="btn btn-danger btn-sm" data-toggle="tooltip"
		data-placement="bottom" title="Hapus"><i class="fa fa-trash"></i></a></td>
	                            </tr>                           
@endforeach

	                        </table>
	                    </div>
	                </section>
	            </div>
	            <div class="col-xl-4 dahsboard-column">
	                <section class="box-typical box-typical-dashboard panel panel-default">
	                	<a href="#" class="btn btn-inline btn-info" data-toggle="modal"
						data-target=".tambah_kode_agency"><i class="fa fa-plus-circle"></i> Tambah</a>
	                    <header class="box panel-heading">
	                        <h3 class="panel-title">#KODE AGENCY</h3>
	                    </header>
	                    <div class="box-typical-body panel-body">
	                        <table class="tbl-typical">
	                        	<tr>
	                                <th align="center">No</th>
	                                 <th>Agency</th>
	                                <th>Kode Agency</th>
	                                <th align="center">Opsi</th>
	                            </tr>
	                            <?php  $count = 1; ?>
	                            @foreach($lihat_kode_agency as $data)
	                            <tr>
	                                <td align="center">{{ $count++}}</td>
	                                 <td>{{ $data->agency}}</td>
	                                <td>{{ $data->kode_agency}}</td>
	                                <td align="center"><a href="hapus_kode_agency/{{$data->id}}" class="btn btn-danger btn-sm" data-toggle="tooltip"
		data-placement="bottom" title="Hapus"><i class="fa fa-trash"></i></a></td>
	                            </tr>                           
@endforeach

	                        </table>
	                    </div>
	                </section>
	            </div>

	        </div>
		
				
		</div><!--.container-fluid-->
	</div><!--.page-content-->
@include('footer')

<!-- Regional -->
			<div class="modal fade tambah_regional"
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
								<h4 class="modal-title" id="myModalLabel"><i class="fa fa-dot-circle-o"></i> TAMBAH REGIONAL</h4>
							</div>
							<form action="tambah_regional" method="post" enctype="multipart/form-data">
								{{ csrf_field() }}
							<div class="modal-body">

					<div class="form-group row">
						<label class="col-sm-4 form-control-label">Regional</label>
						<div class="col-sm-8">
							<p class="form-control-static"><input type="text" name="regional" class="form-control" required></p>
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
				<!-- witel -->
<div class="modal fade tambah_witel"
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
								<h4 class="modal-title" id="myModalLabel"><i class="fa fa-dot-circle-o"></i> TAMBAH WITEL</h4>
							</div>
							<form action="tambah_witel" method="post" enctype="multipart/form-data">
								{{ csrf_field() }}
							<div class="modal-body">

					<div class="form-group row">
						<label class="col-sm-4 form-control-label">Regional</label>
						<div class="col-sm-8">
							<p class="form-control-static">
								<select name="regional" class="form-control">
									 @foreach($lihat_regional as $data)
									<option value="{{$data->regional}}">{{$data->regional}}</option>
									@endforeach
								</select>
							</p>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-4 form-control-label">Witel</label>
						<div class="col-sm-8">
							<p class="form-control-static"><input type="text" name="witel" class="form-control" required></p>
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
				<!-- Datel -->
			<div class="modal fade tambah_datel"
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
								<h4 class="modal-title" id="myModalLabel"><i class="fa fa-dot-circle-o"></i> TAMBAH DATEL</h4>
							</div>
							<form action="tambah_datel" method="post" enctype="multipart/form-data">
								{{ csrf_field() }}
							<div class="modal-body">

					<div class="form-group row">
						<label class="col-sm-4 form-control-label">Witel</label>
						<div class="col-sm-8">
							<p class="form-control-static">
								<select name="id_witel" class="form-control">
									 @foreach($lihat_witel as $data)
									<option value="{{$data->id}}">{{$data->witel}}</option>
									@endforeach
								</select>
							</p>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-4 form-control-label">Datel</label>
						<div class="col-sm-8">
							<p class="form-control-static"><input type="text" name="datel" class="form-control" required></p>
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

				<!-- Datel -->
			<div class="modal fade tambah_sto"
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
								<h4 class="modal-title" id="myModalLabel"><i class="fa fa-dot-circle-o"></i> TAMBAH STO</h4>
							</div>
							<form action="tambah_sto" method="post" enctype="multipart/form-data">
								{{ csrf_field() }}
							<div class="modal-body">

					<div class="form-group row">
						<label class="col-sm-4 form-control-label">Witel</label>
						<div class="col-sm-8">
							<p class="form-control-static">
								<select name="id_datel" class="form-control">
									 @foreach($lihat_datel as $data)
									<option value="{{$data->id}}">{{$data->datel}}</option>
									@endforeach
								</select>
							</p>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-4 form-control-label">STO</label>
						<div class="col-sm-8">
							<p class="form-control-static"><input type="text" name="sto" class="form-control" required></p>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-4 form-control-label">Area</label>
						<div class="col-sm-8">
							<p class="form-control-static"><input type="text" name="area" class="form-control" required></p>
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

<!-- Agency -->
<div class="modal fade tambah_agency"
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
								<h4 class="modal-title" id="myModalLabel"><i class="fa fa-dot-circle-o"></i> TAMBAH AGENCY</h4>
							</div>
							<form action="tambah_agency" method="post" enctype="multipart/form-data">
								{{ csrf_field() }}
							<div class="modal-body">

								<div class="form-group row">
						<label class="col-sm-4 form-control-label">Witel</label>
						<div class="col-sm-8">
							<p class="form-control-static">
								<select name="id_witel" class="form-control">
									 @foreach($lihat_witel as $data)
									<option value="{{$data->id}}">{{$data->witel}}</option>
									@endforeach
								</select>
							</p>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-4 form-control-label">Agency</label>
						<div class="col-sm-8">
							<p class="form-control-static"><input type="text" name="agency" class="form-control" required></p>
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

				<!-- kode Agency -->
<div class="modal fade tambah_kode_agency"
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
								<h4 class="modal-title" id="myModalLabel"><i class="fa fa-dot-circle-o"></i> TAMBAH KODE AGENCY</h4>
							</div>
							<form action="tambah_kode_agency" method="post" enctype="multipart/form-data">
								{{ csrf_field() }}
							<div class="modal-body">
								<div class="form-group row">
						<label class="col-sm-4 form-control-label">Witel</label>
						<div class="col-sm-8">
							<p class="form-control-static">
								<select name="id_witel" id="txtwitel" onchange="cari_witel()" class="form-control">
									<option value="0">-pilih-</option>
									 @foreach($lihat_witel as $data)
									<option value="{{$data->id}}">{{$data->witel}}</option>
									@endforeach
								</select>
							</p>
						</div>
					</div>
						
								<div class="form-group row">
						<label class="col-sm-4 form-control-label">Agency</label>
						<div class="col-sm-8">
							<p class="form-control-static">
								<select name="id_agency" class="hasil_witel_agency form-control" onchange="cari_agency()">
								<option value="0">Pilih Agency</option>
								</select>
								
							</p>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-4 form-control-label">Kode Agency</label>
						<div class="col-sm-8">
							<p class="form-control-static"><input type="text" name="kode_agency" class="form-control" required></p>
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