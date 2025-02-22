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

function topOldestAnnouncements(PDO $pdo, int $limit): array
{
    $stmt = $pdo->query("SELECT * FROM troc.annonce ORDER BY date_enregistrement LIMIT $limit");
    if ($stmt->rowCount() > 0) {
        $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $items = [];
    }

    return $items;
}