<?php //$parent = isset($category['childs']); ?>
<li  class = "list-group-item">
    <a href="category/<?=$category['alias'];?>"><?=$category['title'];?></a>
    <?php if(isset($category['childs'])): ?>
        <ul>
            <?= $this->getMenuHtml($category['childs']);?>
        </ul>
    <?php endif; ?>
</li>