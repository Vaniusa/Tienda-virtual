<?php if (isset($_SESSION['identity'])): ?>
    <h1>Hacer pedido</h1>
<p>
    <a href="<?= base_url ?>carrito/index">Ver los productos y el precio del pedido</a>
</p>

</br>
<h3Direccion para el envio:</h3>
<form action="<?=base_url.'pedido/add'?>" method="post">
    <label for="provincia">Provincia</label>
    <input type="text" name="provincia"  required/>

    <label for="ciudad">Ciudad</label>
    <input type="text" name="localidad" required/>

    <label for="direccion">Direccion</label>
    <input type="text" name="direccion" required/>

<input type="submit" value="Confirmar"/>
</form>



<?php else: ?>
    <h1>Necesitas estar idendificado</h1>
    <p>Tieñes que estar identificado para realizar el pedido</p>
<?php endif; ?>


