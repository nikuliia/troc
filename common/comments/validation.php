<?php

/**
 * @param array{
 *       membre_id: int,
 *       annonce_id: int,
 *       commentaire: string,
 *       date_enregistrement: string,
 *  } $data
 */
function isValid(array $data, array $files): bool
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

    // Image Validation (if uploaded)
    if (!empty($files['photo']['name'])) {
        $authorizedExtensions = ['bmp', 'png', 'jpeg', 'jpg', 'webp'];
        $maxFileSize = 2 * 1024 * 1024; // 2MB limit
        $fileExtension = strtolower(pathinfo($files['photo']['name'], PATHINFO_EXTENSION));
        $fileSize = $files['photo']['size'];

        // Checking File Extension (if the value is not found in the array => alert)
        if (!in_array($fileExtension, $authorizedExtensions, true)){
            alertError('Invalid photo extension (only .bmp, .png, .jpeg, .jpg, .webp are allowed).');
            $valid = false;
        }

        // Checking file size
        if ($fileSize > $maxFileSize) {
            alertError('File size exceeds the 2MB limit.');
            $valid = false;
        }
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
    if (!is_numeric($data['cp'] === 5)) {
        alertError('Invalid zip code format. It should be a 5 digit number.');
        $valid = false;
    }
    if (!is_numeric($data['membre_id'] === 3)) {
        alertError('Invalid user ID. It should be a 3 digit number.');
        $valid = false;
    }
    if (!is_numeric($data['categorie_id'] === 3)) {
        alertError('Invalid user ID. It should be a 3 digit number.');
        $valid = false;
    }
    return $valid;
}
