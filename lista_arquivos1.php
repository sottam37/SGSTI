<?php
$diretorio_raiz = "arquivos"; // Defina a pasta principal

function listarArquivos($caminho, $nivel = 0) {
    if (!is_dir($caminho)) return;

    $itens = array_diff(scandir($caminho), array('.', '..'));

    if (empty($itens)) {
        echo "<div class='alert alert-info text-center'><i class='fas fa-folder-open'></i> Nenhum arquivo encontrado.</div>";
        return;
    }

    echo "<ul class='list-group nested' style='" . ($nivel === 0 ? "display: block;" : "display: none;") . "'>";

    foreach ($itens as $item) {
        $itemPath = $caminho . DIRECTORY_SEPARATOR . $item;
        $isDir = is_dir($itemPath);
        $icon = $isDir ? "fas fa-folder" : "fas fa-file-alt";

        if ($isDir) {
            echo "<li class='list-group-item folder-toggle'><i class='$icon'></i> $item</li>";
            listarArquivos($itemPath, $nivel + 1); // Chamada recursiva para subdiretórios
        } else {
            echo "<li class='list-group-item'><i class='$icon'></i> <a href='$itemPath' target='_blank'>$item</a></li>";
        }
    }

    echo "</ul>";
}

listarArquivos($diretorio_raiz);
?>
