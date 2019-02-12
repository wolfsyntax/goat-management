<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <?php if($this->session->userdata('username') == "") {?>
		<ul class="navbar-nav mr-auto">
			<li class="nav-item active">
				<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
			</li>

			<li class="nav-item">
				<a class="nav-link" href="#">Link</a>
			</li>

			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Dropdown
				</a>
				<div class="dropdown-menu dropleft" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="#">Action</a>
					<a class="dropdown-item" href="#">Another action</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="#">Something else here</a>
				</div>
			</li>

			<li class="nav-item">
				<a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
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
					<i class="fa fa-briefcase"></i>&emsp;Register
				</a>
			</li>

			<?php } else {?>
		<ul class="navbar-nav ml-auto">		
			<li class="nav-item">
				<a class="nav-link" href="#">
					<i class="fa fa-bell"></i>
				</a>
			</li>

			<li class="nav-item dropdown">
				<a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<i class="fa fa-cogs" ></i>
				</a>

				<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
					<span class="dropdown-item-text">
						<h5>Signed as </h5><?= $this->session->userdata('username') ?>
					</span>
					<a class="dropdown-item" href="#"><i class="fa fa-cog"></i>&emsp;Settings</a>
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