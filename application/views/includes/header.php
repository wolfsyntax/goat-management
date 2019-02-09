<nav class="navbar-dark bg-dark">
  <header class="container-fluid py-1">
  	
    <div class="row d-flex justify-content-between align-items-center">
    <?php if($this->session->userdata('username') == "") { ?>
		<div class="col-6 d-flex justify-content-start align-items-center">
			<a class="text-white nav-link px-1 p-md-3" href="#">Home</a>
			<a class="text-white nav-link px-1 p-md-3" href="#">About</a>
			<a class="text-white nav-link px-1 p-md-3" href="#">FAQ</a>
			<a class="text-white nav-link px-1 p-md-3" href="#">Contact</a>
		</div>

		<div class="col-6 d-flex justify-content-md-end align-items-center pl-5">
			<a class="nav-link text-white px-1 p-md-3" href="<?= base_url(); ?>login">Login</a>
			<a class="nav-link text-white px-1 p-md-3" href="<?= base_url();?>register">Sign up</a>
		</div>
  	<?php } else {?>

		
		<div class="col d-flex justify-content-end align-items-center">
			<ul class="navbar-nav d-inline">
				<li class="nav-item d-inline-block px-1">
					<a href="" class="nav-link">
						<i class="fa fa-bell"></i>
					</a>
				</li>
				
				<li class="nav-item dropdown d-inline-block px-1">
					
					<a class="nav-link dropright dropdown-x" href="<?= base_url() ?>dashboard" title="Settings" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="navDrop"> <i class="fa fa-cog" ></i><span class="d-block-inline d-sm-block-inline d-md-block-inline d-lg-none ">&emsp;Settings</span></a>
        			<div class="arrow"></div>

					<div class="dropdown-menu dropdown-menu-right p-1 dropdown-menu-x" aria-labelledby="navbarDropdown"  >
						<a class="dropdown-item">
            				Signed in as<br/>
            				<strong class="text-dark"><?= $this->session->userdata('username'); ?></strong>
          				</a>
          				
          				<div class="dropdown-divider"></div>
						
						<a class="dropdown-item" href="<?= base_url() ?>profile/settings"><i class="fa fa-question-circle"></i>&emsp;Help</a>
							
						<a class="dropdown-item" href="<?= base_url() ?>profile/settings"><i class="fa fa-user"></i>&emsp;Your Profile</a>
          
						<a class="dropdown-item" href="<?= base_url() ?>logout"><i class="fa fa-sign-out"></i>&emsp;Sign out</a>
					</div>
				</li>    

			</ul>
		</div>
		
  	<?php } ?>
    </div>
  </header>
</nav>

<script>
      function startTime() {

      var today = new Date();
      var h = today.getHours();
      var m = today.getMinutes();
      var s = today.getSeconds();
      
      m = checkTime(m);
      s = checkTime(s);
      ap = " AM";
      if(h > 12){
        ap = " PM";
        h = h - 12;
      }
      document.getElementById('clocks').innerHTML = h + ":" + m + ":" + s + ap;
      
      var t = setTimeout(startTime, 500);

    }

    function checkTime(i) {
        
        if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
          return i;
    }


</script>