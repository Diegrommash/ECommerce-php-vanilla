<?php if(isset($category)):?>

<h1><?=$category->CategoryName; ?></h1>

    <?php if($products->num_rows != 0): ?>
        <?php while($product = $products->fetch_object()): ?>
            <div class="product">
                <a href="<?=base_url?>product/getOne&id=<?=$product->Id?>">
                    <?php if($product->Img != null): ?>
                        <img src="<?= base_url ?>upload/images/<?= $product->Img?>" alt="<?= $product->ProductName?>" />
                    <?php else: ?>
                        <img src="<?= base_url ?>assets/img/noImage.png" alt="<?= $product->ProductName?>" />
                    <?php endif ?>
                    <h2><?= $product->ProductName?></h2>
                    <p><?= $product->Price?> patacones</p>
                </a>
                <a href="<?=base_url?>cart/add&id=<?=$product->Id?>" class="button">Comprar</a>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <h1>Sin productos</h1>
    <?php endif;?>
<?php else: ?>
    <h1>La categoria no existe!</h1>
<?php endif; ?>