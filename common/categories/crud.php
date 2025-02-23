<?php
// We define functions to interact with a "troc.categorie" database table
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

// categoryList function fetches a list of categories with optional sorting and pagination
/** @param array{limit: int, offset: int} $pagination */
function categoryList(PDO $pdo, array $orderBy = ['id_categorie', 'DESC'], array $pagination = []): array
{
    $query = "SELECT id_categorie, titre, motscles FROM troc.categorie";
    if (!empty($orderBy)) {
        $query .= " ORDER BY $orderBy[0] $orderBy[1]";
    }
    if (!empty($pagination)) {
        $query .= " LIMIT {$pagination['limit']} OFFSET {$pagination['offset']}";
    }
    $stmt = $pdo->query($query);
    if ($stmt->rowCount() > 0) {
        $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $items = [];
    }

    return $items;
}

// categoriesCount function counts the total number of categories with optional filtering based on conditions provided in the $where array
function categoriesCount(PDO $pdo, array $where = []): int
{
    $query = "SELECT count(*) FROM troc.categorie";
    if (!empty($where)) {
        $query .= ' WHERE ' . implode(' AND ', $where);
    }

    return $pdo->query($query)->fetchColumn();
}

//function fetches categories that have at least one associated announcement from the troc.annonce table
function categoriesWithExistingAnnouncements(PDO $pdo): array
{
    $query = "SELECT c.id_categorie, c.titre, c.motscles
FROM troc.categorie c
join troc.annonce a on a.categorie_id = c.id_categorie
group by c.id_categorie
order by c.id_categorie";

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
 *     id_categorie: int,
 *     titre: string,
 *     motscles: string,
 * } $data
 * @param PDO $pdo
 */

//updateCategory updates an existing category
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

// createCategory inserts a new category into the database
function createCategory(array $data, PDO $pdo): bool
{
    $stmt = $pdo->prepare("INSERT INTO troc.categorie (titre, motscles) VALUES (:titre, :motscles)");
    $stmt->bindValue(':titre', $data['titre']);
    $stmt->bindValue(':motscles', $data['motscles']);
    return $stmt->execute();
}

// // deleteCategory deletes a category from troc.categorie
function deleteCategory(int $id, PDO $pdo): void
{
    $pdo->query("DELETE FROM troc.categorie WHERE id_categorie = '$id'");
}
