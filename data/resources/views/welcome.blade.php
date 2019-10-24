@include('header')
@include('sidebar')
<script type="text/javascript">
	function cari(){
     var strwitel = $("#txtwitel").val();
      var strbulan = $("#txtbulan").val();
      var strtahun = $("#txttahun").val();
      $('.hasil').empty();

      if(strbulan !=""){
         $(".hasil").html()
        $.ajax({
          type:"post",
          url:"{{URL::to('cari_grafik')}}",
          data:{"_token": "{{ csrf_token() }}",'strwitel': strwitel,'strbulan': strbulan,'strtahun': strtahun},
        success: function(data){   
             console.log(strbulan);

 var datax =  [['x'],['Progress']];
 $.each(data["hasil"], function(k, v) { 
                datax[0].push(v.waktu);
                datax[1].push(v.total);                   
            });

     var splineChart = c3.generate({
        bindto: '.hasil',
        data: {
           x: 'x',
            columns: datax,
            type: 'spline',
            labels: true
        },
        axis: {
            x: {
                label: 'Date',
                type: 'timeseries',
            tick: {
                format: '%d-%m-%Y'
            }
            },
            y: {
                label: 'Progress'
            }
        }
    });


          // $.each(data["hasil"], function(k, v) { 
          //       $(".hasil").append(
          //           v.total+','+v.waktu+',<br>'
          //         );
          //   }); 

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
							<h2>HOME <span class="label label-pill label-danger">{{Auth::user()->level}}</span></h2>
							
						</div>
					</div>
				</div>
			</header>
			
			<div class="col-xl-12">
	                <div class="row">
	                    <div class="col-sm-6">
	                        <article class="statistic-box red">
	                            <div>
	                                <div class="number">{{count($lihat_sales)}}</div>
	                                <div class="caption"><div>SALES</div></div>
	                                
	                                <div class="percent">
                                     @if(Auth::user()->level == 'super')
	                                    <a href="sales" class="btn btn-info"><i class="glyphicon glyphicon-search"></i> VIEW</a>
                                       @elseif(Auth::user()->level == 'admin')
                                       <a href="sales_witel" class="btn btn-info"><i class="glyphicon glyphicon-search"></i> VIEW</a>
                                       @endif
	                                </div>
	                            </div>
	                        </article>
	                    </div><!--.col-->
	                    <div class="col-sm-6">
	                        <article class="statistic-box yellow">
	                            <div>
	                                <div class="number">{{count($lihat_teknisi)}}</div>
	                                <div class="caption"><div>TECHNICIAN</div></div>
	                                <div class="percent">
                                     @if(Auth::user()->level == 'super')
	                                    <a href="technician" class="btn btn-info"><i class="glyphicon glyphicon-search"></i> VIEW</a>
                                      @elseif(Auth::user()->level == 'admin')
                                      <a href="technician_witel" class="btn btn-info"><i class="glyphicon glyphicon-search"></i> VIEW</a>
                                      @endif
	                                </div>
	                            </div>
	                        </article>
	                    </div><!--.col-->

	                </div>
	            </div>
              <div class="col-xl-12">
                  <div class="row">
                    <div class="col-sm-4">
                          <article class="statistic-box yellow">
                              <div>
                                  <div class="number">{{count($lihat_actv_sales)}}</div>
                                  <div class="caption"><div>ACTIVE USER</div></div>
                                  <div class="percent">
                                     
                                  </div>
                              </div>
                          </article>
                      </div><!--.col-->
                      <div class="col-sm-4">
                          <article class="statistic-box purple">
                              <div>
                                  <div class="number">{{count($lihat_follow)}}</div>
                                  <div class="caption"><div>TOTAL PROGRESS</div></div>
                                  <div class="percent">
                                     
                                  </div>
                              </div>
                          </article>
                      </div><!--.col-->
                      <div class="col-sm-4">
                          <article class="statistic-box green">
                              <div>              
                                  <div class="number">{{$lihat_ps}}</div>
                                  <div class="caption"><div>TOTAL PROGGRES COMPLETED PS</div></div>
                                  <div class="percent">
                                      
                                  </div>
                              </div>
                          </article>
                      </div><!--.col-->

              </div>
              </div>      
	        <section class="card">
            <header class="card-header">
            	 <div style="align: left;">
                Progress Chart
            </div>
                <div align="right">
                	<form>
				<div class="row">
						<div class="col-md-2">
							<p class="form-control-static">
				<select name="witel" id="txtwitel" onchange="cari()" class="form-control">
      @if(Auth::user()->level == 'super')
					<option value="0">WITEL</option>
					<option value="0">-All-</option>
					@foreach($lihat_witel as $data_witel)
					<option value="{{$data_witel->witel}}">{{$data_witel->witel}}</option>
					@endforeach
      @elseif(Auth::user()->level == 'admin')
          <option value="{{$witel_id}}">{{$witel_id}}</option>
      @endif
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
                </div>
            </header>
            <div class="card-block">
              <div class="hasil">
                <div id="progress-chart"></div>
              </div>
            </div>
        </section>
		
				
		</div><!--.container-fluid-->
	</div><!--.page-content-->

@include('footer')
<script type="text/javascript">

	 $(document).ready(function() {
     console.log(11);
var datax =  [
 ['x', @foreach($lihat_progress as $data)
   '{{ $data->waktu }}',
@endforeach ],
['Progress',@foreach($lihat_progress as $data)
   '{{ $data->total }}',
@endforeach ]
            ];
     var splineChart = c3.generate({
        bindto: '#progress-chart',
        data: {
           x: 'x',
            columns: datax,
            type: 'spline',
            labels: true
        },
        axis: {
            x: {
                label: 'Date',
                type: 'timeseries',
            tick: {
                format: '%d-%m-%Y'
            }
            },
            y: {
                label: 'Progress'
            }
        }
    });


});
	 </script>