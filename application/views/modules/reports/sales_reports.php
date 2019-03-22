<!DOCTYPE html>
<html>
<head>
    <title>
        Goat Sales - Reports
    </title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scallable=0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE-edge,chrome">
    <meta http-equiv="refresh" content="1800">
    <meta http-equiv="cache-controle" content="no-cache, no-store, must-revalidate">

    <link rel="stylesheet" type="text/css" href="<?= base_url('public/css/app.css')?>">

</head>
<body>
    <div class="container-fluid">
        <div class="row table-responsive">
            <div class="col">
               <table class="table table-striped table-hover">
                    <caption>
                        Sales Report
                    </caption>
                                        <thead>
                                            <tr>
                                                <th>Eartag ID</th>
                                                <th>Nickname</th>
                                                <th>Transact Date</th>
                                                <th>Sold By</th>
                                                <th>Weight</th>
                                                <th>Price per Kilo</th>
                                            </tr>
                                            
                                        </thead>
                                        
                                        <tbody>
                                            <?php if($sales_record != FALSE) {

                                                foreach($sales_record as $row) {?>
                                            <tr>
                                                <td><?= str_pad($row->eartag_id, 6, "0", STR_PAD_LEFT) ?></td>
                                                <td><?= ucfirst($row->nickname) ?></td>
                                                <td><?= ucfirst($row->transact_date) ?></td>
                                                <td><?= ucfirst($row->username) ?></td>
                                                <td><?= ucfirst($row->weight) ?></td>
                                                <td><?= ucfirst($row->price_per_kilo) ?></td>
                                            </tr>

                                        <?php } }?>
                                    </tbody>
                                </table>
            </div>
        </div>
    </div>

    <!-- Starter Template -->
    <script src="<?= base_url('public/dist/js/jquery-3.3.1.slim.min.js'); ?>"></script>
    <script src="<?= base_url('public/dist/js/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('public/dist/js/bootstrap.bundle.min.js') ?>"></script>

    <script src="<?= base_url('public/js/dataTables.bootstrap4.min.js'); ?>"></script>
    <script src="<?= base_url('public/js/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?= base_url('public/js/jquery-editable-select.min.js'); ?>"></script>

</body>
</html>