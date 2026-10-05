<?php

require __DIR__.'/includes/bootstrap.php';

$page = 'contact';
$pageTitle = 'Book a demo';
$pageDescription = 'Book a PartFlow Auto demo and see the point of sale, multi-branch stock, and reports working with your own parts.';

$branchOptions = ['1 branch', '2–3 branches', '4–10 branches', 'More than 10 branches'];
$values = ['name' => '', 'business' => '', 'email' => '', 'branches' => '', 'message' => ''];
$errors = [];
$mailto = null;

// No database: a valid submission is turned into a pre-filled email the visitor sends themselves.
if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {
    foreach ($values as $field => $_) {
        $values[$field] = trim((string) ($_POST[$field] ?? ''));
    }

    if ($values['name'] === '') {
        $errors['name'] = 'Please enter your name.';
    }
    if ($values['business'] === '') {
        $errors['business'] = 'Please enter your business name.';
    }
    if (! filter_var($values['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Please enter a valid email address.';
    }
    if ($values['branches'] !== '' && ! in_array($values['branches'], $branchOptions, true)) {
        $errors['branches'] = 'Please choose an option from the list.';
    }
    foreach ($values as $field => $value) {
        if (strlen($value) > 2000) {
            $errors[$field] = 'This field is too long.';
        }
    }

    if ($errors === []) {
        $body = "Name: {$values['name']}\nBusiness: {$values['business']}\nEmail: {$values['email']}\n"
            ."Branches: ".($values['branches'] ?: 'Not specified')."\n\n{$values['message']}";
        $mailto = 'mailto:'.$config['contact_email']
            .'?subject='.rawurlencode('PartFlow Auto demo request: '.$values['business'])
            .'&body='.rawurlencode($body);
    }
}

$inputClass = 'mt-1.5 block w-full rounded-lg border bg-white px-3.5 py-2.5 text-navy-950 shadow-sm outline-none transition placeholder:text-slate-400 focus:border-ember-500 focus:ring-4 focus:ring-ember-500/20';

require __DIR__.'/partials/header.php';
?>

<section class="bg-navy-950 text-white">
    <div class="mx-auto max-w-7xl px-4 pb-14 pt-16 sm:px-6 lg:px-8 lg:pt-20">
        <p class="text-sm font-semibold uppercase tracking-[0.14em] text-ember-400">Book a demo</p>
        <h1 class="mt-3 max-w-3xl font-display text-4xl font-bold leading-tight tracking-tight sm:text-5xl">See it running with your own parts.</h1>
        <p class="mt-5 max-w-2xl text-lg text-white/70">Tell us a little about your business and we'll set up a walkthrough of the counter, the stock room, and the reports.</p>
    </div>
</section>

<section class="mx-auto grid max-w-7xl grid-cols-1 gap-10 px-4 py-16 sm:px-6 lg:grid-cols-[1.3fr_1fr] lg:px-8 lg:py-20">
    <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-xl shadow-navy-950/5 sm:p-8">
        <?php if ($mailto !== null): ?>
            <div class="rounded-xl bg-emerald-50 p-5 ring-1 ring-emerald-200" role="status">
                <p class="font-semibold text-emerald-900">Your request is ready to send.</p>
                <p class="mt-1 text-sm text-emerald-800">We've written the email for you. Open it in your mail app and press send.</p>
                <a href="<?= e($mailto) ?>" class="mt-4 inline-flex items-center gap-2 rounded-lg bg-navy-950 px-4 py-2.5 text-sm font-semibold text-white hover:bg-navy-800"><?= icon('mail', 'size-4') ?> Open email</a>
            </div>
        <?php endif; ?>

        <?php if ($errors !== []): ?>
            <div class="mb-6 rounded-xl bg-rose-50 p-4 text-sm text-rose-800 ring-1 ring-rose-200" role="alert">Please fix the highlighted fields and try again.</div>
        <?php endif; ?>

        <form method="post" action="contact" class="<?= $mailto !== null ? 'mt-8' : '' ?> grid gap-5 sm:grid-cols-2" data-demo-form data-email="<?= e($config['contact_email']) ?>" novalidate>
            <?php
            $textFields = [
                'name' => ['Your name', 'text', 'name', 'Chikondi Phiri'],
                'business' => ['Business name', 'text', 'organization', 'Chisomo Motor Spares'],
                'email' => ['Email address', 'email', 'email', 'you@business.com'],
            ];
            ?>
            <?php foreach ($textFields as $field => [$label, $type, $autocomplete, $placeholder]): ?>
                <label class="block text-sm font-medium text-navy-950 <?= $field === 'email' ? 'sm:col-span-1' : '' ?>">
                    <?= e($label) ?>
                    <input type="<?= e($type) ?>" name="<?= e($field) ?>" value="<?= e($values[$field]) ?>" required maxlength="200"
                           autocomplete="<?= e($autocomplete) ?>" placeholder="<?= e($placeholder) ?>"
                           class="<?= $inputClass ?> <?= isset($errors[$field]) ? 'border-rose-400' : 'border-slate-300' ?>"
                           <?= isset($errors[$field]) ? 'aria-invalid="true" aria-describedby="'.e($field).'-error"' : '' ?>>
                    <?php if (isset($errors[$field])): ?>
                        <span id="<?= e($field) ?>-error" class="mt-1.5 block text-xs text-rose-700"><?= e($errors[$field]) ?></span>
                    <?php endif; ?>
                </label>
            <?php endforeach; ?>

            <label class="block text-sm font-medium text-navy-950">
                How many branches?
                <select name="branches" class="<?= $inputClass ?> <?= isset($errors['branches']) ? 'border-rose-400' : 'border-slate-300' ?>">
                    <option value="">Choose one</option>
                    <?php foreach ($branchOptions as $option): ?>
                        <option value="<?= e($option) ?>" <?= $values['branches'] === $option ? 'selected' : '' ?>><?= e($option) ?></option>
                    <?php endforeach; ?>
                </select>
                <?php if (isset($errors['branches'])): ?>
                    <span class="mt-1.5 block text-xs text-rose-700"><?= e($errors['branches']) ?></span>
                <?php endif; ?>
            </label>

            <label class="block text-sm font-medium text-navy-950 sm:col-span-2">
                What would you like to see? <span class="font-normal text-slate-400">(optional)</span>
                <textarea name="message" rows="4" maxlength="2000" placeholder="For example: how transfers work between our two shops, or how credit sales are tracked."
                          class="<?= $inputClass ?> border-slate-300"><?= e($values['message']) ?></textarea>
            </label>

            <div class="flex flex-col gap-3 sm:col-span-2 sm:flex-row sm:items-center sm:justify-between">
                <p class="text-xs text-slate-500">This opens your email app with the details filled in. Nothing is stored on this website.</p>
                <button type="submit" class="inline-flex shrink-0 items-center justify-center gap-2 rounded-xl bg-ember-500 px-5 py-3 text-sm font-semibold text-navy-950 transition hover:bg-ember-400 focus:outline-none focus:ring-4 focus:ring-ember-500/30">
                    Request a demo <?= icon('arrow', 'size-4') ?>
                </button>
            </div>
        </form>
    </div>

    <aside class="space-y-4">
        <a href="mailto:<?= e($config['contact_email']) ?>" class="flex items-center gap-4 rounded-2xl border border-slate-200 bg-white p-5 transition hover:border-ember-300">
            <span class="grid size-11 place-items-center rounded-xl bg-ember-100 text-ember-700"><?= icon('mail', 'size-5') ?></span>
            <span>
                <span class="block text-sm text-slate-500">Email us directly</span>
                <span class="block font-semibold text-navy-950"><?= e($config['contact_email']) ?></span>
            </span>
        </a>
        <?php if ($config['contact_phone'] !== ''): ?>
            <a href="tel:<?= e(preg_replace('/[^\d+]/', '', $config['contact_phone'])) ?>" class="flex items-center gap-4 rounded-2xl border border-slate-200 bg-white p-5 transition hover:border-ember-300">
                <span class="grid size-11 place-items-center rounded-xl bg-ember-100 text-ember-700"><?= icon('phone', 'size-5') ?></span>
                <span>
                    <span class="block text-sm text-slate-500">Call</span>
                    <span class="block font-semibold text-navy-950"><?= e($config['contact_phone']) ?></span>
                </span>
            </a>
        <?php endif; ?>
        <?php if ($config['contact_location'] !== ''): ?>
            <div class="flex items-center gap-4 rounded-2xl border border-slate-200 bg-white p-5">
                <span class="grid size-11 place-items-center rounded-xl bg-ember-100 text-ember-700"><?= icon('pin', 'size-5') ?></span>
                <span>
                    <span class="block text-sm text-slate-500">Based in</span>
                    <span class="block font-semibold text-navy-950"><?= e($config['contact_location']) ?></span>
                </span>
            </div>
        <?php endif; ?>

        <div class="rounded-2xl bg-navy-950 p-6 text-white">
            <p class="font-display text-lg font-bold">What a demo covers</p>
            <ul class="mt-4 space-y-3 text-sm text-white/75">
                <?php foreach (['A sale at the POS: search, fitment, discount, and checkout', 'A purchase arriving and a transfer between branches', 'A stock take with a variance and its reason', 'The dashboard, reports, and CSV exports', 'Roles, branch access, and your own branding'] as $item): ?>
                    <li class="flex gap-3"><span class="mt-0.5 text-ember-400"><?= icon('check', 'size-4') ?></span><?= e($item) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </aside>
</section>

<section class="border-t border-slate-200 bg-white">
    <div class="mx-auto max-w-3xl px-4 py-16 sm:px-6 lg:py-20">
        <h2 class="text-center font-display text-3xl font-bold tracking-tight text-navy-950">Common questions</h2>
        <div class="mt-10 divide-y divide-slate-200 rounded-2xl border border-slate-200">
            <?php foreach ($content['faq'] as $item): ?>
                <details class="group px-5 py-4 open:bg-canvas/60">
                    <summary class="flex cursor-pointer list-none items-center justify-between gap-4 font-semibold text-navy-950 [&::-webkit-details-marker]:hidden">
                        <?= e($item['q']) ?>
                        <span class="grid size-6 shrink-0 place-items-center rounded-full bg-slate-100 text-slate-500 transition group-open:rotate-45 group-open:bg-ember-100 group-open:text-ember-700">+</span>
                    </summary>
                    <p class="mt-3 leading-relaxed text-slate-600"><?= e($item['a']) ?></p>
                </details>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<script>
    // With JavaScript, skip the round trip and open the pre-filled email straight away.
    document.querySelector('[data-demo-form]')?.addEventListener('submit', (event) => {
        const form = event.currentTarget;
        const data = new FormData(form);
        const email = String(data.get('email') || '').trim();

        if (!form.checkValidity() || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
            return; // Let the server validate and show messages.
        }

        event.preventDefault();
        const body = [
            `Name: ${data.get('name')}`,
            `Business: ${data.get('business')}`,
            `Email: ${email}`,
            `Branches: ${data.get('branches') || 'Not specified'}`,
            '',
            data.get('message'),
        ].join('\n');

        window.location.href = `mailto:${form.dataset.email}?subject=${encodeURIComponent('PartFlow Auto demo request: ' + data.get('business'))}&body=${encodeURIComponent(body)}`;
    });
</script>

<?php require __DIR__.'/partials/footer.php'; ?>
