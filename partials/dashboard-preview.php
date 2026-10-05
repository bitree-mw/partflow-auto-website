<?php
$sample = $content['sample'];
$peak = max($sample['revenue']);
$toneClasses = [
    'warn' => 'bg-ember-100 text-ember-800',
    'info' => 'bg-sky-100 text-sky-800',
    'neutral' => 'bg-slate-100 text-slate-700',
];
?>
<figure class="overflow-hidden rounded-2xl border border-slate-200 bg-canvas p-4 shadow-xl shadow-navy-950/5 sm:p-5" aria-label="Dashboard preview with sample data">
    <div class="flex flex-wrap items-end justify-between gap-3">
        <div>
            <p class="text-[10px] font-semibold uppercase tracking-wider text-ember-700"><?= e(date('l, j F')) ?></p>
            <p class="font-display text-lg font-bold text-navy-950">Good day, Chikondi</p>
        </div>
        <span class="rounded-lg border border-slate-200 bg-white px-3 py-1.5 text-xs font-medium text-slate-600">Branch: All branches ▾</span>
    </div>

    <div class="mt-4 grid grid-cols-2 gap-2.5 lg:grid-cols-4">
        <?php foreach ($sample['metrics'] as $metric): ?>
            <div class="rounded-xl bg-white p-3 ring-1 ring-slate-200">
                <p class="text-[11px] font-medium text-slate-500"><?= e($metric['label']) ?></p>
                <p class="mt-1 font-display text-lg font-bold text-navy-950"><?= e($metric['value']) ?></p>
                <p class="mt-0.5 text-[11px] font-medium <?= $metric['up'] === true ? 'text-emerald-700' : ($metric['up'] === false ? 'text-ember-700' : 'text-slate-500') ?>">
                    <?= $metric['up'] === true ? '↑' : ($metric['up'] === false ? '↓' : '→') ?> <?= e($metric['change']) ?>
                </p>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="mt-2.5 grid grid-cols-1 gap-2.5 lg:grid-cols-[1.3fr_1fr]">
        <div class="rounded-xl bg-white p-4 ring-1 ring-slate-200">
            <div class="flex items-center justify-between">
                <p class="text-sm font-semibold text-navy-950">Revenue movement</p>
                <span class="text-[11px] text-slate-500">Last 7 days</span>
            </div>
            <div class="mt-4 flex h-32 items-end gap-2" role="img" aria-label="Bar chart of sample revenue for the last seven days, rising toward today">
                <?php foreach ($sample['revenue'] as $i => $value): ?>
                    <div class="flex h-full flex-1 flex-col items-center justify-end gap-1.5">
                        <span class="w-full rounded-t-md <?= $i === count($sample['revenue']) - 1 ? 'bg-ember-500' : 'bg-navy-950/80' ?>" style="height: <?= round($value / $peak * 100) ?>%"></span>
                        <span class="text-[10px] text-slate-400"><?= e(date('D', strtotime('-'.(count($sample['revenue']) - 1 - $i).' days'))) ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="rounded-xl bg-white p-4 ring-1 ring-slate-200">
            <div class="flex items-center justify-between">
                <p class="text-sm font-semibold text-navy-950">Priority actions</p>
                <span class="rounded-full bg-navy-950 px-2 py-0.5 text-[10px] font-semibold text-white"><?= count($sample['actions']) ?> open</span>
            </div>
            <ul class="mt-3 space-y-2">
                <?php foreach ($sample['actions'] as $action): ?>
                    <li class="flex items-start gap-2.5">
                        <span class="grid size-6 shrink-0 place-items-center rounded-md text-xs font-bold <?= $toneClasses[$action['tone']] ?>"><?= e($action['mark']) ?></span>
                        <span class="min-w-0">
                            <span class="block truncate text-xs font-semibold text-navy-950"><?= e($action['title']) ?></span>
                            <span class="block truncate text-[11px] text-slate-500"><?= e($action['meta']) ?></span>
                        </span>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</figure>
