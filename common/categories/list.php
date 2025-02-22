<?php
function getListForSelector(PDO $pdo): array
{
    $stmt = $pdo->query("SELECT id_categorie, titre FROM troc.categorie ORDER BY titre");
    if ($stmt->rowCount() > 0) {
        $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $items = [];
    }

    return array_column($items, 'titre', 'id_categorie');
}

function topCategoriesByCountAnnonce(PDO $pdo, int $limit): array
{
    $stmt = $pdo->query("select c.*, count(*) countAnnonce
from troc.categorie c
 join troc.annonce a on a.categorie_id = c.id_categorie
group by c.id_categorie
order by count(*) desc
limit $limit");

    if ($stmt->rowCount() > 0) {
        $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $items = [];
    }

    return $items;
}

