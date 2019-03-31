<?php if (isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'complete'): ?>
    <h1>Tu pedido se ha confirmado</h1>

    <p>
        Tu pedido ha sido guardado con exito, una vez que realices el pago con el coste del
        pedido, sera procesado y enviado.
    </p>

<h3>Datos del pedido</h3>


<?php elseif (isset($_SESSION['pedido']) && $_SESSION['pedido'] != 'complete'): ?>
    <h1>Tu pedido NO ha podido procesarse</h1>
<?php endif; ?>
