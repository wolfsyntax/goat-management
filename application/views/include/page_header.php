<nav class="navbar-dark bg-dark">
  <header class="container-fluid py-3">
    <div class="row d-flex justify-content-between align-items-center">
      <div class="col-6 d-flex justify-content-start align-items-center">
        <a class="text-white nav-link px-1 p-md-3" href="#">Home</a>
        <a class="text-white nav-link px-1 p-md-3" href="#">About</a>
        <a class="text-white nav-link px-1 p-md-3" href="#">FAQ</a>
        <a class="text-white nav-link px-1 p-md-3" href="#">Contact</a>
      </div>

      <div class="col-6 d-flex justify-content-md-end align-items-center p-0">
        <a class="nav-link text-white px-1 p-md-3" href="<?= base_url(); ?>login">Login</a>
        <a class="nav-link text-white px-1 p-md-3" href="<?= base_url();?>register">Sign up</a>
      </div>
    </div>
  </header>
  <div class="container-fluid">
    <div class="row" style="margin-top: -5px;">
      
      <div class="col-2 col-md-1 text-center text-white font-weight-bold" id="clocks" style="  padding: 0.7rem !important;">
        &emsp;
      </div>
      <div class="col bg-dark py-1 pr-2">
        <marquee class="bg-light text-dark mr-1 p-2">Do you need a hosting site? <a href="https://www.000webhost.com/1127428.html" class="nav-link d-inline text-info ml-0">Signup here</a>&nbsp;</marquee>
      </div>
    </div>
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