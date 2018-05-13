<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Bestellung №<?= $order['id'] ;?>
        <?php if(!$order['status']): ?>
            <a href="<?=ADMIN;?>/order/change?id=<?=$order['id'];?>&status=1" class="btn btn-success btn-xs">Bestätigen</a>
        <?php else: ?>
            <a href="<?=ADMIN;?>/order/change?id=<?=$order['id'];?>&status=0" class="btn btn-default btn-xs">Später bearbeiten</a>
        <?php endif; ?>
        <a href="<?=ADMIN;?>/order/delete?id=<?=$order['id'];?>" class="btn btn-danger btn-xs delete">Löschen</a>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= ADMIN ;?>"><i class="fa fa-dashboard"></i>Main</a></li>
        <li><a href="<?= ADMIN ;?>/order"><i class="fa fa-dashboard"></i>Bestellliste</a></li>
        <li class="active"><i class="fa fa-dashboard"></i>Bestellung №<?= $order['id'] ;?></li>

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
                            <tbody>
                            <tr>
                                <td>Bestellung</td>
                                <td><?=$order['id'];?></td>
                            </tr>
                            <tr>
                                <td>Erstellungsdatum</td>
                                <td><?=$order['date'];?></td>
                            </tr>
                            <tr>
                                <td>Änderungsdatum</td>
                                <td><?=$order['update_at'];?></td>
                            </tr>
                            <tr>
                                <td>Anzahl Positionen in Bestellung</td>
                                <td><?=count($order_products);?></td>
                            </tr>
                            <tr>
                                <td>Summe</td>
                                <td><?=$order['sum'];?> €</td>
                            </tr>
                            <tr>
                                <td>Käufer</td>
                                <td><?=$order['name'];?></td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td><?=$order['status'] ? 'Abgeschlossen' : 'Neu';?></td>
                            </tr>
                            <tr>
                                <td>Kommentare</td>
                                <td><?=$order['note'];?></td>
                            </tr>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
            <h3>Bestellungsübersicht</h3>
            <div class="box">
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Anzahl</th>
                                <th>Summe</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $qty = 0; foreach($order_products as $product): ?>
                                <tr>
                                    <td><?=$product->id;?></td>
                                    <td><?=$product->title;?></td>
                                    <td><?=$product->qty; $qty += $product->qty?></td>
                                    <td><?=$product->price;?></td>
                                </tr>
                            <?php endforeach; ?>
                            <tr class="active">
                                <td colspan="2">
                                    <b>Zusammensumme:</b>
                                </td>
                                <td><b><?=$qty;?></b></td>
                                <td><b><?=$order['sum'];?> €</b></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

</section>
<!-- /.content -->