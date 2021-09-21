<?php if(isset($product)): ?>
    <h1><?= $product->ProductName?></h1>

    <div id="detail-product">
        <div class="product-image">
            <?php if($product->Img != null): ?>
                <img src="<?= base_url ?>upload/images/<?= $product->Img?>" alt="<?= $product->ProductName?>" />
            <?php else: ?>
                <img src="<?= base_url ?>assets/img/noImage.png" alt="<?= $product->ProductName?>" />
            <?php endif ?>
        </div>
        <div class="product-info">
            <p class="product-description"><?= $product->Description?></p>
            <p class="price-description">  
                <span class="price-simbol-money">$</span>
                <span class="price-price"><?= $product->Price?> </span>
            </p>
            <a href="<?=base_url?>cart/add&id=<?=$product->Id?>" class="button">Comprar</a>
        </div>
    </div>

<?php else: ?>
    <h1>El producto no existe!</h1>
<?php endif; ?>