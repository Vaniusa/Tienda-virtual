<!DOCTYPE HTML>
<html lang="es" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8"/>
    <title>Tiendas de camisetas</title>
    <link rel="stylesheet" href="<?= base_url ?>assets/css/styles.css">
</head>
<body>

<div id="container">
    <!--CABECERA -->
    <header id="header">
        <div id="logo">
            <img src="<?= base_url ?>assets/img/camiseta.png" alt="Camiseta Logo"/>
            <a href="index.php">
                Tienda de camisetas
            </a>
        </div>
    </header>


    <!-- MENU -->
    <?php $categorias = Utils::showCategorias(); ?>
    <nav id="menu">
        <ul>
            <li><a href="#">Inicio</a></li>
            <?php while ($cat = $categorias->fetch_object()): ?>
                <li><a href="#"><?= $cat->nombre ?></a></li>
            <?php endwhile; ?>
        </ul>
    </nav>

    <div id="content">