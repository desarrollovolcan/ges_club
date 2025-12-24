<?php

declare(strict_types=1);

namespace App\Core;

class View
{
    public static function render(string $template, array $data = [], ?string $layout = 'layouts/main'): void
    {
        $viewPath = __DIR__ . '/../Views/' . $template . '.php';

        if (!file_exists($viewPath)) {
            throw new \RuntimeException("Vista no encontrada: {$template}");
        }

        extract($data, EXTR_SKIP);

        if ($layout === null) {
            require $viewPath;
            return;
        }

        $layoutPath = __DIR__ . '/../Views/' . $layout . '.php';

        if (!file_exists($layoutPath)) {
            throw new \RuntimeException("Layout no encontrado: {$layout}");
        }

        require $layoutPath;
    }
}
