@include('header')
@include('sidebar')
<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>
	<div class="page-content">
		<div class="container-fluid">
				
		<header class="section-header">
				<div class="tbl">
					<div class="tbl-row">
						<div class="tbl-cell">
							<h2>ABOUT US</h2>
							<ol class="breadcrumb breadcrumb-simple">
								<li><a href="/">Home</a></li>
								<li class="active">About Us</li>
							</ol>
						</div>
					</div>
				</div>
			</header>
			<section class="card">
				<div class="card-block">
					<form action="{{url('about-us')}}" method="POST">
						{{ csrf_field() }}
						<div class="form-group">
							<textarea name="content">{!!$content!!}</textarea>
						</div>
						<button type="submit" class="btn">Save</button>
					</form>
				</div>
			</section>	
		</div><!--.container-fluid-->
	</div><!--.page-content-->
@include('footer')