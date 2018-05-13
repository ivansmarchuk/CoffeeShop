<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Productliste
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= ADMIN ;?>"><i class="fa fa-dashboard"></i>Main</a></li>
        <li class="active"><i class="fa fa-dashboard"></i>Productliste</li>
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
                                <th>KAtegorie</th>
                                <th>Name</th>
                                <th>Preis</th>
                                <th>Status</th>
                                <th>Aktivität</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($products as $product): ?>
                                <tr>
                                    <td><?=$product['id'];?></td>
                                    <td><?=$product['cat'];?></td>
                                    <td><?=$product['title'];?></td>
                                    <td><?=$product['price'];?></td>
                                    <td><?=$product['status'] ? 'On' : 'Off';?></td>
                                    <td><a href="<?=ADMIN;?>/product/edit?id=<?=$product['id'];?>"><i class="fa fa-fw fa-eye"></i></a> <a class="delete" href="<?=ADMIN;?>/product/delete?id=<?=$product['id'];?>"><i class="fa fa-fw fa-close text-danger"></i></a></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="text-center" >
                        <p style="margin-top: 10px;">(<?=count($products)?> Produkt(e) aus <?=$count;?>)</p>
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