<?php

require __DIR__.'/includes/bootstrap.php';

$page = 'home';
$pageTitle = 'Overview';
$pageDescription = 'PartFlow Auto is inventory and point-of-sale software for motor-vehicle parts businesses, with per-branch stock, vehicle fitment, transfers, purchases, payments, and reports.';

// Discount guardrail example: the stricter of the admin cap and the part's floor wins.
$price = 38500;
$cap = 15;
$floor = (int) round($price * 0.8);
$capPrice = (int) round($price * (1 - $cap / 100));
$lowest = max($floor, $capPrice);

require __DIR__.'/partials/header.php';
?>

<!-- Hero -->
<section class="relative overflow-hidden bg-navy-950 text-white">
    <div class="pointer-events-none absolute inset-0 bg-[linear-gradient(to_right,rgb(255_255_255/0.04)_1px,transparent_1px),linear-gradient(to_bottom,rgb(255_255_255/0.04)_1px,transparent_1px)] bg-[size:48px_48px] [mask-image:radial-gradient(ellipse_at_top_left,black_30%,transparent_75%)]"></div>
    <div class="pointer-events-none absolute -right-40 top-10 size-[36rem] rounded-full bg-ember-500/20 blur-3xl"></div>

    <div class="relative mx-auto grid max-w-7xl grid-cols-1 items-center gap-14 px-4 pb-20 pt-16 sm:px-6 lg:grid-cols-[1fr_1.1fr] lg:px-8 lg:pb-28 lg:pt-24">
        <div>
            <p class="inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/5 px-3 py-1 text-xs font-medium text-white/80">
                <span class="size-1.5 rounded-full bg-ember-500"></span>
                Inventory &amp; POS for auto-parts businesses
            </p>
            <h1 class="mt-6 font-display text-4xl font-bold leading-[1.05] tracking-tight sm:text-5xl lg:text-6xl">
                Keep every part, sale, and branch <span class="text-ember-500">moving.</span>
            </h1>
            <p class="mt-6 max-w-xl text-lg leading-relaxed text-white/70">
                PartFlow Auto runs the stock room and the sales counter for motor-vehicle parts businesses. It tracks stock at every branch, records which vehicles each part fits, handles purchases and transfers, and gives you a point of sale that checks the shelf before it sells.
            </p>
            <div class="mt-9 flex flex-wrap gap-3">
                <a href="contact.php" class="inline-flex items-center gap-2 rounded-xl bg-ember-500 px-5 py-3 text-sm font-semibold text-navy-950 shadow-lg shadow-ember-500/20 transition hover:bg-ember-400">
                    Book a demo <?= icon('arrow', 'size-4') ?>
                </a>
                <a href="features.php" class="inline-flex items-center gap-2 rounded-xl border border-white/20 px-5 py-3 text-sm font-semibold text-white transition hover:border-white/40 hover:bg-white/5">
                    See every feature
                </a>
            </div>
        </div>

        <div class="relative">
            <div class="absolute -inset-4 -z-0 rounded-3xl bg-gradient-to-br from-ember-500/30 via-transparent to-transparent blur-2xl"></div>
            <div class="relative">
                <?php require __DIR__.'/partials/pos-preview.php'; ?>
            </div>
            <p class="mt-3 text-center text-xs text-white/40">Point of sale preview · sample data</p>
        </div>
    </div>
</section>

<!-- Pillars -->
<section class="border-b border-slate-200 bg-white">
    <div class="mx-auto grid max-w-7xl divide-y divide-slate-200 px-4 sm:px-6 md:grid-cols-3 md:divide-x md:divide-y-0 lg:px-8">
        <?php foreach ($content['pillars'] as $pillar): ?>
            <div class="py-8 md:px-8 md:first:pl-0 md:last:pr-0">
                <p class="font-display text-2xl font-bold text-navy-950"><?= e($pillar['value']) ?> <span class="text-ember-600"><?= e($pillar['label']) ?></span></p>
                <p class="mt-2 text-sm leading-relaxed text-slate-600"><?= e($pillar['text']) ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<!-- Flow -->
<section class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8 lg:py-28">
    <div class="max-w-2xl">
        <p class="text-sm font-semibold uppercase tracking-[0.14em] text-ember-700">One flow, start to finish</p>
        <h2 class="mt-3 font-display text-3xl font-bold tracking-tight text-navy-950 sm:text-4xl">From the supplier's invoice to the customer's car.</h2>
        <p class="mt-4 text-lg text-slate-600">Each step changes stock through a recorded movement, so the number on the screen always matches the history behind it.</p>
    </div>

    <ol class="mt-14 grid gap-4 sm:grid-cols-2 lg:grid-cols-5">
        <?php foreach ($content['flow'] as $i => $step): ?>
            <li class="relative rounded-2xl border border-slate-200 bg-white p-6">
                <div class="flex items-center justify-between">
                    <span class="grid size-11 place-items-center rounded-xl bg-navy-950 text-white"><?= icon($step['icon'], 'size-5') ?></span>
                    <span class="font-display text-sm font-bold text-slate-300">0<?= $i + 1 ?></span>
                </div>
                <h3 class="mt-5 font-display text-lg font-bold text-navy-950"><?= e($step['title']) ?></h3>
                <p class="mt-2 text-sm leading-relaxed text-slate-600"><?= e($step['text']) ?></p>
                <?php if ($i < count($content['flow']) - 1): ?>
                    <span class="absolute -right-3.5 top-1/2 z-10 hidden size-7 -translate-y-1/2 place-items-center rounded-full border border-slate-200 bg-canvas text-ember-600 lg:grid"><?= icon('arrow', 'size-3.5') ?></span>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
    </ol>
</section>

<!-- Modules -->
<section class="border-y border-slate-200 bg-white">
    <div class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8 lg:py-28">
        <div class="flex flex-wrap items-end justify-between gap-6">
            <div class="max-w-2xl">
                <p class="text-sm font-semibold uppercase tracking-[0.14em] text-ember-700">What's inside</p>
                <h2 class="mt-3 font-display text-3xl font-bold tracking-tight text-navy-950 sm:text-4xl">Built for the parts trade, not adapted to it.</h2>
            </div>
            <a href="features.php" class="inline-flex items-center gap-2 text-sm font-semibold text-navy-950 hover:text-ember-700">Explore all features <?= icon('arrow', 'size-4') ?></a>
        </div>

        <div class="mt-12 grid gap-px overflow-hidden rounded-2xl border border-slate-200 bg-slate-200 sm:grid-cols-2 lg:grid-cols-4">
            <?php foreach ($content['modules'] as $module): ?>
                <article class="group bg-white p-6 transition hover:bg-ember-50/50">
                    <span class="grid size-10 place-items-center rounded-lg bg-ember-100 text-ember-700 transition group-hover:bg-ember-500 group-hover:text-navy-950"><?= icon($module['icon'], 'size-5') ?></span>
                    <h3 class="mt-4 font-semibold text-navy-950"><?= e($module['title']) ?></h3>
                    <p class="mt-2 text-sm leading-relaxed text-slate-600"><?= e($module['text']) ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Discount guardrails -->
<section class="mx-auto grid max-w-7xl grid-cols-1 items-center gap-12 px-4 py-20 sm:px-6 lg:grid-cols-2 lg:px-8 lg:py-28">
    <div>
        <p class="text-sm font-semibold uppercase tracking-[0.14em] text-ember-700">Discount guardrails</p>
        <h2 class="mt-3 font-display text-3xl font-bold tracking-tight text-navy-950 sm:text-4xl">Room to negotiate, with a limit.</h2>
        <p class="mt-4 text-lg leading-relaxed text-slate-600">
            Administrators set a maximum discount percentage, and every part has a minimum selling price. At checkout the server applies whichever limit is stricter, so the limit holds even if someone edits the page in their browser.
        </p>
        <ul class="mt-6 space-y-3 text-sm text-slate-700">
            <li class="flex gap-3"><span class="mt-0.5 text-emerald-600"><?= icon('check', 'size-4') ?></span>The cashier sees the percentage removed and the limit as they type</li>
            <li class="flex gap-3"><span class="mt-0.5 text-emerald-600"><?= icon('check', 'size-4') ?></span>The minimum selling price defaults to 20% below the selling price</li>
            <li class="flex gap-3"><span class="mt-0.5 text-emerald-600"><?= icon('check', 'size-4') ?></span>Each completed sale saves its price, cost, discount, and VAT as they were at that moment</li>
        </ul>
    </div>

    <figure class="rounded-2xl border border-slate-200 bg-white p-6 shadow-xl shadow-navy-950/5 sm:p-8" aria-label="Example of how the discount limit is calculated">
        <p class="font-mono text-xs text-slate-500">BP-COR-08 · Front brake pad set</p>
        <div class="mt-6 space-y-5">
            <div>
                <div class="flex justify-between text-sm"><span class="text-slate-600">Selling price</span><span class="font-semibold text-navy-950"><?= e(money($price)) ?></span></div>
                <div class="mt-2 h-2.5 rounded-full bg-navy-950"></div>
            </div>
            <div>
                <div class="flex justify-between text-sm"><span class="text-slate-600">Admin cap (<?= $cap ?>% off)</span><span class="font-semibold text-navy-950"><?= e(money($capPrice)) ?></span></div>
                <div class="mt-2 h-2.5 rounded-full bg-slate-100"><div class="h-full rounded-full bg-ember-500" style="width: <?= round($capPrice / $price * 100) ?>%"></div></div>
            </div>
            <div>
                <div class="flex justify-between text-sm"><span class="text-slate-600">Part's minimum price</span><span class="font-semibold text-navy-950"><?= e(money($floor)) ?></span></div>
                <div class="mt-2 h-2.5 rounded-full bg-slate-100"><div class="h-full rounded-full bg-slate-400" style="width: <?= round($floor / $price * 100) ?>%"></div></div>
            </div>
        </div>
        <div class="mt-7 flex items-center justify-between rounded-xl bg-ember-50 px-4 py-3 ring-1 ring-ember-200">
            <span class="text-sm font-medium text-ember-900">Lowest price allowed at checkout</span>
            <span class="font-display text-lg font-bold text-navy-950"><?= e(money($lowest)) ?></span>
        </div>
    </figure>
</section>

<!-- Dashboard -->
<section class="border-y border-slate-200 bg-white">
    <div class="mx-auto grid max-w-7xl grid-cols-1 items-center gap-12 px-4 py-20 sm:px-6 lg:grid-cols-[1.25fr_1fr] lg:px-8 lg:py-28">
        <div class="order-2 lg:order-1">
            <?php require __DIR__.'/partials/dashboard-preview.php'; ?>
        </div>
        <div class="order-1 lg:order-2">
            <p class="text-sm font-semibold uppercase tracking-[0.14em] text-ember-700">Dashboard</p>
            <h2 class="mt-3 font-display text-3xl font-bold tracking-tight text-navy-950 sm:text-4xl">See what needs attention today.</h2>
            <p class="mt-4 text-lg leading-relaxed text-slate-600">
                Check today's sales and profit, the revenue trend, and what stock and balances need action. View every branch together or switch to one. Managers only see the branches they are assigned to.
            </p>
            <a href="features.php#insight" class="mt-6 inline-flex items-center gap-2 text-sm font-semibold text-navy-950 hover:text-ember-700">Reports &amp; insight <?= icon('arrow', 'size-4') ?></a>
        </div>
    </div>
</section>

<!-- Ledger -->
<section class="bg-navy-950 text-white">
    <div class="mx-auto grid max-w-7xl grid-cols-1 items-center gap-12 px-4 py-20 sm:px-6 lg:grid-cols-[1fr_1.3fr] lg:px-8 lg:py-28">
        <div>
            <p class="text-sm font-semibold uppercase tracking-[0.14em] text-ember-400">Stock movements</p>
            <h2 class="mt-3 font-display text-3xl font-bold tracking-tight sm:text-4xl">Every quantity has a paper trail.</h2>
            <p class="mt-4 text-lg leading-relaxed text-white/70">
                Sales, purchases, transfers, and stock takes each write a movement showing the change, the balance before and after, the source document, the user, and the time. Stock rows are locked during each update, so two cashiers can't sell the last unit twice.
            </p>
        </div>
        <?php require __DIR__.'/partials/ledger-preview.php'; ?>
    </div>
</section>

<!-- Pricing -->
<section id="pricing" class="scroll-mt-20 border-t border-slate-200 bg-white">
    <div class="mx-auto grid max-w-7xl grid-cols-1 items-center gap-12 px-4 py-20 sm:px-6 lg:grid-cols-2 lg:px-8 lg:py-28">
        <div>
            <p class="text-sm font-semibold uppercase tracking-[0.14em] text-ember-700">Pricing</p>
            <h2 class="mt-3 font-display text-3xl font-bold tracking-tight text-navy-950 sm:text-4xl">One plan with every feature.</h2>
            <p class="mt-4 text-lg leading-relaxed text-slate-600">
                One monthly subscription covers the point of sale, the stock room, and the reports. No feature is locked behind a higher plan.
            </p>
        </div>

        <div class="relative overflow-hidden rounded-3xl bg-navy-950 p-8 text-white shadow-2xl shadow-navy-950/20 sm:p-10">
            <div class="pointer-events-none absolute -right-20 -top-20 size-64 rounded-full bg-ember-500/20 blur-3xl"></div>
            <div class="relative">
                <p class="text-sm font-semibold text-ember-400">PartFlow Auto subscription</p>
                <p class="mt-4 flex flex-wrap items-baseline gap-x-2">
                    <span class="font-display text-4xl font-bold tracking-tight sm:text-5xl"><?= e($config['price']) ?></span>
                    <span class="whitespace-nowrap text-lg text-white/60">/ <?= e($config['price_period']) ?></span>
                </p>

                <ul class="mt-8 grid gap-3 text-sm text-white/80 sm:grid-cols-2">
                    <?php foreach ($content['plan_includes'] as $item): ?>
                        <li class="flex gap-3"><span class="mt-0.5 shrink-0 text-ember-400"><?= icon('check', 'size-4') ?></span><?= e($item) ?></li>
                    <?php endforeach; ?>
                </ul>

                <a href="contact.php" class="mt-9 flex items-center justify-center gap-2 rounded-xl bg-ember-500 px-5 py-3.5 text-sm font-semibold text-navy-950 transition hover:bg-ember-400">
                    Book a demo <?= icon('arrow', 'size-4') ?>
                </a>
            </div>
        </div>
    </div>
</section>

<div class="pt-20"><?php require __DIR__.'/partials/cta.php'; ?></div>

<?php require __DIR__.'/partials/footer.php'; ?>
