<nav class="nav w-100" >
    <div class="" style="height: calc(100vh - 100px) !important;">
        <ul class="nav flex-column bg-light text-truncate"> 
           <li class="nav-item <?= $current == 'dashboard' ? 'bg-secondary' : ''?>">
                <a class="nav-link sb-menu" href="<?= base_url($this->session->userdata('user_type') == 'tenant' ? 'dashboard' : 'farm') ?>" id="sb_dashboard" data-toggle="popover dashboard" title="Dashboard" data-content="And here's where you can view your recent activities and transaction">
                    <span class="fa fa-tachometer <?= $current == 'dashboard' ? 'text-white' : 'text-primary'?> " title="Dashboard"></span>
                    
                    &nbsp;<span class=" d-label">Dashboard <span class="sr-only">(current)</span></span>
                </a>
            </li>

       <li class="nav-item <?= $current == 'management' ? 'bg-secondary' : ''?>">
        <a class="nav-link text-dark sb-menu" href="<?= base_url(); ?>manage/goat"  data-toggle="popover manage" title="Goat Management" data-content="And here's where you can view and add Goat records">
           <span class="fa fa-paw text-secondary"></span>
         
            &nbsp;<span class="d-label">Goat Management</span>
        </a>
      </li>

      <li class="nav-item <?= $current == 'finance' ? 'bg-secondary' : ''?>">
        <a class="nav-link text-dark sb-menu" href="<?= base_url(); ?>goat/sales"  data-toggle="popover transaction" title="Financial Management" data-content="And here's where you can view and add Goat Sales records">
          <span class="fa fa-money text-info" title="Financials"></span>
          &nbsp;<span class="d-label">Financials</span>
        </a>
      </li>

      <li class="nav-item <?= $current == 'checkup' ? 'bg-secondary' : ''?>">
        <!--a class="nav-link text-success" href="#" data-toggle="collapse" data-target="#healthCheck" aria-expanded="false" aria-controls="healthCheck" data-toggled="popover" title="Health Check" data-content="Here you can farm activities like Vaccination, Supplementation and Health Checkup" data-placement="right" data-trigger="focus" >
           <span class="fa fa-heartbeat text-success d-inline d-sm-inline-block d-md-inline-block d-lg-none" title="Health Check"></span>
          <span class="fa fa-heartbeat text-sucess d-none d-sm-none d-md-none d-lg-inline-block" title="Health Check"></span>
          &nbsp;<span class="d-none d-sm-none d-md-none d-lg-inline-block text-dark">Health Check</span>
        </a-->
        <a class="nav-link text-dark sb-menu" href="<?= base_url('health/view') ?>" aria-expanded="false" aria-controls="healthCheck" data-toggled="popover checkup" title="Health Check" data-content="Here you can farm activities like Vaccination, Supplementation and Health Checkup" data-placement="right" >

           <span class="fa fa-heartbeat text-success" title="Health Check"></span>
          &nbsp;<span class="d-label">Health Check</span>
        </a>


      </li>

       <li class="nav-item <?= $current == 'breed' ? 'bg-secondary' : ''?>">
        <a class="nav-link text-dark sb-menu" href="<?= base_url('breeding/view') ?>" data-toggled="popover breed" title="Breeding Records" data-content="Here you can manage your Goat breeding" >
           <span class="fa fa-table text-warning" title="Breeding Records"></span>
         
          &nbsp;<span class="d-label">Breeding Records</span>
        </a>
      </li>

       <li class="nav-item <?= $current == 'assets' ? 'bg-secondary' : ''?>">
        <a class="nav-link text-dark sb-menu" href="<?= base_url('inventory/view') ?>" data-target="#assetManagement" data-toggled="popover" title="Asset Management" data-content="Here you can manage your farm assets" >
           
           <span class="fa fa-archive text-danger" title="Asset Management"></span>
          &nbsp;<span class="d-label">Asset Management</span>
        </a>

      </li>
    
    <?php if($this->session->userdata('user_type') == 'farm owner') {?>
      <li class="nav-item <?= $current == 'report' ? 'bg-secondary' : ''?>">
        <a class="nav-link text-dark sb-menu" href="<?= base_url('reports')?>" data-toggled="popover report" title="Reports" data-content="Here you reports on all transaction of your account"  >

           <span class="fa fa-info-circle <?= $current == 'report' ? 'text-white' : 'text-dark'?>" title="Reports"></span>
          &nbsp;<span class="<?= $current == 'report' ? 'text-white' : 'text-dark'?> d-label">Reports</span>
        </a>
      </li>
     <?php } ?>

      <li class="nav-item">&emsp;</li>
      <li class="nav-item">&emsp;</li>

        </ul>
    </div>
</nav>