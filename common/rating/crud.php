<?php
// We define functions to interact with a "troc.note" database table
function existsByUser($currentUserId, $announcementId, PDO $pdo): bool
{
    $query = "select * from note n
  join membre user on user.id_membre = n.membre_id1
  join membre user2 on user2.id_membre = n.membre_id2
  join annonce a on a.membre_id = user2.id_membre
where user.id_membre = $currentUserId and a.id_annonce = $announcementId";
    $stmt = $pdo->query($query);
    return $stmt->rowCount() > 0;
}

/** @param array{limit: int, offset: int} $pagination */
function ratingList(PDO $pdo, array $where = [], array $pagination = []): array
{
    $query = "SELECT * FROM troc.note";
    if (!empty($where)) {
        $query .= " WHERE " . implode(" AND ", $where);
    }
    $query .= " ORDER BY id_note DESC";
    $query = paginated($query, $pagination);
    $stmt = $pdo->query($query);
    if ($stmt->rowCount() > 0) {
        $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $items = [];
    }

    return $items;
}


/**
 * @param array{
 *     titre: string,
 *     motscles: string,
 * } $data
 * @param PDO $pdo
 */
function createRating(array $data, PDO $pdo): bool
{
    $stmt = $pdo->prepare("INSERT INTO troc.note (membre_id1, membre_id2, note, avis) VALUES (:membre_id1, :membre_id2, :note, :avis)");
    $stmt->bindValue(':membre_id1', $data['membre_id1'], PDO::PARAM_INT);
    $stmt->bindValue(':membre_id2', $data['membre_id2'], PDO::PARAM_INT);
    $stmt->bindValue(':note', $data['note'], PDO::PARAM_INT);
    $stmt->bindValue(':avis', $data['avis']);
    return $stmt->execute();
}

function deleteRating(int $id, PDO $pdo): void
{
    $pdo->query("DELETE FROM troc.note WHERE id_note = '$id'");
}

function ratingCount(PDO $pdo, array $where = []): int
{
    $query = "SELECT count(*) FROM troc.note";
    if (!empty($where)) {
        $query .= ' WHERE ' . implode(' AND ', $where);
    }

    return $pdo->query($query)->fetchColumn();
}
