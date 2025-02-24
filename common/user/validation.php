<?php
/**
 * @param array{
 *        id_membre: int,
 *        pseudo: string,
 *        mdp: string,
 *        nom: string,
 *        prenom: string,
 *        telephone: int,
 *        email: string,
 *        civilite: string,
 *        statut: int,
 *        date_enregistrement: string,
 *  } $data
 */

// validation functions (checking if a user enters all the data in the correct format)
function isValid(array $data, bool $mdp = true): bool
{
    $valid = true;
    if (!isset($data['pseudo']) || strlen($data['pseudo']) < 3 || strlen($data['pseudo']) > 20) {
        alertError('Invalid nickname. It should contain at least 3 characters.');
        $valid = false;
    }
    if ($mdp) {
        if (!isset($data['mdp']) || strlen($data['mdp']) < 6 || strlen($data['mdp']) > 60) {
            alertError('Invalid password. It should contain at least 6 characters.');
            $valid = false;
        }
    }
    if (!isset($data['nom']) || strlen($data['nom']) < 3 || strlen($data['nom']) > 20) {
        alertError('Invalid name format. It should contain at least 3 characters.');
        $valid = false;
    }
    if (!isset($data['prenom']) || strlen($data['prenom']) < 3 || strlen($data['prenom']) > 20) {
        alertError('Invalid surname format. It should contain at least 3 characters.');
        $valid = false;
    }

    if (!preg_match('#^\d{10}$#', $data['telephone'])) {
        alertError('Invalid phone number format. It should contain 10 digits.');
        $valid = false;
    }

    if (!isset($data['email']) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        alertError('Invalid email format.');
        $valid = false;
    }

    if (!isset($data['civilite']) || ($data['civilite'] !== 'm' && $data['civilite'] !== 'f')) {
        alertError('Invalid sex format.');
    }

    // statut validation?

    return $valid;
}

function isLoginValid(array $data): bool
{
    $valid = true;
    if (!isset($data['email']) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        alertError('Invalid email format.');
        $valid = false;
    }
    if (!isset($data['mdp']) || strlen($data['mdp']) < 6 || strlen($data['mdp']) > 60) {
        alertError('Invalid password. It should contain at least 6 characters.');
        $valid = false;
    }
    return $valid;
}

function isEqualPassword(array $user, string $password): bool
{
    return password_verify($password, $user['mdp']);
}
