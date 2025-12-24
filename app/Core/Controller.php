<?php

declare(strict_types=1);

namespace App\Core;

class Controller
{
    protected function view(string $template, array $data = [], ?string $layout = 'layouts/main'): void
    {
        View::render($template, $data, $layout);
    }
}
