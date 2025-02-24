<?php

/**
 * @param array{
 *      titre: string,
 *      motscles: string,
 *  } $data
*/

// validation functions (checking if a user enters all the data in the correct format)
function isValid(array $data): bool
{
    $valid = true;
    if (!lengthBetween($data['titre'] ?? '', 3, 255)) {
        alertError('Invalid Titre. Titre should contain at least 255 characters.');
        $valid = false;
    }
    if (!lengthBetween($data['motscles'] ?? '', 3, 65535)) {
        alertError('Invalid motscles.');
        $valid = false;
    }
    return $valid;
}
