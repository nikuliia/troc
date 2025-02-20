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
 *      cp: string,
 *      membre_id: int,
 *      categorie_id: int,
 *      date_enregistrement: string
 *  } $data
*/
function isValid(array $data): bool
{
    $valid = true;
    if (!isset($data['titre']) || strlen($data['titre']) < 3 || strlen($data['titre']) > 255) {
        alertError('Invalid title. It should contain at least 3 characters.');
        $valid = false;
    }
    if (!isset($data['description_courte']) || strlen($data['description_courte']) < 3 || strlen($data['description_courte']) > 255) {
        alertError('Invalid short description. It should contain at least 3 characters.');
        $valid = false;
    }
    if (!isset($data['description_longue']) || strlen($data['description_longue']) < 3 || strlen($data['description_longue']) > 65535) {
        alertError('Invalid longue description. It should contain at least 3 characters.');
        $valid = false;
    }
    if (!is_numeric($data['prix']) || (int)$data['prix'] < 1) {
        alertError('Invalid price format.');
        $valid = false;
    }

    if (!isset($data['pays']) || strlen($data['pays']) < 3 || strlen($data['pays']) > 20) {
        alertError('Invalid country name format.');
        $valid = false;
    }
    if (!isset($data['ville']) || strlen($data['ville']) < 3 || strlen($data['pays']) > 20) {
        alertError('Invalid city format.');
        $valid = false;
    }
    if (!isset($data['adresse']) || strlen($data['adresse']) > 50) {
        alertError('Invalid address format. It should contain no more than 50 characters.');
        $valid = false;
    }
    if (!isset($data['cp']) || !preg_match('#^\d{5}$#', $data['cp'])) {
        alertError('Invalid zip code format. It should be a 5 digit number.');
        $valid = false;
    }
    if (!is_numeric($data['membre_id'])) {
        alertError('Invalid user ID. It should be a 3 digit number.');
        $valid = false;
    }
    if (!is_numeric($data['categorie_id'])) {
        alertError('Invalid user ID. It should be a 3 digit number.');
        $valid = false;
    }
    return $valid;
}

function isValidPhoto(): bool
{
    if (empty($_FILES['photo']['name'])) {
        alertError('Empty photo');
        return false;
    }

    $maxFileSize = 2 * 1024 * 1024; // 2MB limit
    $fileExtension = strtolower(pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION));

    // Checking File Extension (if the value is not found in the array => alert)
    if (!in_array($fileExtension, ['bmp', 'png', 'jpeg', 'jpg', 'webp'], true)){
        alertError('Invalid photo extension (only .bmp, .png, .jpeg, .jpg, .webp are allowed).');
        return false;
    }

    // Checking file size
    if ($_FILES['photo']['size'] > $maxFileSize) {
        alertError('File size exceeds the 2MB limit.');
        return false;
    }

    return true;
}