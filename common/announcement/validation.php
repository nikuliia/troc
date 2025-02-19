<?php

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
 *      date_enregistrement: string
 *  } $data
*/
function isValid(array $data): bool
{
    $valid = true;
    if (!lengthBetween($data['titre'] ?? '', 3, 255)) {
        alertError('Invalid Titre. Titre should contain at least 255 characters.');
        $valid = false;
    }
    if (!lengthBetween($data['description_courte'] ?? '', 3, 255)) {
        alertError('Invalid description_courte.');
        $valid = false;
    }
    if (!lengthBetween($data['description_longue'] ?? '', 3, 65535)) {
        alertError('Invalid description_longue');
        $valid = false;
    }
    if (!is_numeric($data['prix']) || (int)$data['prix'] < 1) {
        alertError('Invalid prix');
        $valid = false;
    }
    if ($data['photo']) {
        // TODO
    }
    if (!lengthBetween($data['pays'] ?? '', 3, 20)) {
        alertError('Invalid pays');
        $valid = false;
    }
    if (!lengthBetween($data['ville'] ?? '', 3, 20)) {
        alertError('Invalid ville');
        $valid = false;
    }
    if (!lengthBetween($data['adresse'] ?? '', 3, 50)) {
        alertError('Invalid adresse');
        $valid = false;
    }
    if (!is_numeric($data['cp'])) {
        alertError('Invalid cp');
        $valid = false;
    }
    if (!is_numeric($data['membre_id'])) {
        alertError('Invalid membre');
        $valid = false;
    }
    if (!is_numeric($data['categorie_id'])) {
        alertError('Invalid categorie_id');
        $valid = false;
    }
    return $valid;
}
