<?php

declare(strict_types=1);

// Old "page.php" addresses redirect to the clean URL. Form posts are left alone so they still submit.
$requestPath = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
if (str_ends_with($requestPath, '.php') && in_array($_SERVER['REQUEST_METHOD'] ?? 'GET', ['GET', 'HEAD'], true)) {
    $query = $_SERVER['QUERY_STRING'] ?? '';
    header('Location: '.preg_replace('~(?:index)?\.php$~', '', $requestPath).($query !== '' ? '?'.$query : ''), true, 301);
    exit;
}

$config = require __DIR__.'/config.php';
$content = require __DIR__.'/content.php';

/**
 * Escape a value for safe HTML output.
 */
function e(?string $value): string
{
    return htmlspecialchars($value ?? '', ENT_QUOTES, 'UTF-8');
}

/**
 * Render a stroke icon from includes/icons.php.
 */
function icon(string $name, string $class = 'size-6'): string
{
    static $icons = null;
    $icons ??= require __DIR__.'/icons.php';

    $paths = $icons[$name] ?? $icons['box'];

    return '<svg class="'.e($class).'" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" '
        .'stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">'.$paths.'</svg>';
}

/**
 * Format an amount in the configured currency, e.g. "MWK 38,500".
 */
function money(int|float $amount): string
{
    global $config;

    return $config['currency'].' '.number_format($amount);
}
