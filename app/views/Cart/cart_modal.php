<?php if(!empty($_SESSION['cart'])): ?>
    <div class="table-responsive">
        <table class="table table-hover table-condensed">
            <thead>
            <tr>
                <th>Photo</th>
                <th>Name</th>
                <th>Anzahl</th>
                <th>Preis</th>
                <th><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($_SESSION['cart'] as $id => $item): ?>
                <tr>
                    <td><a href="product/<?=$item['alias'];?>"><img src="img/<?=$item['img'];?>" height="50" alt=""></a></td>
                    <td><a href="product/<?=$item['alias'];?>"><?=$item['title'];?></td>
                    <td><?=$item['qty'];?></td>
                    <td><?=$item['price'];?></td>
                    <td><span data-id="<?=$id;?>" class="glyphicon glyphicon-remove text-danger del-item" aria-hidden="true"></span></td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td>Gesamtanzahl:</td>
                <td colspan="4" class="text-right cart-qty"><?=$_SESSION['cart.qty'];?></td>
            </tr>
            <tr>
                <td>Gesamtsumme:</td>
                <td colspan="4" class="text-right cart-sum"><?= $_SESSION['cart.sum'];?> €</td>
            </tr>
            </tbody>
        </table>
    </div>

<?php else: ?>
    <h3>Warenkorb ist leer</h3>
<?php endif; ?>