
	<div class="mobile-menu-left-overlay"></div>
	<nav class="side-menu">
	    <div class="side-menu-avatar">
	        <div class="avatar-preview avatar-preview-100">
	        	<?php
	                        $id =\Auth::user()->id;
	                        $d = \App\User::find($id);
	                        $foto_profil = $d->foto_profil;

	                        	?>
	            <img src="{{ asset('data/storage/profil/'.$foto_profil)}}" alt="">
	     
	        </div>

	    </div>
	    <ul class="side-menu-list">
	    	
	        <li class="gold">
	            <a href="{{URL::to('/')}}">
	                <i class="font-icon font-icon-home"></i>
	                <span class="lbl">Home</span>
	            </a>
	        </li>
	        
	        <li class="red with-sub">
	            <span>
	                <i class="glyphicon glyphicon-list-alt"></i>
	                <span class="lbl">Data</span>
	            </span>
	            <ul>
	                <li><a href="{{URL::to('order')}}"><span class="lbl">Order</span></a></li>
	                @if(Auth::user()->level == 'super')
	                <li><a href="{{URL::to('progress')}}"><span class="lbl">Progress</span></a></li>
	                @elseif(Auth::user()->level == 'admin')
	                <li><a href="{{URL::to('progress_witel')}}"><span class="lbl">Progress</span></a></li>
	                @endif

	            </ul>
	        </li>
	        <li class="blue with-sub">
	                <span>
	                <i class="font-icon font-icon-user"></i>
	                <span class="lbl">User</span>
	            </span>
	            <ul>
	            	 @if(Auth::user()->level == 'super')
	            	<li><a href="{{URL::to('admin')}}"><span class="lbl">Admin</span></a></li>
	            	<li><a href="{{URL::to('sales')}}"><span class="lbl">Sales</span></a></li>
	                <li><a href="{{URL::to('technician')}}"><span class="lbl">Technician</span></a></li>
	            	@elseif(Auth::user()->level == 'admin')
	                <li><a href="{{URL::to('sales_witel')}}"><span class="lbl">Sales</span></a></li>
	                <li><a href="{{URL::to('technician_witel')}}"><span class="lbl">Technician</span></a></li>
	                @endif

	            </ul>
	        </li>
	        <li class="brown with-sub">
	                <span>
	                <i class="font-icon font-icon-notebook-bird"></i>
	                <span class="lbl">Report</span>
	            </span>
	            <ul>
	            	@if(Auth::user()->level == 'super')
	               <li><a href="{{URL::to('report')}}"><span class="lbl">User</span></a></li>
	                <li><a href="{{URL::to('report_witel')}}"><span class="lbl">Witel</span></a></li>
	                 <li><a href="{{URL::to('report_point')}}"><span class="lbl">Point & Badge Level</span></a></li>
	                 @elseif(Auth::user()->level == 'admin')
						<li><a href="{{URL::to('report_admin')}}"><span class="lbl">User</span></a></li>
	                <li><a href="{{URL::to('report_witel')}}"><span class="lbl">Witel</span></a></li>
	                 <li><a href="{{URL::to('report_point_admin')}}"><span class="lbl">Point & Badge Level</span></a></li>
	                  @endif

	            </ul>
	        </li>
	        
	         @if(Auth::user()->level == 'super')
	        <li class="aquamarine">
	            <a href="{{URL::to('activity')}}">
	                <i class="font-icon font-icon-zigzag"></i>
	                <span class="lbl">Activity</span>
	            </a>
	        </li>
	        <li class="purple">
	            <a href="{{URL::to('master')}}">
	                <i class="font-icon font-icon-cogwheel"></i>
	                <span class="lbl">Master</span>
	            </a>
	        </li>
	         
	        <li class="grey">
	            <a href="{{URL::to('notif')}}">
	                <i class="font-icon font-icon-alarm"></i>
	                <span class="lbl">Notif</span>
	            </a>
	        </li>
	        <li class="red">
	            <a href="{{URL::to('about_us')}}">
	                <i class="glyphicon glyphicon-info-sign"></i>
	                <span class="lbl">About Us</span>
	            </a>
	        </li>
	         @endif
	        
	    </ul>
	</nav><!--.side-menu-->
