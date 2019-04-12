<?php $this->load->view('includes/header') ?>
<div class="container-fluid">
    <div class="row">

        <div class="" id="sidebar" style="height: 100vh !important;">
            <?php $this->load->view('includes/sidebar') ?>
        </div>

        <div class="pr-5" id="content">
            <section>
                <?php $this->load->view('includes/breadcrumb') ?>
            </section>
            
            <section class="py-2 mt-2">
                <div class="container-fluid">
                    <div class="row mt-5">
                        
                        <div class="col-12">
                           <center><h4>Goats to give Birth</h4></center>
                        </div>

                    </div>

                    <div class="row mt-0 pl-4">
                        <div class="col py-5">
                            <div class="row table-responsive table-responsive-sm text-nowrap">

                                <table id="gp_record" class="table table-striped table-bordered col-12 table-hover">
                                    <thead class="bg-dark text-white text-center">
                                        <tr>
                                            <th>Eartag ID</th>
                                            <th>Due Date</th>
                                            <th>Nickname</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                    <?php if($goat_record != FALSE) {

                                        foreach($goat_record as $row) {?>
                                        <tr>
                                            <td><?= str_pad($row->eartag_id, 6, "0", STR_PAD_LEFT) ?></td>
                                            <td><?= ucfirst($row->due_date) ?></td>
                                            <td><?= ucfirst($row->nickname)     ?></td>
                                        </tr>

                                    <?php } }?>
                                    </tbody>
                                </table>  
                            
                            </div>
                        </div>
                    </div>

                    <br><center><h4>Unhealthy Goats</h4></center>   
                    <div class="row mt-0 pl-4">
                        <div class="col py-5">
                            <div class="row table-responsive table-responsive-sm text-nowrap">

                                <table id="unhealthy_goat_list" class="table table-striped table-bordered col-12 table-hover">
                                    <thead class="bg-dark text-white text-center">
                                        <tr>
                                            <th>Eartag ID</th>
                                            <th>Eartag Color</th>
                                            <th>Nickname</th>
                                            <th>Gender</th>
                                            <th>Body Color</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                    <?php if($unhealthy_goat != FALSE) {

                                        foreach($unhealthy_goat as $row) {?>
                                        <tr>
                                            <td><?= str_pad($row->eartag_id, 6, "0", STR_PAD_LEFT) ?></td>
                                            <td><?= ucfirst($row->eartag_color) ?></td>
                                            <td><?= ucfirst($row->nickname)     ?></td>
                                            <td><?= ucfirst($row->gender) ?></td>
                                            <td><?= ucfirst($row->body_color)     ?></td>
                                            <td><a href="<?= base_url('checkup/'.$row->eartag_id.'/new') ?>" class="btn btn-primary mx-auto"><i class="fa fa-stethoscope" ></i></a></td>
                                        </tr>

                                    <?php } }// else { echo "<tr><td class='mx-auto'>No records found</td></tr>"; }?>
                                    </tbody>
                                </table>  
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <center><h4>Goats Ready to be Sold</h4></center>
                        </div>
                    </div>
                    
                    <div class="row mt-0 pl-4">
                        <div class="col py-5">
                            <div class="row table-responsive table-responsive-sm text-nowrap">

                                <table id="available_goat_list" class="table table-striped table-bordered col-12 table-hover">
                                    <thead class="bg-dark text-white text-center">
                                        <tr>
                                            <th>Eartag ID</th>
                                            <th>Eartag Color</th>
                                            <th>Nickname</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                    <?php if($goats_for_selling != FALSE) {
                                        
                                        foreach($goats_for_selling as $row) {?>
                                        <tr>
                                            <td><?= str_pad($row->eartag_id, 6, "0", STR_PAD_LEFT) ?></td>
                                            <td><?= ucfirst($row->eartag_color) ?></td>
                                            <td><?= ucfirst($row->nickname)     ?></td>
                                        </tr>

                                    <?php } }?>
                                    </tbody>
                                
                                </table>  
                            </div>
                        </div>
                    </div>

                </div>
                
            </section>
        </div>
    </div>
</div>
