<?php while($product = $randomProducts->fetch_object()): ?>

    <div class="product">
        <a href="<?=base_url?>product/getOne&id=<?=$product->Id?>">
            <?php if($product->Img != null): ?>
                <img src="<?= base_url ?>upload/images/<?= $product->Img?>" alt="<?= $product->ProductName?>" />
            <?php else: ?>
                <img src="<?= base_url ?>assets/img/noImage.png" alt="<?= $product->ProductName?>" />
            <?php endif ?>
            <h2><?= $product->ProductName?></h2>           
        </a>
        <p><?= $product->Price?> patacones</p>
        <a href="<?=base_url?>cart/add&id=<?=$product->Id?>" class="button">Comprar</a>
    </div>

<?php endwhile; ?>
