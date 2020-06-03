<?php
ob_start();

require __DIR__."/visitantes.php";

$dompdf->loadHtml(ob_get_clean());
$dompdf->setPaper("A4");
$dompdf->render();

$arquivo = date("dmYHi");
$dompdf->stream("atendimentos-visitantes-".$arquivo.".pdf", ["Attachment" => false]);