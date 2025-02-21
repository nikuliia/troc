<?php

// in session the info of a connected user is stored (does it exist? we connect; doesn't exist? will throw him to the page to connect himself)
// isset is boolean (can give TRUE or FALSE, nothing else)
function userConnected(): bool
{
    return isset($_SESSION['user']);
}

function userConnectedAdmin(): bool
{
    return userConnected() && $_SESSION['user']['status'] == 1;
}

function dd(mixed $value): void
{
    echo '<pre>';
    print_r($value);
    die();
}

function lengthBetween(string $value, int $min, int $max): bool
{
    $length = strlen($value);
    return $length >= $min && $length <= $max;
}

function saveUploadedFile(string $directory, string $fileInputName = 'file'): string {
    $directory = rtrim($directory, '/');
    // Проверяем, существует ли директория, если нет — создаем ее
    if (!is_dir($directory)) {
        if (!mkdir($directory, 0777, true) && !is_dir($directory)) {
            throw new \RuntimeException(sprintf('Directory "%s" was not created', $directory));
        }
    }

    if (!isset($_FILES[$fileInputName]) || $_FILES[$fileInputName]['error'] !== UPLOAD_ERR_OK) {
        throw new \Exception("Ошибка при загрузке файла");
    }

    // Получаем временный путь файла
    $tmpName = $_FILES[$fileInputName]['tmp_name'];

    // Формируем конечный путь для сохранения файла
    $fileName = basename($_FILES[$fileInputName]['name']);
    $filePath = rtrim($directory, '/') . '/' . $fileName;

    if (!copy($tmpName, $filePath)) {
        throw new \Exception("Ошибка при сохранении файла.");
    }

    return $fileName;
}

function login(array $user): void
{
    $_SESSION['user'] = $user;
}