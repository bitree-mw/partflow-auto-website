<?php
$sample = $content['sample'];
$subtotal = array_sum(array_column($sample['cart'], 'price'));
$total = $subtotal - $sample['discount'];
$removed = $subtotal > 0 ? $sample['discount'] / $subtotal * 100 : 0;
?>
<figure class="overflow-hidden rounded-2xl bg-white text-left shadow-2xl shadow-navy-950/40 ring-1 ring-white/10" aria-label="Point of sale preview with sample data">
    <div class="flex items-center gap-2 border-b border-slate-200 bg-canvas px-4 py-2.5">
        <span class="size-2.5 rounded-full bg-slate-300"></span>
        <span class="size-2.5 rounded-full bg-slate-300"></span>
        <span class="size-2.5 rounded-full bg-slate-300"></span>
        <span class="ml-3 truncate text-xs text-slate-500">Point of sale · Selling from <strong class="font-semibold text-navy-950"><?= e($sample['branch']) ?></strong></span>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-[minmax(0,1fr)_15.5rem]">
        <div class="space-y-3 p-4">
            <div class="flex items-center gap-2 rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm text-slate-500">
                <?= icon('search', 'size-4 text-slate-400') ?>
                <span class="text-navy-950">corolla</span><span class="-ml-1.5 h-4 w-px animate-pulse bg-ember-500"></span>
            </div>
            <div class="flex flex-wrap gap-2 text-[11px] font-medium">
                <span class="rounded-full border border-ember-300 bg-ember-50 px-2.5 py-1 text-ember-800">Toyota Corolla 2008–2013</span>
                <span class="rounded-full border border-slate-200 px-2.5 py-1 text-slate-500">All product types</span>
            </div>

            <div class="space-y-2">
                <?php foreach ($sample['parts'] as $i => $part): ?>
                    <div class="rounded-xl border p-3 <?= $i === 0 ? 'border-ember-300 bg-ember-50/60' : 'border-slate-200' ?>">
                        <div class="flex items-start justify-between gap-3">
                            <div class="min-w-0">
                                <p class="text-[10px] font-semibold uppercase tracking-wider text-slate-400"><?= e($part['type']) ?> · <?= e($part['brand']) ?></p>
                                <p class="truncate text-sm font-semibold text-navy-950"><?= e($part['name']) ?> <span class="font-mono text-xs font-normal text-slate-500">(<?= e($part['code']) ?>)</span></p>
                            </div>
                            <span class="grid size-7 shrink-0 place-items-center rounded-lg bg-navy-950 text-sm font-bold text-white">+</span>
                        </div>
                        <div class="mt-2 flex flex-wrap items-center gap-1.5 text-[11px] font-medium">
                            <span class="rounded-md px-2 py-0.5 <?= $part['here'] > 0 ? 'bg-emerald-50 text-emerald-700' : 'bg-rose-50 text-rose-700' ?>"><?= e($sample['branch']) ?> <?= $part['here'] ?></span>
                            <span class="rounded-md bg-slate-100 px-2 py-0.5 text-slate-600">Other <?= $part['other'] ?></span>
                            <span class="rounded-md bg-navy-950/5 px-2 py-0.5 text-navy-800">Fits <?= $part['fits'] ?></span>
                            <span class="ml-auto font-semibold text-navy-950"><?= e(money($part['price'])) ?></span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="flex flex-col border-t border-slate-200 bg-canvas/70 p-4 sm:border-l sm:border-t-0">
            <p class="text-[10px] font-semibold uppercase tracking-wider text-ember-700">Current order</p>
            <p class="font-display text-lg font-bold text-navy-950">Cart <span class="text-sm font-medium text-slate-400"><?= count($sample['cart']) ?></span></p>

            <div class="mt-3 space-y-2">
                <?php foreach ($sample['cart'] as $line): ?>
                    <div class="flex items-start justify-between gap-2 rounded-lg bg-white px-3 py-2 ring-1 ring-slate-200">
                        <div class="min-w-0">
                            <p class="font-mono text-[11px] font-semibold text-navy-950"><?= e($line['code']) ?></p>
                            <p class="truncate text-xs text-slate-500"><?= e($line['name']) ?></p>
                        </div>
                        <span class="shrink-0 text-xs font-semibold text-navy-950"><?= e(money($line['price'])) ?></span>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="mt-3 rounded-lg border border-dashed border-slate-300 bg-white p-3 text-[11px]">
                <div class="flex justify-between"><span class="text-slate-500">Discount</span><span class="font-semibold text-navy-950"><?= e(money($sample['discount'])) ?></span></div>
                <div class="mt-1 flex justify-between"><span class="text-slate-500">Removed</span><span class="font-semibold text-emerald-700"><?= number_format($removed, 2) ?>%</span></div>
                <div class="mt-1 flex justify-between"><span class="text-slate-500">Allowed</span><span class="font-semibold text-navy-950"><?= number_format($sample['max_discount'], 2) ?>%</span></div>
            </div>

            <div class="mt-auto pt-4">
                <div class="flex items-center justify-between gap-2 whitespace-nowrap rounded-xl bg-ember-500 px-3 py-3 text-xs font-bold text-navy-950">
                    <span>Complete sale</span>
                    <span><?= e(money($total)) ?></span>
                </div>
            </div>
        </div>
    </div>
</figure>
