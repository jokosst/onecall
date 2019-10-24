@include('header')
@include('sidebar')


	<div class="page-content">
		<div class="container-fluid">
				
		<header class="section-header">
				<div class="tbl">
					<div class="tbl-row">
						<div class="tbl-cell">
							<h2>ABOUT US</h2>
							<ol class="breadcrumb breadcrumb-simple">
								<li><a href="#">Home</a></li>
								<li class="active">About Us</li>
							</ol>
						</div>
					</div>
				</div>
			</header>
			<section class="card">
				<div class="card-block">
						@if(Session::has('success'))
          <p style="color:red;" ;>*{{Session::get('success')}}</p>
         @endif
					<div class="content">
							
			<form action="ubah_profil" method="post" enctype="multipart/form-data">
								{{ csrf_field() }}
							<div class="body">
								<div class="form-group row">
						<div class="summernote-theme-1">
									<div class="summernote">
										<p>Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta. Mauris massa. Vestibulum lacinia arcu eget nulla</p>
										<p>Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta. Mauris massa. Vestibulum lacinia arcu eget nulla</p>
									</div>
								</div>
								<div class="chat-area-bottom">
									<button type="submit" class="btn btn-rounded float-left">Send</button>
									<button type="reset" class="btn btn-rounded btn-default float-left">Clear</button>
									<div class="dropdown dropdown-typical dropup attach">
										<a class="dropdown-toggle dropdown-toggle-txt"
										   id="dd-chat-attach"
										   data-target="#"
										   data-toggle="dropdown"
										   aria-haspopup="true"
										   aria-expanded="false">
											<span class="lbl">Attach</span>
										</a>
										<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd-chat-attach">
											<a class="dropdown-item" href="#"><i class="font-icon font-icon-cam-photo"></i>Photo</a>
											<a class="dropdown-item" href="#"><i class="font-icon font-icon-cam-video"></i>Video</a>
											<a class="dropdown-item" href="#"><i class="font-icon font-icon-sound"></i>Audio</a>
											<a class="dropdown-item" href="#"><i class="font-icon font-icon-page"></i>Document</a>
											<a class="dropdown-item" href="#"><i class="font-icon font-icon-earth"></i>Map</a>
										</div>
									</div>
								</div><!--.chat-area-bottom-->
					</div>

					

			
							</div>
							<div class="footer">
								
							<!-- 	<button type="submit" name="save" class="btn btn-inline btn-success"><i class="fa fa-save"></i> UBAH</button> -->
							</div>
	</form>		
						</div>
				</div>
			</section>	

		
				
		</div><!--.container-fluid-->
	</div><!--.page-content-->
@include('footer')
