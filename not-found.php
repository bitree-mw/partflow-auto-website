<?php

require __DIR__.'/includes/bootstrap.php';

http_response_code(404);

$page = 'not-found';
$pageTitle = 'Page not found';
$pageDescription = 'The page you were looking for could not be found.';

require __DIR__.'/partials/header.php';
?>

<section class="bg-navy-950 text-white">
    <div class="mx-auto max-w-7xl px-4 py-24 sm:px-6 lg:px-8 lg:py-32">
        <p class="text-sm font-semibold uppercase tracking-[0.14em] text-ember-400">404</p>
        <h1 class="mt-3 font-display text-4xl font-bold tracking-tight sm:text-5xl">Page not found.</h1>
        <p class="mt-4 max-w-xl text-lg leading-relaxed text-white/70">The page you were looking for doesn't exist or has moved.</p>
        <a href="./" class="mt-8 inline-flex items-center gap-2 rounded-xl bg-ember-500 px-5 py-3 text-sm font-semibold text-navy-950 transition hover:bg-ember-400">
            Back to the overview <?= icon('arrow', 'size-4') ?>
        </a>
    </div>
</section>

<?php require __DIR__.'/partials/footer.php'; ?>
