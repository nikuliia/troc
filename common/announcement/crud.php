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

function announcementList(PDO $pdo): array
{
    $stmt = $pdo->query("SELECT * FROM troc.annonce ORDER BY id_annonce DESC");
    if ($stmt->rowCount() > 0) {
        $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $items = [];
    }

    return $items;
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
 *      adresse: string,
 *      membre_id: int,
 *      categorie_id: int,
 *  } $data
 * @param PDO $pdo
 */
function updateAnnouncement(array $data, PDO $pdo): bool
{
    $stmt = $pdo->prepare("UPDATE troc.annonce SET titre = :titre, description_courte = :description_courte, description_longue = :description_longue, prix = :prix, photo = :photo, pays = :pays, ville = :ville, adresse = :adresse, cp = :cp, membre_id = :membre_id, categorie_id = :categorie_id WHERE id_annonce = :id_annonce ");
    $stmt->bindValue(':titre', $data['titre'], PDO::PARAM_INT);
    $stmt->bindValue(':description_courte', $data['description_courte']);
    $stmt->bindValue(':description_longue', $data['description_longue']);
    $stmt->bindValue(':prix', $data['prix'], PDO::PARAM_INT);
    $stmt->bindValue(':photo', $data['photo']); // TODO save and get name of photo
    $stmt->bindValue(':pays', $data['pays']);
    $stmt->bindValue(':ville', $data['ville']);
    $stmt->bindValue(':adresse', $data['adresse']);
    $stmt->bindValue(':cp', $data['adresse']);
    $stmt->bindValue(':membre_id', $data['membre_id'], PDO::PARAM_INT);
    $stmt->bindValue(':categorie_id', $data['id_categorie'], PDO::PARAM_INT);
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
 *     adresse: string,
 *     membre_id: int,
 *     categorie_id: int,
 * } $data
 * @param PDO $pdo
 */
function createAnnouncement(array $data, PDO $pdo): bool
{
    $stmt = $pdo->prepare("INSERT INTO troc.annonce (titre, description_courte, description_longue, prix, photo, pays, ville, adresse, cp, membre_id, categorie_id, date_enregistrement) values (:titre, :description_courte, :description_longue, :prix, :photo, :pays, :ville, :adresse, :cp, :membre_id, :categorie_id, :date_enregistrement)");
    $stmt->bindValue(':titre', $data['titre']);
    $stmt->bindValue(':description_courte', $data['description_courte']);
    $stmt->bindValue(':description_longue', $data['description_longue']);
    $stmt->bindValue(':prix', $data['prix'], PDO::PARAM_INT);
    $stmt->bindValue(':photo', $data['photo']); // TODO save and get name of photo
    $stmt->bindValue(':pays', $data['pays']);
    $stmt->bindValue(':ville', $data['ville']);
    $stmt->bindValue(':adresse', $data['adresse']);
    $stmt->bindValue(':cp', $data['adresse']);
    $stmt->bindValue(':membre_id', $data['membre_id'], PDO::PARAM_INT);
    $stmt->bindValue(':categorie_id', $data['categorie_id'], PDO::PARAM_INT);
    $stmt->bindValue(':date_enregistrement', date('Y-m-d'));
    return $stmt->execute();
}

function deleteAnnouncement(int $id, PDO $pdo): void
{
    $pdo->query("DELETE FROM troc.categorie WHERE id_categorie = '$id'");
}
