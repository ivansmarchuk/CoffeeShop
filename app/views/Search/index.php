<div class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs-main">
            <ol class="breadcrumb">
                <li><a href="<?= PATH ;?>">Startseite</a></li>
                <li>Ergebnisse für  "<b><?= $query ;?></b>"</li>
            </ol>
        </div>
    </div>
</div>

<div class="row">
        <div class="col-md-12 content">
            <div class="row">
                <?php if(!empty($products)): ?>

                    <?php foreach ($products as $product): ?>
                        <div class="col-md-4 product product-search">
                            <div class="product-img">
                                <a href="product/<?= $product->alias;?>"><img src="img/<?= $product->img;?>" height="218" alt="">
                                    <span class="glyphicon glyphicon-eye-open review"></span>
                                </a>

                            </div>
                            <div class="product-footer">
                                <a href="product/<?= $product->alias;?>"><h5><?= $product->title;?></h5></a>
                                <span class="cat">
                            <?= $product->content;?>
                            </span>
                            </div>
                            <div class="bottom-panel">

                                <span class="price"><?= $product->price;?> € </span>
                                <?php if($product->old_price): ?>
                                    <span class="price price-old"><small><del><?= $product->old_price?> €</del></small></span>

                                    <span class="price price-old"><small>-<?= round((1-($product->price)/($product->old_price))*100, 0); ?>%</small></span>
                                <?php endif; ?>

                                <a href="cart/add?id=<?=$product->id;?>" class="add-to-card-link" data-id="<?=$product->id;?>"><span class="glyphicon glyphicon-shopping-cart"></span>Kaufen</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
               <?php endif; ?>




            </div>
        </div>
    </div>
