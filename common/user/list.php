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