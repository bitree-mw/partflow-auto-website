<?php

require __DIR__.'/includes/bootstrap.php';

$page = 'features';
$pageTitle = 'Features';
$pageDescription = 'PartFlow Auto features: point of sale, vehicle fitment, multi-branch stock, transfers, stock takes, purchases, payments, dashboard, reports, roles, and branding.';

require __DIR__.'/partials/header.php';
?>

<section class="relative overflow-hidden bg-navy-950 text-white">
    <div class="pointer-events-none absolute -left-32 -top-32 size-[28rem] rounded-full bg-ember-500/15 blur-3xl"></div>
    <div class="relative mx-auto max-w-7xl px-4 pb-16 pt-16 sm:px-6 lg:px-8 lg:pb-20 lg:pt-20">
        <p class="text-sm font-semibold uppercase tracking-[0.14em] text-ember-400">Features</p>
        <h1 class="mt-3 max-w-3xl font-display text-4xl font-bold leading-tight tracking-tight sm:text-5xl">Everything an auto-parts business runs on, in one system.</h1>
        <p class="mt-5 max-w-2xl text-lg text-white/70">Selling, stock, buying, money, reports, and access control. Every total, tax, discount, and stock change is calculated on the server.</p>

        <nav class="mt-10 flex flex-wrap gap-2" aria-label="Feature sections">
            <?php foreach ($content['feature_groups'] as $group): ?>
                <a href="#<?= e($group['id']) ?>" class="inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/5 px-3.5 py-1.5 text-sm font-medium text-white/80 transition hover:border-ember-400 hover:text-white">
                    <?= icon($group['icon'], 'size-4 text-ember-400') ?>
                    <?= e($group['eyebrow']) ?>
                </a>
            <?php endforeach; ?>
        </nav>
    </div>
</section>

<div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <?php foreach ($content['feature_groups'] as $i => $group): ?>
        <section id="<?= e($group['id']) ?>" class="scroll-mt-20 grid grid-cols-1 gap-10 border-b border-slate-200 py-16 last:border-b-0 lg:grid-cols-[1fr_1.2fr] lg:gap-16 lg:py-20">
            <div class="lg:sticky lg:top-24 lg:self-start">
                <span class="grid size-12 place-items-center rounded-xl <?= $i % 2 === 0 ? 'bg-navy-950 text-white' : 'bg-ember-500 text-navy-950' ?>"><?= icon($group['icon'], 'size-6') ?></span>
                <p class="mt-6 text-sm font-semibold uppercase tracking-[0.14em] text-ember-700"><?= e($group['eyebrow']) ?></p>
                <h2 class="mt-2 font-display text-3xl font-bold tracking-tight text-navy-950"><?= e($group['title']) ?></h2>
                <p class="mt-4 text-lg leading-relaxed text-slate-600"><?= e($group['intro']) ?></p>
            </div>

            <div>
                <ul class="divide-y divide-slate-200 overflow-hidden rounded-2xl border border-slate-200 bg-white">
                    <?php foreach ($group['points'] as $point): ?>
                        <li class="flex gap-4 px-5 py-4 text-slate-700">
                            <span class="mt-0.5 grid size-5 shrink-0 place-items-center rounded-full bg-emerald-100 text-emerald-700"><?= icon('check', 'size-3.5') ?></span>
                            <span class="leading-relaxed"><?= e($point) ?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>

                <?php if ($group['id'] === 'sell'): ?>
                    <div class="mt-6"><?php require __DIR__.'/partials/pos-preview.php'; ?></div>
                <?php elseif ($group['id'] === 'stock'): ?>
                    <div class="mt-6"><?php require __DIR__.'/partials/ledger-preview.php'; ?></div>
                <?php elseif ($group['id'] === 'insight'): ?>
                    <div class="mt-6"><?php require __DIR__.'/partials/dashboard-preview.php'; ?></div>
                <?php elseif ($group['id'] === 'control'): ?>
                    <div class="mt-6 grid gap-3 sm:grid-cols-3">
                        <?php foreach ([['Administrator', 'Everything, all branches', '*'], ['Manager', 'Stock, purchases, reports', 'stock.*'], ['Sales staff', 'POS at assigned branch', 'sales.create']] as [$role, $scope, $perm]): ?>
                            <div class="rounded-xl border border-slate-200 bg-white p-4">
                                <p class="font-semibold text-navy-950"><?= e($role) ?></p>
                                <p class="mt-1 text-sm text-slate-600"><?= e($scope) ?></p>
                                <p class="mt-3 inline-block rounded-md bg-navy-950/5 px-2 py-0.5 font-mono text-xs text-navy-800"><?= e($perm) ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <p class="mt-2 text-xs text-slate-500">Example roles. Administrators define their own roles and permissions.</p>
                <?php endif; ?>
            </div>
        </section>
    <?php endforeach; ?>
</div>

<?php require __DIR__.'/partials/cta.php'; ?>

<?php require __DIR__.'/partials/footer.php'; ?>
