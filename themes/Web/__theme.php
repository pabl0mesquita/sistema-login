<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <?= $head ?? null; ?>
    <link rel="stylesheet" href="<?= asset("/assets/css/boot.css"); ?>"/>
    <link rel="stylesheet" href="<?= url("/assets/css/styles.css"); ?>"/>
    <link rel="stylesheet" href="<?= asset("/assets/css/login.css"); ?>"/>
    <link rel="icon" type="image/png" href="<?= asset("/assets/images/favicon.png"); ?>"/>
</head>
<body>

<div class="ajax_load">
    <div class="ajax_load_box">
        <div class="ajax_load_box_circle"></div>
        <p class="ajax_load_box_title">Aguarde, carregando...</p>
    </div>
</div>

<?= $v->section("content"); ?>

<script src="<?= url("/shared/scripts/jquery.min.js"); ?>"></script>
<script src="<?= url("/shared/scripts/jquery-ui.js"); ?>"></script>
<script src="<?= asset("/assets/js/jquery.js"); ?>"></script>
<script src="<?= asset("/assets/js/login.js"); ?>"></script>

</body>
</html>
