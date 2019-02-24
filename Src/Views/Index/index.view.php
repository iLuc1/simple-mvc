<?php require_once 'Src/Views/top.view.php'; ?>

    <? if (isset($args['user'])) ?>
        <h1>Olá, <?= $args['user']->getNome(); ?></h1>

<?php require_once 'Src/Views/bottom.view.php'; ?>