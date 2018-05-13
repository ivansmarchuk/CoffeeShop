<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Bestellliste
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= ADMIN ;?>"><i class="fa fa-dashboard"></i>Main</a></li>
        <li class="active"><i class="fa fa-dashboard"></i>Bestellliste</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Käufer</th>
                                <th>Status</th>
                                <th>Summe</th>
                                <th>Erstellungsdatum</th>
                                <th>Änderungsdatum</th>
                                <th>Aktivität</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($orders as $order): ?>
                                <?php $class = $order['status'] ? 'success' : ''; ?>
                                <tr class="<?=$class;?>">
                                    <td><?=$order['id'];?></td>
                                    <td><?=$order['name'];?></td>
                                    <td><?=$order['status'] ? 'Abgeschlossen' : 'Neu';?></td>
                                    <td><?=$order['sum'];?> €</td>
                                    <td><?=$order['date'];?></td>
                                    <td><?=$order['update_at'];?></td>
                                    <td><a href="<?=ADMIN;?>/order/view?id=<?=$order['id'];?>"><i class="fa fa-fw fa-eye"></i></a> <a class="delete" href="<?=ADMIN;?>/order/delete?id=<?=$order['id'];?>"><i class="fa fa-fw fa-close text-danger"></i></a></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="text-center" >
                        <p style="margin-top: 10px;">(<?=count($orders)?> Produkt(e) aus <?=$count;?>)</p>
                        <?php if($pagination->countPages > 1): ?>
                            <?=$pagination;?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- /.content -->