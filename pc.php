<?php
// Obtener el ID desde la URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Cargar el HTML completo
$html = file_get_contents("pcs.html");

// Usar DOM para mostrar solo la sección correspondiente
$dom = new DOMDocument();
libxml_use_internal_errors(true);
$dom->loadHTML($html);
libxml_clear_errors();

$element = $dom->getElementById("pc".$id);

if ($element) {
    echo $dom->saveHTML($element);
} else {
    echo "<h1>Error</h1><p>No se encontró información para esta PC.</p>";
}
?>