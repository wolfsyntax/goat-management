<nav class="col-1 col-lg-2 bg-light" style="">

  <div class="sidebar bg-light" id="sidebar-div" style="margin-top: 10px !important;">
    <ul class="nav flex-column " id="sidebar">
      <li class="nav-item">
        <a class="nav-link active u-page" href="<?= base_url(); ?>dashboard" id="sb_dashboard" data-toggle="popover dashboard" title="Dashboard" data-content="And here's where you can view your recent activities and transaction">
          <span class="fa fa-tachometer text-primary d-inline d-sm-inline-block d-md-inline-block d-lg-none" title="Dashboard"></span>
          <span class="fa fa-tachometer text-primary d-none d-sm-none d-md-none d-lg-inline-block"></span>
          &nbsp;<span class="d-none d-sm-none d-md-none d-lg-inline-block">Dashboard <span class="sr-only">(current)</span></span>
        </a>
      </li>

      <li class="nav-item" >
        <a class="nav-link text-dark sb-menu" href="<?= base_url(); ?>manage/goat"  data-toggle="popover manage" title="Goat Management" data-content="And here's where you can view and add Goat records">
           <span class="fa fa-paw text-secondary d-inline d-sm-inline-block d-md-inline-block d-lg-none"></span>
          <span class="fa fa-paw text-secondary d-none d-sm-none d-md-none d-lg-inline-block"></span>
            &nbsp;<span class="d-none d-sm-none d-md-none d-lg-inline-block">Goat Management</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link text-dark sb-menu" href="<?= base_url(); ?>goat/sales"  data-toggle="popover transaction" title="Financial Management" data-content="And here's where you can view and add Goat Sales records">
           <span class="fa fa-money text-info d-inline d-sm-inline-block d-md-inline-block d-lg-none" title="Financials"></span>
          <span class="fa fa-money text-info d-none d-sm-none d-md-none d-lg-inline-block"></span>
          &nbsp;<span class="d-none d-sm-none d-md-none d-lg-inline-block">Financials</span>
        </a>
      </li>

      <li class="nav-item ">
        <!--a class="nav-link text-success" href="#" data-toggle="collapse" data-target="#healthCheck" aria-expanded="false" aria-controls="healthCheck" data-toggled="popover" title="Health Check" data-content="Here you can farm activities like Vaccination, Supplementation and Health Checkup" data-placement="right" data-trigger="focus" >
           <span class="fa fa-heartbeat text-success d-inline d-sm-inline-block d-md-inline-block d-lg-none" title="Health Check"></span>
          <span class="fa fa-heartbeat text-sucess d-none d-sm-none d-md-none d-lg-inline-block" title="Health Check"></span>
          &nbsp;<span class="d-none d-sm-none d-md-none d-lg-inline-block text-dark">Health Check</span>
        </a-->
        <a class="nav-link text-dark" href="#" data-toggle="collapse" data-target="#healthCheck" aria-expanded="false" aria-controls="healthCheck" data-toggled="popover" title="Health Check" data-content="Here you can farm activities like Vaccination, Supplementation and Health Checkup" data-placement="right" >
           <span class="fa fa-heartbeat text-success d-inline d-sm-inline-block d-md-inline-block d-lg-none" title="Health Check"></span>
          <span class="fa fa-heartbeat text-success d-none d-sm-none d-md-none d-lg-inline-block"></span>
          &nbsp;<span class="d-none d-sm-none d-md-none d-lg-inline-block">Health Check</span>
        </a>
        <div class="collapse" id="healthCheck" data-parent="#sidebar-div" >
          <a class="nav-link">
            <span class="fa fa-stethoscope d-inline-block d-lg-none text-dark" title="Vaccination"></span><span class="d-none d-sm-none d-lg-inline-block fa fa-angle-right"></span><span class="text-dark font-weight-normal d-none d-sm-none d-lg-inline-block ">&nbsp;&nbsp;Vaccination</span>
          </a>

          <a class="nav-link">
            <span class="fas fa-capsules d-inline-block d-lg-none text-success" title="Supplementation"></span><span class="d-none d-sm-none d-lg-inline-block fa fa-angle-right"></span><span class="text-dark font-weight-normal d-none d-sm-none d-lg-inline-block ">&nbsp;&nbsp;Supplementation</span>
          </a>

          <a class="nav-link">
            <span class="fa fa-user-md d-inline-block d-lg-none text-primary" title="Checkup"></span><span class="d-none d-sm-none d-lg-inline-block fa fa-angle-right"></span><span class="text-dark font-weight-normal d-none d-sm-none d-lg-inline-block ">&nbsp;&nbsp;Checkup</span>
          </a>

        </div>

      </li>

      <li class="nav-item">
        <a class="nav-link text-dark sb-menu" href="<?= base_url('activity/breeding/view') ?>" data-toggled="popover" title="Breeding Records" data-content="Here you can manage your Goat breeding" >
           <span class="fa fa-table text-warning d-inline d-sm-inline-block d-md-inline-block d-lg-none text-secondary" title="Breeding Records"></span>
          <span class="fa fa-table text-warning d-none d-sm-none d-md-none d-lg-inline-block"></span>
          &nbsp;<span class="d-none d-sm-none d-md-none d-lg-inline-block">Breeding Records</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link text-dark" href="#" data-toggle="collapse" data-target="#assetManagement" aria-expanded="false" aria-controls="breedingInfo" data-toggled="popover" title="Asset Management" data-content="Here you can manage your farm assets" id="amgmt">
           <span class="fa fa-archive text-danger d-inline d-sm-inline-block d-md-inline-block d-lg-none" title="Asset Management"></span>
          <span class="fa fa-archive text-danger d-none d-sm-none d-md-none d-lg-inline-block"></span>
          &nbsp;<span class="d-none d-sm-none d-md-none d-lg-inline-block">Asset Management</span>
        </a>

        <div class="collapse" id="assetManagement" data-parent="#sidebar-div" >
          <a class="nav-link" href="<?= base_url(); ?>financial">
            &nbsp;<span class="fa fa-shopping-basket  d-inline-block d-lg-none text-info" title="Supply Expense"></span><span class="d-none d-sm-none d-lg-inline-block fa fa-angle-right"></span><span class="text-dark font-weight-normal d-none d-sm-none d-lg-inline-block ">&nbsp;&nbsp;Supply Expense</span>
          </a>


        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link text-dark" href="#" data-toggled="popover" title="Reports" data-content="Here you reports on all transaction of your account"  >
           <span class="fa fa-info-circle text-dark d-inline d-sm-inline-block d-md-inline-block d-lg-none" title="Reports"></span>
          <span class="fa fa-info-circle text-dark d-none d-sm-none d-md-none d-lg-inline-block"></span>
          &nbsp;<span class="d-none d-sm-none d-md-none d-lg-inline-block">Reports</span>
        </a>
      </li>

      <li class="nav-item">&emsp;</li>
      <li class="nav-item">&emsp;</li>

    </ul>
  </div>
</nav>