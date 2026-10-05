<?php
/**
 * Expects: $config, $content, $page (nav key), $pageTitle, $pageDescription.
 */
$fullTitle = $page === 'home' ? $config['name'].' · '.$config['tagline'] : $pageTitle.' · '.$config['name'];
?>
<!doctype html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= e($fullTitle) ?></title>
    <meta name="description" content="<?= e($pageDescription) ?>">
    <meta property="og:title" content="<?= e($fullTitle) ?>">
    <meta property="og:description" content="<?= e($pageDescription) ?>">
    <meta name="theme-color" content="#0a1630">
    <link rel="icon" href="assets/img/favicon.svg" type="image/svg+xml">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="stylesheet" href="https://fonts.bunny.net/css?family=inter:400,500,600,700|space-grotesk:500,600,700&display=swap">
    <link rel="stylesheet" href="assets/css/app.css?v=<?= e((string) @filemtime(__DIR__.'/../assets/css/app.css')) ?>">
</head>
<body class="bg-canvas font-sans text-slate-700 antialiased">
<a href="#main" class="sr-only focus:not-sr-only focus:fixed focus:left-4 focus:top-4 focus:z-50 focus:rounded-lg focus:bg-white focus:px-4 focus:py-2 focus:text-navy-950">Skip to content</a>

<header class="sticky top-0 z-40 border-b border-white/10 bg-navy-950/95 backdrop-blur supports-[backdrop-filter]:bg-navy-950/85">
    <nav class="mx-auto flex h-16 max-w-7xl items-center justify-between gap-6 px-4 sm:px-6 lg:px-8" aria-label="Main">
        <a href="index.php" class="flex items-center gap-3 text-white">
            <?php require __DIR__.'/logo.php'; ?>
            <span class="leading-tight">
                <span class="block font-display text-base font-bold tracking-tight"><?= e($config['name']) ?></span>
                <span class="block text-[11px] font-medium uppercase tracking-[0.14em] text-white/50"><?= e($config['tagline']) ?></span>
            </span>
        </a>

        <div class="hidden items-center gap-1 md:flex">
            <?php foreach ($content['nav'] as $key => $item): ?>
                <?php if ($key === 'contact') continue; ?>
                <a href="<?= e($item['href']) ?>"
                   class="rounded-lg px-3 py-2 text-sm font-medium transition <?= $page === $key ? 'bg-white/10 text-white' : 'text-white/70 hover:bg-white/5 hover:text-white' ?>"
                   <?= $page === $key ? 'aria-current="page"' : '' ?>><?= e($item['label']) ?></a>
            <?php endforeach; ?>
            <a href="<?= e($content['nav']['contact']['href']) ?>"
               class="ml-3 inline-flex items-center gap-2 rounded-lg bg-ember-500 px-4 py-2 text-sm font-semibold text-navy-950 transition hover:bg-ember-400"
               <?= $page === 'contact' ? 'aria-current="page"' : '' ?>>
                <?= e($content['nav']['contact']['label']) ?>
                <?= icon('arrow', 'size-4') ?>
            </a>
        </div>

        <details class="group relative md:hidden">
            <summary class="flex cursor-pointer list-none items-center rounded-lg p-2 text-white/80 hover:bg-white/10 hover:text-white [&::-webkit-details-marker]:hidden" aria-label="Open menu">
                <?= icon('menu', 'size-6') ?>
            </summary>
            <div class="absolute right-0 mt-2 w-56 rounded-xl border border-white/10 bg-navy-900 p-2 shadow-2xl">
                <?php foreach ($content['nav'] as $key => $item): ?>
                    <a href="<?= e($item['href']) ?>"
                       class="block rounded-lg px-3 py-2.5 text-sm font-medium <?= $page === $key ? 'bg-white/10 text-white' : 'text-white/75 hover:bg-white/5 hover:text-white' ?>"><?= e($item['label']) ?></a>
                <?php endforeach; ?>
            </div>
        </details>
    </nav>
</header>

<main id="main">
