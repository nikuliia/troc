<?php

/**
 * @param array{
 *      membre_id1: int,
 *      membre_id2: int,
 *      note: int,
 *      avis: string,
 *  } $data
*/

// validation functions (checking if a user enters all the data in the correct format)
function isValid(array $data): bool
{
    $valid = true;
    if (empty((int)$data['membre_id1']) ) {
        alertError('Invalid member id.');
        $valid = false;
    }
    if (empty((int)$data['membre_id2'])) {
        alertError('Invalid member id.');
        $valid = false;
    }
    if ((int)$data['membre_id1'] === (int)$data['membre_id2'] ) {
        alertError('Members can not be equals.');
        $valid = false;
    }
    if (empty($data['note']) || !in_array((int)$data['note'], range(1,5))) {
        alertError('Invalid note. Should be between 1 and 5');
        $valid = false;
    }
    if (empty($data['avis']) || strlen($data['avis']) < 3) {
        alertError('Invalid avis. Should be at least 3 characters');
        $valid = false;
    }
    return $valid;
}
