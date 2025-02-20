<?php

function commentById(int $id, PDO $pdo): ?array
{
    $stmt = $pdo->query(sprintf("SELECT id_commentaire, membre_id, annonce_id, commentaire, date_enregistrement FROM troc.commentaire WHERE id_commentaire = %d", $id));

    if ($stmt->rowCount() > 0) {
        $item = $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        $item = null;
    }
    return $item;
}

function commentList(PDO $pdo): array
{
    $stmt = $pdo->query("SELECT * FROM troc.commentaire ORDER BY id_commentaire DESC");
    if ($stmt->rowCount() > 0) {
        $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $items = [];
    }

    return $items;
}

/**
 * @param array{
 *      membre_id: int,
 *      annonce_id: int,
 *      commentaire: string,
 *  } $data
 * @param PDO $pdo
 */
function updateComment(array $data, PDO $pdo): bool
{
    $stmt = $pdo->prepare("UPDATE troc.commentaire SET membre_id = :membre_id, annonce_id = :annonce_id, commentaire = :commentaire, date_enregistrement = :date_enregistrement  WHERE id_commentaire = :id_commentaire ");
    $stmt->bindValue(':membre_id', $data['membre_id'], PDO::PARAM_INT);
    $stmt->bindValue(':annonce_id', $data['annonce_id'], PDO::PARAM_INT);
    $stmt->bindValue(':commentaire', $data['commentaire']);
    $stmt->bindValue(':date_enregistrement', date('Y-m-d'));
    return $stmt->execute();
}


/**
 * @param array{
 *       membre_id: int,
 *       annonce_id: int,
 *       commentaire: string,
 * } $data
 * @param PDO $pdo
 */
function createComment(array $data, PDO $pdo): bool
{
    $stmt = $pdo->prepare("INSERT INTO troc.commentaire (membre_id, annonce_id, commentaire, date_enregistrement) values (:membre_id, :annonce_id, :commentaire, :date_enregistrement)");
    $stmt->bindValue(':membre_id', $data['membre_id'], PDO::PARAM_INT);
    $stmt->bindValue(':annonce_id', $data['annonce_id'], PDO::PARAM_INT);
    $stmt->bindValue(':commentaire', $data['commentaire']);
    $stmt->bindValue(':date_enregistrement', date('Y-m-d'));
    return $stmt->execute();
}

function deleteComment(int $id, PDO $pdo): void
{
    $pdo->query("DELETE FROM troc.commentaire WHERE id_commentaire = '$id'");
}
