<figure class="overflow-hidden rounded-2xl border border-white/10 bg-navy-900 shadow-2xl shadow-black/30" aria-label="Stock movement ledger with sample data">
    <div class="flex items-center justify-between border-b border-white/10 px-4 py-3">
        <p class="text-sm font-semibold text-white">Stock movements</p>
        <span class="text-[11px] text-white/40">Newest first</span>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full min-w-[34rem] text-left text-xs">
            <thead class="text-[10px] uppercase tracking-wider text-white/40">
                <tr>
                    <th scope="col" class="px-4 py-2.5 font-semibold">Type</th>
                    <th scope="col" class="px-4 py-2.5 font-semibold">Source</th>
                    <th scope="col" class="px-4 py-2.5 font-semibold">Part</th>
                    <th scope="col" class="px-4 py-2.5 text-right font-semibold">Change</th>
                    <th scope="col" class="px-4 py-2.5 font-semibold">Balance</th>
                    <th scope="col" class="px-4 py-2.5 font-semibold">Branch</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5 text-white/75">
                <?php foreach ($content['sample']['movements'] as $row): ?>
                    <tr>
                        <td class="px-4 py-3 font-medium text-white">
                            <?= e($row['type']) ?>
                            <?php if ($row['note'] !== ''): ?>
                                <span class="mt-0.5 block text-[10px] font-normal text-ember-300">Reason: <?= e($row['note']) ?></span>
                            <?php endif; ?>
                        </td>
                        <td class="px-4 py-3 font-mono text-white/60"><?= e($row['doc']) ?></td>
                        <td class="px-4 py-3 font-mono"><?= e($row['code']) ?></td>
                        <td class="px-4 py-3 text-right font-mono font-semibold <?= $row['change'] > 0 ? 'text-emerald-400' : 'text-rose-400' ?>"><?= $row['change'] > 0 ? '+' : '−' ?><?= abs($row['change']) ?></td>
                        <td class="px-4 py-3 font-mono text-white/60"><?= $row['before'] ?> → <span class="text-white"><?= $row['after'] ?></span></td>
                        <td class="px-4 py-3"><?= e($row['site']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</figure>
