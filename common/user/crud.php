<?php

function userById(int $id, PDO $pdo): ?array
{
    $stmt = $pdo->query(sprintf("SELECT id_membre, pseudo, mdp, nom, prenom, telephone, email, civilite, statut FROM troc.membre WHERE id_membre = %d", $id));

    if ($stmt->rowCount() > 0) {
        $item = $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        $item = null;
    }
    return $item;
}

function userList(PDO $pdo): array
{
    $stmt = $pdo->query("SELECT id_membre, pseudo, mdp, nom, prenom, telephone, email, civilite, statut FROM troc.membre ORDER BY id_membre DESC");
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
 *     pseudo: string,
 *     mdp: string,
 *     nom: string,
 *     prenom: string,
 *     telephone: int,
 *     email: string,
 *     civilite: string,
 *     statut: int,
 *     date_enregistrement: string,
 * } $data
 * @param PDO $pdo
 */
function updateUser(array $data, PDO $pdo): bool
{
    $stmt = $pdo->prepare("UPDATE troc.membre SET pseudo = :pseudo, mdp = :mdp, nom = :nom, prenom = :prenom, telephone = :telephone, email = :email, civilite = :civilite, statut = :statut WHERE id_membre = :id_membre");
    $stmt->bindValue(':pseudo', $data['pseudo']);
    $stmt->bindValue(':mdp', $data['mdp']);
    $stmt->bindValue(':nom', $data['nom']);
    $stmt->bindValue(':prenom', $data['prenom']);
    $stmt->bindValue(':telephone', $data['telephone']);
    $stmt->bindValue(':email', $data['email']);
    $stmt->bindValue(':civilite', $data['civilite']);
    $stmt->bindValue(':statut', $data['statut'], PDO::PARAM_INT);
    return $stmt->execute();
}

/**
 * @param array{
 *     id_categorie: int,
 *      pseudo: string,
 *      mdp: string,
 *      nom: string,
 *      prenom: string,
 *      telephone: int,
 *      email: string,
 *      civilite: string,
 *      statut: int,
 *      date_enregistrement: string,
 * } $data
 * @param PDO $pdo
 */
function createUser(array $data, PDO $pdo): bool
{
    $stmt = $pdo->prepare("INSERT INTO troc.membre (pseudo, mdp, nom, prenom, telephone, email, civilite, statut) VALUES (:pseudo, :mdp, :nom, :prenom, :telephone, :email, :civilite, :statut)");
    $stmt->bindValue(':pseudo', $data['pseudo']);
    $stmt->bindValue(':mdp', $data['mdp']);
    $stmt->bindValue(':nom', $data['nom']);
    $stmt->bindValue(':prenom', $data['prenom']);
    $stmt->bindValue(':telephone', $data['telephone']);
    $stmt->bindValue(':email', $data['email']);
    $stmt->bindValue(':civilite', $data['civilite']);
    $stmt->bindValue(':statut', $data['statut'], PDO::PARAM_INT);
    return $stmt->execute();
}

function deleteUser(int $id, PDO $pdo): void
{
    $pdo->query("DELETE FROM troc.membre WHERE id_membre = '$id'");
}

