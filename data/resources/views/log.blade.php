@include('header')
@include('sidebar')
<script type="text/javascript">
	function cari(){
      var strhari = $("#txthari").val();
      var strbulan = $("#txtbulan").val();
      var strtahun = $("#txttahun").val();
      $('#hasil').empty();

      if(strhari !=""){
         $("#hasil").html()
        $.ajax({
          type:"post",
          url:"{{URL::to('cari_log')}}/{{$dsales->id}}",
          data:{"_token": "{{ csrf_token() }}",'strhari': strhari,'strbulan': strbulan,'strtahun': strtahun},
        success: function(data){   
             console.log(strhari);
             $.each(data['hasil'], function(k, v){
             	$('#hasil').append(
             	"<div class='activity-line-date'>"+strhari+"/"
             	+strbulan+"/"+strtahun+
             	"</div>");
             	});
            $.each(data['hasil'], function(k, v) {
            	if(v.lat != null){
            		v.log += "<a target=\"_blank\" href=\"https://maps.google.com/?q="+v.lat+","+v.lng+"\">Log Location</a>";
            	}
                $('#hasil').append(
                    "<section class='activity-line-action'>"
                      +"<div class='time'>"+v.waktu.toString().slice(11,19)+"</div>"
                      +"<div class='cont'><div class='cont-in'>"
                      +"<p>"+v.log+"</p>"                     
                  		+"</div></div></section>" );
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
							<h2>LOG</h2>
							<ol class="breadcrumb breadcrumb-simple">
								<li><a href="#">Home</a></li>
								<li class="active">Log</li>
							</ol>
						</div>
					</div>
				</div>
			</header>
			
			<section class="activity-line">
				<form>
				<div class="row">
						<div class="col-md-2">
							<p class="form-control-static">
				<select name="hari" id="txthari" onchange="cari()" class="form-control">
					<option value="0">Tanggal</option>
					<option value="1">1</option>
                     <option value="2">2</option>
                      <option value="3">3</option>
                       <option value="4">4</option>
                        <option value="5">5</option>
                         <option value="6">6</option>
                          <option value="7">7</option>
                           <option value="8">8</option>
                            <option value="9">9</option>
                       <option value="10">10</option>
                        <option value="11">11</option>
                         <option value="12">12</option>
                          <option value="13">13</option>
                         <option value="14">14</option>
                         <option value="15">15</option>
                          <option value="16">16</option>
                          <option value="17">17</option>
                     <option value="18">18</option>
                      <option value="19">19</option>
                       <option value="20">20</option>
                        <option value="21">21</option>
                         <option value="22">22</option>
                          <option value="23">23</option>
                           <option value="24">24</option>
                            <option value="25">25</option>
                       <option value="26">26</option>
                        <option value="27">27</option>
                         <option value="28">28</option>
                          <option value="29">29</option>
                         <option value="30">30</option>
                         <option value="31">31</option>
								</select>
							</p>
						</div>
						<div class="col-md-2">
				<p class="form-control-static">
				<select name="bulan" id="txtbulan" class="form-control" onchange="cari()">
					<option value="0">Bulan</option>
                    <option value="1">Januari</option>
                    <option value="2">Februari</option>
                    <option value="3">Maret</option>
                    <option value="4">April</option>
                    <option value="5">Mei</option>
                    <option value="6">Juni</option>
                    <option value="7">Juli</option>
                    <option value="8">Agustus</option>
                    <option value="9">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>
								</select>
							</p>
						</div>
						<div class="col-md-2">
							<p class="form-control-static">
					<select name="tahun" id="txttahun" class="form-control" onchange="cari()">
					<option value="0">Tahun</option>
					 <option value="2017">2017</option>
                    <option value="2018">2018</option>
                    <option value="2019">2019</option>
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
								</select>
							</p>
						</div>
					</div>
			</form>
				<article class="activity-line-item box-typical">

					
					<header class="activity-line-item-header">
						<div class="activity-line-item-user">
							<div class="activity-line-item-user-photo">
								<a href="#">
					<img src="{{ asset('data/storage/profil/'.$dsales->foto_profil)}}" alt="">
								</a>
							</div>
							<div class="activity-line-item-user-name">{{$dsales->nama}}</div>
					<div class="activity-line-item-user-status">{{$dsales->role}}, {{$dsales->witel}}</div>
						</div>
					</header>
					<div class="activity-line-action-list" id="hasil">
					<div class="activity-line-date">
						{{\Carbon\Carbon::now()->format('l')}}<br/>
						{{\Carbon\Carbon::now()->format('d M Y')}}
					</div>

						@foreach($lihat as $data)
						<section class="activity-line-action">
							<div class="time">{{$data->waktu->format('H:i:s')}}</div>
							<div class="cont">
								<div class="cont-in">
									<p>
										{{$data->log}}
										@if($data->lat != null)
											<a target="_blank" href="https://maps.google.com/?q={{$data->lat}},{{$data->lng}}">Log Location</a>
										@endif
									</p>
								</div>
							</div>
						</section><!--.activity-line-action-->
						@endforeach
						
					</div><!--.activity-line-action-list-->
				</article><!--.activity-line-item-->
			</section>	
		
				
		</div><!--.container-fluid-->
	</div><!--.page-content-->
@include('footer')