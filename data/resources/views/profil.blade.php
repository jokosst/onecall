@include('header')
@include('sidebar')


	<div class="page-content">
		<div class="container-fluid">
				
		<header class="section-header">
				<div class="tbl">
					<div class="tbl-row">
						<div class="tbl-cell">
							<h2>PROFILE</h2>
							<ol class="breadcrumb breadcrumb-simple">
								<li><a href="#">Home</a></li>
								<li class="active">Profile</li>
							</ol>
						</div>
					</div>
				</div>
			</header>
			<section class="card col-sm-6">
				<div class="card-block">
						@if(Session::has('error'))
          <p style="color:red;" ;>*{{Session::get('error')}}</p>
          @elseif(Session::has('sukses_ubah_profil1'))
          <p style="color:red;" ;>*{{Session::get('sukses_ubah_profil1')}}</p>
          @elseif(Session::has('sukses_ubah_profil'))
          <p style="color:red;" ;>*{{Session::get('sukses_ubah_profil')}}</p>
          @elseif(Session::has('sukses_ubah_pass'))
          <p style="color:red;" ;>*{{Session::get('sukses_ubah_pass')}}</p>
        @endif
					<div class="content">
							
		<form action="{{URL::to('ubah_profil')}}/{{$lihat->id}}" method="post" enctype="multipart/form-data">
								{{ csrf_field() }}
							<div class="body">

					<div class="form-group row">
						<label class="col-sm-4 form-control-label">1. Level</label>
						<div class="col-sm-8">
							<p class="form-control-static"><input type="text" name="nama" class="form-control" value="{{$lihat->level}}" disabled></p>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-4 form-control-label">2. Username</label>
						<div class="col-sm-8">
							<p class="form-control-static"><input type="text" name="username" class="form-control" value="{{$lihat->username}}" required></p>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-4 form-control-label">3. Password</label>
						<div class="col-sm-8">
							<p class="form-control-static"><a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target=".ubah_password" data-placement="bottom" title="Ubah Password"><i class="fa fa-unlock-alt"></i></a></p>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-4 form-control-label">4. Foto Profil</label>
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
						<label class="col-sm-4 form-control-label">5. Witel</label>
						<div class="col-sm-8">
							<p class="form-control-static">
						
								<select name="witel" class="form-control">
						<option value="{{$lihat->witel}}">{{$lihat->witel}}</option>
						<option value="kosong">-Pilih-</option>
									 @foreach($lihat_witel as $data)
								<option value="{{$data->witel}}">{{$data->witel}}</option>
									@endforeach
								</select>
							</p>
						</div>
					</div>
			
							</div>
							<div class="footer">
								
								<button type="submit" name="save" class="btn btn-inline btn-success"><i class="fa fa-save"></i> UBAH</button>
							</div>
	</form>		
						</div>
				</div>
			</section>	

		
				
		</div><!--.container-fluid-->
	</div><!--.page-content-->
@include('footer')
<!-- modal ubah password -->
				<div class="modal fade ubah_password"
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
								<h4 class="modal-title" id="myModalLabel"><i class="fa fa-unlock-alt"></i> UBAH PASSWORD</h4>
							</div>
							<form action="{{URL::to('ubah_password_profil')}}/{{$lihat->id}}" method="post" enctype="multipart/form-data">
								{{ csrf_field() }}
							<div class="modal-body">
								
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

