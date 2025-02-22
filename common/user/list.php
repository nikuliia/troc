<?php
function getUserListForSelector(PDO $pdo): array
{
    $stmt = $pdo->query("SELECT id_membre, pseudo FROM troc.membre ORDER BY pseudo");
    if ($stmt->rowCount() > 0) {
        $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $items = [];
    }

    return array_column($items, 'pseudo', 'id_membre');
}

function topUsersByAvgRating(PDO $pdo, int $limit): array
{
    $stmt = $pdo->query("select m.*, avg(n.note) avgNote from troc.membre m
join troc.note n on n.membre_id2 = m.id_membre
group by m.id_membre
order by avg(n.note) desc
limit $limit");
    if ($stmt->rowCount() > 0) {
        $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $items = [];
    }

    return $items;
}

function topUsersByCountAnnonce(PDO $pdo, int $limit): array
{
    $stmt = $pdo->query("select m.*, count(*) countAnnonce
from troc.membre m
 join troc.annonce a on m.id_membre = a.membre_id
group by m.id_membre
order by count(*) desc
limit $limit");
    if ($stmt->rowCount() > 0) {
        $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $items = [];
    }

    return $items;
}

