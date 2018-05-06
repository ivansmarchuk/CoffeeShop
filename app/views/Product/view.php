<?php
    $cats = \coffeeshop\App::$app->getProperty('cats');
?>
<div class="row product-wrap">
    <div class="product-breadcroumb">
        <a href="">Home</a>
        <a href="category/<?= $cats[$product->category_id]['alias'] ;?>"><?= $cats[$product->category_id]['title']?></a>
        <a href=""><?= $product->title;?></a>
    </div>
    <div class="col-sm-5">
        <div class="product-images">
            <div class="product-main-img" >
                <img src="img/<?= $product->img;?>" alt="" pagespeed_url_hash="798848650" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
            </div>
        </div>
    </div>
    <div class="col-sm-7">
        <div class="product-inner">
            <h2 class="product-name"><?= $product->title;?></h2>
            <div class="product-inner-price price">
                <ins><?= $product->price ;?> €</ins>
                <?php if($product->old_price): ?>
                    <del><?= $product->old_price ;?> €</del>
                <?php endif; ?>



            </div>
            <form action="" class="cart">
                <div class="quantity">
                    <input type="number" size="4" class="input-text qty text" title="Qty" value="1" name="quantity" min="1" step="1">
                </div>
                <button class="add_to_cart_button btn btn-default btn-sm" type="submit"><a id="productAdd" data-id="<?= $product->id;?>" href="cart/add?<?= $product->id;?>" class="none_style">Zum Warenkorb hinzufügen</a></button>
            </form>
            <div class="product-inner-category">
                <p>LAND: <a href="category/<?= $cats[$product->category_id]['alias'] ;?>"><?= $country->title ;?></a>. Lieferzeit: ca. 1-3 Werktage. </p>
            </div>
            <div role="tabpanel">
                <ul class="product-tab" role="tablist">
                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Description</a></li>
                    <li role="presentation" class=""><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Reviews</a></li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade active in" id="home">
                        <h2>Product Description</h2>
                        <div><?= $product->content_full_description ;?></div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="profile">
                        <h2>Reviews</h2>
                        <div class="submit-review">
                            <p><label for="name">Name</label> <input name="name" type="text"></p>
                            <p><label for="email">Email</label> <input name="email" type="email"></p>
                            <div class="rating-chooser">
                                <p>Your rating</p>
                                <div class="rating-wrap-post">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                            <p><label for="review">Your review</label> <textarea name="review" id="" cols="30" rows="10"></textarea></p>
                            <p><input type="submit" value="Submit"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if ($related): ?>
    <div class="col-sm-12">
        <h2 class="related-products-title">Ähnliche Produkte</h2>
        <?php foreach ($related as $item): ?>
        <div class="col-md-4 product pr-related">
            <div class="product-img">
                <a href="product/<?= $item['alias'] ;?>"><img src="img/<?= $item['img'] ;?>" height="218" alt=""></a>
                <span class="glyphicon glyphicon-eye-open review"></span>
            </div>
            <div class=".product-related-footer">
                <a href="product/<?= $item['alias'] ;?>"><h5><?= $item['title'] ;?></h5></a>
                <span class="cat">
        </span>
            </div>
            <div class="bottom-panel">

                <span class="price"><?= $item['price'] ;?> €</span>

                <?php if($item['old_price']): ?>
                    <span class="price price-old"><small><del><?= $item['old_price'] ;?> €</del></small></span>

                    <span class="price price-old"><small>-<?= round((1-($item['price'])/($item['old_price']))*100, 0); ?>%</small></span>
                <?php endif; ?>

                <a href="cart/add?id=<?= $item['id'] ;?>" class="add-to-card-link"><span class="glyphicon glyphicon-shopping-cart"></span>Kaufen</a>
            </div>
        </div>
        <?php endforeach;; ?>
    </div>
    <?php endif; ?>

</div>
