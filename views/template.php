<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= NOME_DO_SITE ?> <?=$this->titulo;?></title>
    <link rel="stylesheet" href="<?= URL_BASE ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= URL_BASE ?>assets/css/estilo.css">
    <link rel="stylesheet" href="<?= URL_BASE ?>assets/css/croppie.css">
    <link rel="shortcut icon" href="<?= URL_BASE ?>assets/img/favicon.png" />
    <script src="https://kit.fontawesome.com/9e8cae89ef.js" crossorigin="anonymous"></script>
</head>
<body>

<?php
	$this->loadViewInTemplate($viewNome, $dados);
?>

<footer class="text-padrao text-center fixed-bottom bg-white pt-3 pb-3">&copy; 2015 - <?= date("Y"); ?> - Sistema para Controle de Portaria</footer>

<script type="text/javascript" src="<?= URL_BASE ?>assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?= URL_BASE ?>assets/js/Chart.min.js"></script>
<script type="text/javascript" src="<?= URL_BASE ?>assets/js/jquery.mask.min.js"></script>
<script type="text/javascript" src="<?= URL_BASE ?>assets/js/sweetalert.min.js"></script>
<script type="text/javascript" src="<?= URL_BASE ?>assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?= URL_BASE ?>assets/js/croppie.min.js"></script>
<script type="text/javascript" src="<?= URL_BASE ?>assets/js/script.js"></script>
<script type="text/javascript" src="<?= URL_BASE ?>assets/js/portaria.js"></script>
</body>
</html>