<?php

function announcementById(int $id, PDO $pdo): ?array
{
    $stmt = $pdo->query(sprintf("SELECT id_annonce, titre, description_courte, description_longue, prix, photo, pays, ville, adresse, cp, membre_id, categorie_id, date_enregistrement FROM troc.annonce WHERE id_annonce = %d", $id));

    if ($stmt->rowCount() > 0) {
        $item = $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        $item = null;
    }
    return $item;
}

/** @param array{limit: int, offset: int} $pagination */
function announcementList(PDO $pdo, array $where = [], array $pagination = []): array
{
    $query = "SELECT * FROM troc.annonce";
    if (!empty($where)) {
        $query .= ' WHERE ' . implode(' AND ', $where);
    }
    $query .= ' ORDER BY id_annonce DESC';
    $query = paginated($query, $pagination);
    $stmt = $pdo->query($query);
    if ($stmt->rowCount() > 0) {
        $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $items = [];
    }

    return $items;
}

function announcementCount(PDO $pdo, array $where = []): int
{
    $query = "SELECT count(*) FROM troc.annonce";
    if (!empty($where)) {
        $query .= ' WHERE ' . implode(' AND ', $where);
    }

    return $pdo->query($query)->fetchColumn();
}

/**
 * @param array{
 *      titre: string,
 *      description_courte: string,
 *      description_longue: string,
 *      prix: int,
 *      photo: string,
 *      pays: string,
 *      ville: string,
 *      adresse: string,
 *      cp: string,
 *      membre_id: int,
 *      categorie_id: int,
 *  } $data
 * @param PDO $pdo
 */
function updateAnnouncement(array $data, PDO $pdo): bool
{
    if ($data['photo']) {
        $stmt = $pdo->prepare("UPDATE troc.annonce SET photo = :photo WHERE id_annonce = :id_annonce ");
        $stmt->bindValue(':photo', $data['photo']); // TODO save and get name of photo
        $stmt->bindValue(':id_annonce', $data['id_annonce']); // TODO save and get name of photo
        $stmt->execute();
    }

    $stmt = $pdo->prepare("UPDATE troc.annonce SET titre = :titre, description_courte = :description_courte, description_longue = :description_longue, prix = :prix, pays = :pays, ville = :ville, adresse = :adresse, cp = :cp, membre_id = :membre_id, categorie_id = :categorie_id WHERE id_annonce = :id_annonce ");
    $stmt->bindValue(':titre', $data['titre']);
    $stmt->bindValue(':description_courte', $data['description_courte']);
    $stmt->bindValue(':description_longue', $data['description_longue']);
    $stmt->bindValue(':prix', $data['prix'], PDO::PARAM_INT);
    $stmt->bindValue(':pays', $data['pays']);
    $stmt->bindValue(':ville', $data['ville']);
    $stmt->bindValue(':adresse', $data['adresse']);
    $stmt->bindValue(':cp', $data['cp']);
    $stmt->bindValue(':membre_id', $data['membre_id'], PDO::PARAM_INT);
    $stmt->bindValue(':categorie_id', $data['categorie_id'], PDO::PARAM_INT);
    $stmt->bindValue(':id_annonce', $data['id_annonce'], PDO::PARAM_INT);

    return $stmt->execute();
}


/**
 * @param array{
 *     titre: string,
 *     description_courte: string,
 *     description_longue: string,
 *     prix: int,
 *     photo: string,
 *     pays: string,
 *     ville: string,
 *     adresse: string,
 *     cp: string,
 *     membre_id: int,
 *     categorie_id: int,
 * } $data
 * @param PDO $pdo
 */
function createAnnouncement(array $data, PDO $pdo): bool
{
    $stmt = $pdo->prepare("INSERT INTO troc.annonce (titre, description_courte, description_longue, prix, photo, pays, ville, adresse, cp, membre_id, categorie_id, date_enregistrement) values (:titre, :description_courte, :description_longue, :prix, :photo, :pays, :ville, :adresse, :cp, :membre_id, :categorie_id, NOW())");
    $stmt->bindValue(':titre', $data['titre']);
    $stmt->bindValue(':description_courte', $data['description_courte']);
    $stmt->bindValue(':description_longue', $data['description_longue']);
    $stmt->bindValue(':prix', $data['prix'], PDO::PARAM_INT);
    $stmt->bindValue(':photo', $data['photo']);
    $stmt->bindValue(':pays', $data['pays']);
    $stmt->bindValue(':ville', $data['ville']);
    $stmt->bindValue(':adresse', $data['adresse']);
    $stmt->bindValue(':cp', $data['cp']);
    $stmt->bindValue(':membre_id', $data['membre_id'], PDO::PARAM_INT);
    $stmt->bindValue(':categorie_id', $data['categorie_id'], PDO::PARAM_INT);
//    $stmt->bindValue(':date_enregistrement', date('Y-m-d'));
    return $stmt->execute();
}

function deleteAnnouncement(int $id, PDO $pdo): void
{
    $pdo->query("DELETE FROM troc.annonce WHERE id_annonce = '$id'");
}
