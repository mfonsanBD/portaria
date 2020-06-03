<?php
ob_start();

require __DIR__."/provisorios.php";

$dompdf->loadHtml(ob_get_clean());
$dompdf->setPaper("A4");
$dompdf->render();

$arquivo = date("dmYHi");
$dompdf->stream("atendimentos-provisorios-".$arquivo.".pdf", ["Attachment" => false]);