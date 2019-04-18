<?php if (isset($product)): ?>
    <h1><?= $product->nombre ?></h1>
    <div id="detail-product">
        <div class="image">
            <?php if ($product->imagen != null): ?>
                <img src="<?= base_url ?>uploads/images/<?= $product->imagen ?>"/>
            <?php else: ?>
                <img src="<?= base_url ?>assets/img/camiseta.png"/>
            <?php endif; ?>
        </div>
        <div class="data">
            <p class="description"><?= $product->descripcion ?></p>

            <?php if ($product->stock <= 0):?>
                <p>Agotado.</p>
            <?php else: ?>
                <p><?= $product->stock ?> unidades</p>
                <p><?= $product->precio ?> €</p>
                <a href="<?= base_url ?>carrito/add&id=<?= $product->id ?>" class="button">Comprar</a>
            <?php endif; ?>
        </div>
    </div>


<?php else: ?>
    <h1>El producto no existe</h1>
<?php endif; ?>
