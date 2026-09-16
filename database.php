<?php

function getDatabaseConnection(): ?PDO
{
    $host = getenv('DB_HOST') ?: '127.0.0.1';
    $name = getenv('DB_NAME') ?: 'hema_portfolio';
    $user = getenv('DB_USER') ?: 'root';
    $password = getenv('DB_PASSWORD') ?: '';

    try {
        return new PDO(
            "mysql:host={$host};dbname={$name};charset=utf8mb4",
            $user,
            $password,
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
        );
    } catch (PDOException $exception) {
        return null;
    }
}

function getProjects(array $fallbackProjects): array
{
    $connection = getDatabaseConnection();

    if ($connection === null) {
        return $fallbackProjects;
    }

    try {
        $projects = $connection->query(
            'SELECT number, title, type, description, css_class AS class FROM projects ORDER BY sort_order ASC'
        )->fetchAll();

        if (!$projects) {
            return $fallbackProjects;
        }

        $existingNumbers = array_column($projects, 'number');
        foreach ($fallbackProjects as $fallbackProject) {
            if (!in_array($fallbackProject['number'], $existingNumbers, true)) {
                $projects[] = $fallbackProject;
            }
        }

        return $projects;
    } catch (PDOException $exception) {
        return $fallbackProjects;
    }
}

function saveContactMessage(string $name, string $email, string $message): bool
{
    $connection = getDatabaseConnection();

    if ($connection === null) {
        return false;
    }

    try {
        $statement = $connection->prepare(
            'INSERT INTO contact_messages (name, email, message) VALUES (:name, :email, :message)'
        );
        return $statement->execute([
            ':name' => $name,
            ':email' => $email,
            ':message' => $message,
        ]);
    } catch (PDOException $exception) {
        return false;
    }
}