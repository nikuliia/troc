<?php

function categoryById(int $id, PDO $pdo): ?array
{
    $stmt = $pdo->query(sprintf("SELECT id_categorie, titre, motscles FROM troc.categorie WHERE id_categorie = %d", $id));

    if ($stmt->rowCount() > 0) {
        $item = $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        $item = null;
    }
    return $item;
}

function categoryList(PDO $pdo): array
{
    $stmt = $pdo->query("SELECT id_categorie, titre, motscles FROM troc.categorie ORDER BY id_categorie DESC");
    if ($stmt->rowCount() > 0) {
        $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $items = [];
    }

    return $items;
}

/**
 * @param array{
 *     id_categorie: int,
 *     titre: string,
 *     motscles: string,
 * } $data
 * @param PDO $pdo
 */
function updateCategory(array $data, PDO $pdo): bool
{
    $stmt = $pdo->prepare("UPDATE troc.categorie SET titre = :titre, motscles = :motscles WHERE id_categorie = :id_categorie");
    $stmt->bindValue(':titre', $data['titre']);
    $stmt->bindValue(':motscles', $data['motscles']);
    $stmt->bindValue(':id_categorie', $data['id_categorie'], PDO::PARAM_INT);
    return $stmt->execute();
}

/**
 * @param array{
 *     titre: string,
 *     motscles: string,
 * } $data
 * @param PDO $pdo
 */
function createCategory(array $data, PDO $pdo): bool
{
    $stmt = $pdo->prepare("INSERT INTO troc.categorie (titre, motscles) VALUES (:titre, :motscles)");
    $stmt->bindValue(':titre', $data['titre']);
    $stmt->bindValue(':motscles', $data['motscles']);
    return $stmt->execute();
}

function deleteCategory(int $id, PDO $pdo): void
{
    $pdo->query("DELETE FROM troc.categorie WHERE id_categorie = '$id'");
}
