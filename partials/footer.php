</main>

<footer class="bg-navy-950 text-white/60">
    <div class="mx-auto grid max-w-7xl gap-10 px-4 py-14 sm:px-6 md:grid-cols-[1.4fr_1fr_1fr] lg:px-8">
        <div class="max-w-sm">
            <a href="index.php" class="flex items-center gap-3 text-white">
                <?php require __DIR__.'/logo.php'; ?>
                <span class="font-display text-lg font-bold tracking-tight"><?= e($config['name']) ?></span>
            </a>
            <p class="mt-4 text-sm leading-relaxed">
                Inventory and point of sale for businesses that sell motor-vehicle parts, from a single counter to many branches.
            </p>
        </div>

        <div>
            <h2 class="text-xs font-semibold uppercase tracking-[0.14em] text-white/40">Product</h2>
            <ul class="mt-4 space-y-2.5 text-sm">
                <li><a class="hover:text-white" href="features.php#sell">Point of sale</a></li>
                <li><a class="hover:text-white" href="features.php#stock">Multi-branch stock</a></li>
                <li><a class="hover:text-white" href="features.php#money">Payments &amp; balances</a></li>
                <li><a class="hover:text-white" href="features.php#insight">Dashboard &amp; reports</a></li>
                <li><a class="hover:text-white" href="index.php#pricing">Pricing</a></li>
            </ul>
        </div>

        <div>
            <h2 class="text-xs font-semibold uppercase tracking-[0.14em] text-white/40">Get in touch</h2>
            <ul class="mt-4 space-y-2.5 text-sm">
                <li><a class="hover:text-white" href="contact.php">Book a demo</a></li>
                <li><a class="hover:text-white" href="mailto:<?= e($config['contact_email']) ?>"><?= e($config['contact_email']) ?></a></li>
                <?php if ($config['contact_phone'] !== ''): ?>
                    <li><a class="hover:text-white" href="tel:<?= e(preg_replace('/[^\d+]/', '', $config['contact_phone'])) ?>"><?= e($config['contact_phone']) ?></a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
    <div class="border-t border-white/10">
        <div class="mx-auto flex max-w-7xl flex-col gap-2 px-4 py-6 text-xs sm:flex-row sm:items-center sm:justify-between sm:px-6 lg:px-8">
            <p>&copy; <?= date('Y') ?> <?= e($config['name']) ?>. All rights reserved.</p>
            <p>Interface previews use sample data.</p>
        </div>
    </div>
</footer>
</body>
</html>
