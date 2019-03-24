<?php if (isset($product)): ?>
    <h1><?= $product->nombre ?></h1>


    <?php if ($product->imagen != null): ?>
        <img src="<?= base_url ?>uploads/images/<?= $product->imagen ?>"/>
    <?php else: ?>
        <img src="<?= base_url ?>assets/img/camiseta.png"/>
    <?php endif; ?>
    <h2><?= $product->nombre ?></h2>
    <p><?= $product->descripcion ?></p>
    <p><?= $product->precio ?></p>
    <a href="#" class="button">Comprar</a>

<?php else: ?>
    <h1>El producto NO existe</h1>
<?php endif; ?>
