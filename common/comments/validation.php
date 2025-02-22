<?php

/**
 * @param array{
 *       membre_id: int,
 *       annonce_id: int,
 *       commentaire: string,
 *       date_enregistrement: string,
 *  } $data
 */
function isValid(array $data): bool
{
    $valid = true;
    if (!isset($data['membre_id']) || !(int)$data['membre_id']) {
        alertError('Invalid membre.');
        $valid = false;
    }
    if (!isset($data['annonce_id']) || !(int)$data['annonce_id']) {
        alertError('Invalid annonce.');
        $valid = false;
    }
    if (!isset($data['commentaire']) || strlen($data['commentaire']) < 3) {
        alertError('Invalid commentaire. It should contain at least 3 characters.');
        $valid = false;
    }
    return $valid;
}
