<?php

// in session the info of a connected user is stored (does it exist? we connect; doesn't exist? will throw him to the page to connect himself)
// isset is boolean (can give TRUE or FALSE, nothing else)
function userConnected(): bool
{
    return isset($_SESSION['user']);
}

function userId(): ?int
{
    return $_SESSION['user']['id_membre'] ?? null;
}

function userEmail(): string
{
    return $_SESSION['user']['email'];
}

function userConnectedAdmin(): bool
{
    if (!isset($_SESSION['user']['statut'])) {
        return false;
    }

    return userConnected() && $_SESSION['user']['statut'] == 1;
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

function saveUploadedFile(string $directory, string $fileInputName = 'file'): string
{
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

function logout(): void
{
    unset($_SESSION['user']);
}

// region [Pagination]
function pageQuery(int $page): string
{
    return http_build_query(array_merge($_GET, compact('page')));
}

function currentPage(): int
{
    return (int)($_GET['page'] ?? 1);
}

function pagination(int $total): array
{
    $page = currentPage();

    // Осуществляем проверку корректности параметра страницы
    if ($page < 1) {
        $page = 1; // Если страница меньше 1, устанавливаем минимальное значение 1
    }

    // Вычисляем офсет
    $offset = ($page - 1) * PER_PAGE;

    // Ограничиваем офсет, чтобы не выходить за пределы общего количества
    if ($offset >= $total) {
        $offset = 0;
    }

    return [
        'limit' => PER_PAGE, // Лимит - количество элементов на странице
        'offset' => $offset,
    ];
}

/** @param array{limit: int, offset: int} $pagination */
function paginated(string $query, array $pagination): string
{
    if (empty($pagination)) {
        return $query;
    }

    return $query . " LIMIT {$pagination['limit']} OFFSET {$pagination['offset']}";
}
// endregion
