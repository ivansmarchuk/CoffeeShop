<?php if($hits): ?>
    <div class="row">
        <div class="col-md-12 content">
            <div class="row ">
                <?php
                if (sizeof($hits) > 5)
                    $output = array_reverse(array_slice($hits, -6, 6, true));
                else
                    $output = $hits;

                foreach ($output as $hit): ?>
                <div class="col-md-4 product">
                    <div class="product-img">
                        <a href="product/<?= $hit->alias;?>"><img src="img/<?= $hit->img;?>" height="218" alt=""></a>
                        <span class="glyphicon glyphicon-eye-open review"></span>
                    </div>
                    <div class="product-footer">
                        <a href="product/<?= $hit->alias;?>"><h5><?= $hit->title;?></h5></a>
                        <span class="cat">
                            <?= $hit->content;?>
                            </span>
                    </div>
                    <div class="bottom-panel">

                        <span class="price"><?= $hit->price;?> € </span>
                        <?php if($hit->old_price): ?>
                        <span class="price price-old"><small><del><?= $hit->old_price?> €</del></small></span>

                            <span class="price price-old"><small>-<?= round((1-($hit->price)/($hit->old_price))*100, 0); ?>%</small></span>
                        <?php endif; ?>

                        <a href="cart/add?id=<?=$hit->id;?>" class="add-to-card-link" data-id="<?=$hit->id;?>"><span class="glyphicon glyphicon-shopping-cart"></span>Kaufen</a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endif; ?>

