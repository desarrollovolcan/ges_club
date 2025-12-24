<?php

declare(strict_types=1);

namespace App\Core;

class View
{
    public static function render(string $template, array $data = []): void
    {
        $viewPath = __DIR__ . '/../Views/' . $template . '.php';

        if (!file_exists($viewPath)) {
            throw new \RuntimeException("Vista no encontrada: {$template}");
        }

        extract($data, EXTR_SKIP);

        require __DIR__ . '/../Views/layouts/main.php';
    }
}
