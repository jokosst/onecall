@include('header')
@include('sidebar')


	<div class="page-content">
		<div class="container-fluid">
				
		<header class="section-header">
				<div class="tbl">
					<div class="tbl-row">
						<div class="tbl-cell">
							<h2>NOTIF</h2>
							<ol class="breadcrumb breadcrumb-simple">
								<li><a href="#">Home</a></li>
								<li class="active">Notif</li>
							</ol>
						</div>
					</div>
				</div>
			</header>
			
			<section class="card">
				<div class="card-block">
					<form action="http://202.182.100.60/api/send-notification" method="post" enctype="multipart/form-data">
								{{ csrf_field() }}
							<div class="body">

					<div class="form-group row">
						<label class="col-sm-2 form-control-label">Title</label>
						<div class="col-sm-10">
							<p class="form-control-static"><input type="text" name="title" class="form-control" required></p>
						</div>
					</div>


					<div class="form-group row">
						<label class="col-sm-2 form-control-label">Content</label>
						<div class="col-sm-10">
							<p class="form-control-static"><textarea class="form-control" name="content" rows="4" ></textarea></p>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-2 form-control-label">File</label>
						<div class="col-sm-10">
							 <div class="input-group">
                <label class="input-group-btn">
                    <span class="btn btn-info">
                        <i class="fa fa-folder-o"></i> Browse&hellip; <input type="file" name="file" style="display: none;" multiple>
                    </span>
                </label>
                <input type="text" class="form-control" readonly>
            </div>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-2 form-control-label">Witel</label>
						<div class="col-sm-10">
							<p class="form-control-static">
<select name="witel" class="form-control">
								<option value="0">pilih</option>
									@foreach($lihat_witel as $data)
									<option value="{{$data->witel}}">{{$data->witel}}</option>
									@endforeach
								</select>
							</p>
						</div>
					</div>

			
							</div>
							<div class="modal-footer">
								<button type="reset" class="btn btn-inline btn-secondary"><i class="fa fa-refresh"></i> RESET</button>
								<button type="submit" name="save" class="btn btn-inline btn-success"><i class="fa fa-save"></i> KIRIM</button>
							</div>
	</form>	
				</div>
			</section>	

			
				
		</div><!--.container-fluid-->
	</div><!--.page-content-->
@include('footer')