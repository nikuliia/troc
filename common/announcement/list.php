<?php
function getAnounceListForSelector(PDO $pdo): array
{
    $stmt = $pdo->query("SELECT id_annonce, titre FROM troc.annonce ORDER BY titre");
    if ($stmt->rowCount() > 0) {
        $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $items = [];
    }

    return array_column($items, 'titre', 'id_annonce');
}