<nav class="<?= $this->session->userdata('username') == '' ? 'navbar navbar-expand-lg navbar-light bg-light' : 'navbar navbar-expand navbar-dark bg-dark' ?>">
  <!--a class="navbar-brand" href="#">Navbar</a-->

  <?php if($this->session->userdata('username') != "") {?>
		<!--button type="button" id="sidebarCollapse" class="btn btn-link" onclick="change_icon(this)" >
			<i class="fa fa-arrow-circle-left fa-lg text-white" id="icon-toggler"></i>
			<span></span>
		</button-->
  <?php } ?>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <?php if($this->session->userdata('username') == "") {?>
		<ul class="navbar-nav mr-auto">
			<li class="nav-item active">
				<a class="nav-link" href="<?= base_url() ?>">Home <span class="sr-only">(current)</span></a>
			</li>

			<li class="nav-item">
				<a class="nav-link" href="<?= base_url('about') ?>">About</a>
			</li>

			<li class="nav-item">
				<a class="nav-link" href="#">Contact Us</a>
			</li>

			<li class="nav-item">
				<a class="nav-link" href="#">FAQ</a>
			</li>

		</ul>

    
		<ul class="navbar-nav ml-auto">
			<li class="nav-item">
				<a class="nav-link" href="<?= base_url('login') ?>">
					<i class="fa fa-users"></i>&emsp;Member Login
				</a>
			</li>

			<li class="nav-item">
				<a class="nav-link" href="<?= base_url('register') ?>">
					<i class="fa fa-briefcase text-danger"></i>&emsp;Register
				</a>
			</li>

			<?php } else {?>
		<ul class="navbar-nav mr-auto">
			<li class="nav-item">
				<button type="button" id="sidebarCollapse" class="btn btn-link" onclick="change_icon(this)" >
					<i class="fa fa-arrow-circle-left fa-lg text-white" id="icon-toggler"></i>
					<span></span>
				</button>
			</li>
		</ul>
		
		<ul class="navbar-nav ml-auto">
			<li class="nav-item">		
				<a href="" class="nav-link text-white">
					<i class="fa fa-user"></i>&emsp;<span class="emboss"><?= $this->session->userdata('user_fname') ?></span>
				</a>
			</li>

			<li class="nav-item">
				<a class="nav-link" href="<?= base_url('notifications')?>">
					<i class="fa fa-bell text-white"></i>
				</a>
			</li>

			<li class="nav-item dropdown">
				
				<a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<i class="fa fa-cogs text-white" ></i>

				</a>
				<div class="arrow bg-dark"></div>
				<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
					
					<span class="dropdown-item-text">
						<h5>Signed as </h5><?= $this->session->userdata('username') ?>
					</span>
					<a class="dropdown-item" href="<?= base_url('account/settings') ?>"><i class="fa fa-cog"></i>&emsp;Settings</a>
					<a class="dropdown-item" href="#"><i class="fa fa-life-saver"></i>&emsp;Support</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="<?= base_url('logout') ?>">
						<i class="fa fa-sign-out"></i>&emsp;Logout
					</a>
				</div>
			</li>
			 <?php } ?> 
		</ul>
      
  </div>
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