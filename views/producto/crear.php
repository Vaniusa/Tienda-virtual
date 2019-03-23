<?php if (isset($editar) && isset($pro) && is_object($pro)): ?>
    <h1>Editar producto <?=$pro->nombre?></h1>
<?php $url_action = base_url."productto/editar&id=$pro->id";?>
<?php else: ?>
    <h1>Crear nuevos productos</h1>
    <?php $url_action = base_url."productto/crear";?>
<?php endif; ?>
<div class="form_container">
    <form action="<?=$url_action?>producto/save" method="post" enctype="multipart/form-data">

        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" value="<?=isset($pro) && is_object($pro) ? $pro->nombre : '';?>"/>

        <label for="descripcion">Descripcion</label>
        <textarea name="descripcion"><?=isset($pro) && is_object($pro) ? $pro->descripcion : '';?></textarea>

        <label for="precio">Precio</label>
        <input type="text" name="precio" value="<?=isset($pro) && is_object($pro) ? $pro->precio : '';?>"/>

        <label for="stock">Stock</label>
        <input type="number" name="stock" value="<?=isset($pro) && is_object($pro) ? $pro->stock : '';?>"/>

        <label for="categoria">Categoria</label>
        <select name="categoria">
            <?php $categorias = Utils::showCategorias(); ?>
            <?php while ($cat = $categorias->fetch_object()): ?>
                <option value="<?= $cat->id ?>">
                    <?=isset($pro) && is_object($pro) && $cat->id == $pro->categoria_id ? 'selected' : '';?>
                    <?= $cat->nombre ?></option>
            <?php endwhile; ?>
        </select>

        <label for="imagen">Imagen</label>
        <?= if (isset($pro) && is_object($pro) && !empty($pro->IMA))
        <input type="file" name="imagen"/>

        <input type="submit" value="Guardar"/>
    </form>
</div>