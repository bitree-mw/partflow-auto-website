<?php

/*
 * Page copy and sample data. Everything described here reflects what the
 * PartFlow Auto application does today; sample figures are illustrative.
 */
return [
    'nav' => [
        'home' => ['label' => 'Overview', 'href' => 'index.php'],
        'features' => ['label' => 'Features', 'href' => 'features.php'],
        'pricing' => ['label' => 'Pricing', 'href' => 'index.php#pricing'],
        'contact' => ['label' => 'Book a demo', 'href' => 'contact.php'],
    ],

    'pillars' => [
        ['value' => 'Live', 'label' => 'branch stock', 'text' => 'Every product card shows what this branch has and what the others hold.'],
        ['value' => 'Traceable', 'label' => 'stock movements', 'text' => 'Every quantity change records its source, the balance before and after, who made it, and when.'],
        ['value' => 'Secure', 'label' => 'role-based access', 'text' => 'Staff see only the screens, actions, and branches their role allows.'],
    ],

    'flow' => [
        ['icon' => 'basket', 'title' => 'Buy', 'text' => 'Record a supplier purchase with line costs. Completing it receives the stock into the chosen branch.'],
        ['icon' => 'box', 'title' => 'Store', 'text' => 'Balances are kept per branch, with reserved quantities and a low-stock level for each part.'],
        ['icon' => 'swap', 'title' => 'Move', 'text' => 'Transfer parts between branches. Both sides get a matching movement, so the totals always agree.'],
        ['icon' => 'receipt', 'title' => 'Sell', 'text' => 'The POS checks branch stock, saves the price, cost, and VAT at checkout, and deducts stock when the sale completes.'],
        ['icon' => 'bars', 'title' => 'Review', 'text' => 'The dashboard and reports show sales, profit, stock value, and balances for the branches you can access.'],
    ],

    'modules' => [
        ['icon' => 'receipt', 'title' => 'Point of sale', 'text' => 'Search by name, code, barcode, OEM number, or vehicle. Branch stock is visible before anything goes into the cart.'],
        ['icon' => 'car', 'title' => 'Vehicle fitment', 'text' => 'Link parts to makes, models, engines, variants, and fuel types so the counter can tell a customer what fits.'],
        ['icon' => 'box', 'title' => 'Multi-branch stock', 'text' => 'Stock is kept per site. Staff work only in the branches they are assigned to, and transfers need access to both.'],
        ['icon' => 'basket', 'title' => 'Purchases', 'text' => 'Save drafts or complete purchases with server-calculated totals. You can record an optional payment at the same time.'],
        ['icon' => 'swap', 'title' => 'Branch transfers', 'text' => 'Completing a transfer writes a transfer-out at the source and a transfer-in at the destination.'],
        ['icon' => 'clipboard', 'title' => 'Stock takes', 'text' => 'Count the shelves, compare the count with the system, and post adjustments. Every variance needs a reason.'],
        ['icon' => 'tag', 'title' => 'Discount guardrails', 'text' => 'Set a maximum discount and a minimum selling price for each part. Checkout applies whichever limit is stricter.'],
        ['icon' => 'wallet', 'title' => 'Payments & balances', 'text' => 'Cash, bank, mobile-money, and card accounts. Each sale tracks paid and balance amounts, and overpayment is blocked.'],
        ['icon' => 'grid', 'title' => 'Live dashboard', 'text' => 'Today\'s sales and profit, revenue trend, branch mix, stock value, and priority actions, for one branch or all.'],
        ['icon' => 'bars', 'title' => 'Reports & CSV', 'text' => 'Sales, purchases, valuation, profit, payments, movements, transfers, variances, expenses, debtors, and creditors.'],
        ['icon' => 'bell', 'title' => 'Low-stock emails', 'text' => 'Get an email when a part drops below its threshold, plus a Monday digest of everything running low.'],
        ['icon' => 'shield', 'title' => 'Roles & permissions', 'text' => 'Custom roles for administrators, managers, and sales staff. The menu shows each person only what they can use.'],
    ],

    'feature_groups' => [
        [
            'id' => 'sell',
            'icon' => 'receipt',
            'eyebrow' => 'Sell',
            'title' => 'A sales counter that knows the shelf.',
            'intro' => 'The point of sale opens in its own tab, built for quick counter work: search, check fitment, confirm stock, and get paid.',
            'points' => [
                'Search by product name, part code, barcode, OEM number, or compatible vehicle',
                'Filter results by vehicle and by product type',
                'Each part card shows stock at this branch, stock at other branches, and how many vehicles it fits',
                'Sell to walk-in or named customers. A partial payment leaves a tracked balance',
                'As you type a discount, the screen shows the percentage removed and the limit allowed',
                'Price, cost, and VAT come from the catalogue at checkout, never from the browser',
                'Stock is deducted and a movement is recorded only when the sale completes',
            ],
        ],
        [
            'id' => 'catalogue',
            'icon' => 'car',
            'eyebrow' => 'Catalogue & fitment',
            'title' => 'Every part, and every car it fits.',
            'intro' => 'Build a catalogue that matches how the trade works: each part has a type and a brand, and it fits a list of vehicles.',
            'points' => [
                'Product types, brands, fuel types, and tax profiles',
                'Separate selling and minimum selling prices. The minimum defaults to 20% below the selling price',
                'A primary vehicle model plus extra compatibility records for other fitments',
                'Makes and models with engine and variant details and duplicate checks',
                'Unique part codes generated automatically',
            ],
        ],
        [
            'id' => 'stock',
            'icon' => 'box',
            'eyebrow' => 'Stock across branches',
            'title' => 'Every quantity has a paper trail.',
            'intro' => 'Stock is tracked separately at each branch, and each workflow that changes it writes a movement record you can audit.',
            'points' => [
                'Per-branch balances with reserved quantities and low-stock levels',
                'Each movement records its type, the signed change, the balance before and after, the source document, the user, and the time',
                'Row locking stops two simultaneous sales from overselling the same shelf',
                'Transfers write balanced transfer-out and transfer-in movements',
                'Stock takes and adjustments are posted in a transaction, and every variance needs a reason',
            ],
        ],
        [
            'id' => 'buy',
            'icon' => 'truck',
            'eyebrow' => 'Buying & suppliers',
            'title' => 'From the supplier\'s invoice to your shelf.',
            'intro' => 'Purchases keep cost prices separate from selling prices, so you can see your real margin.',
            'points' => [
                'Draft and completed purchases with server-calculated totals',
                'Completed purchases bring stock into the chosen branch and record a movement',
                'Optionally record a payment to the supplier when you save the purchase',
                'One shared directory for customers and suppliers, with a creditor report',
            ],
        ],
        [
            'id' => 'money',
            'icon' => 'wallet',
            'eyebrow' => 'Money',
            'title' => 'Know who has paid, and where the money went.',
            'intro' => 'Payments are recorded against the account that received them, and every sale keeps its own balance.',
            'points' => [
                'Payment accounts for cash, bank, mobile money, and card',
                'Each sale has a payment history and a partial or paid status',
                'Payments larger than the outstanding balance are rejected',
                'Expenses by category, optionally linked to a branch and a payment account',
                'VAT is applied through tax profiles and calculated on the server',
            ],
        ],
        [
            'id' => 'insight',
            'icon' => 'bars',
            'eyebrow' => 'Insight',
            'title' => 'See the whole business, or just one branch.',
            'intro' => 'The dashboard and reports only show the branches the signed-in user is allowed to see.',
            'points' => [
                'Today\'s sales and profit, revenue for the last 7, 14, or 30 days, and the sales mix by branch',
                'Inventory valued at the lowest selling price staff are allowed to charge, shown next to purchase cost',
                'Priority actions highlight what needs attention today',
                'Five main reports download as full CSV files in one click',
                'Low-stock emails and a Monday stock digest, sent through a queue',
            ],
        ],
        [
            'id' => 'control',
            'icon' => 'shield',
            'eyebrow' => 'Control',
            'title' => 'Your business, your rules, your brand.',
            'intro' => 'Administrators decide who can do what and where, and make the system look like their own.',
            'points' => [
                'Custom roles with fine-grained and wildcard permissions',
                'User-to-branch assignments, checked on every request',
                'Create, deactivate, and reactivate users and reset passwords. The last administrator cannot be removed',
                'Your company name, logo, and three brand colours on the login, back-office, and POS screens',
                'A REST API protected by Laravel Sanctum alongside normal browser sign-in',
            ],
        ],
    ],

    'plan_includes' => [
        'Point of sale with vehicle fitment search',
        'Stock tracked separately at every branch',
        'Purchases, transfers, and stock takes',
        'Payments, customer balances, and expenses',
        'Dashboard, reports, and CSV exports',
        'Low-stock email alerts',
        'Roles, permissions, and branch access',
        'Your company name, logo, and colours',
    ],

    'faq' => [
        ['q' => 'How much does it cost?', 'a' => 'PartFlow Auto is '.$config['price'].' a '.$config['price_period'].', and every feature is included.'],
        ['q' => 'Does it handle more than one branch?', 'a' => 'Yes. Stock is tracked at each site, and users are assigned to the branches they work in. Transfers move parts between branches and leave a record at both ends.'],
        ['q' => 'Which payment methods can we record?', 'a' => 'Cash, bank, mobile money, and card. Each payment is saved against the account that received it. PartFlow Auto records payments. It is not a card or mobile-money gateway.'],
        ['q' => 'Can staff give any discount they like?', 'a' => 'No. An administrator sets a maximum discount percentage, and each part has a minimum selling price. Checkout applies the stricter of the two on the server.'],
        ['q' => 'Can we use our own logo and colours?', 'a' => 'Yes. Your company name, logo, and three brand colours are applied to the login page, the back office, and the point of sale.'],
        ['q' => 'Does it work offline?', 'a' => 'No. PartFlow Auto is a web application and needs a connection to the server. Every branch works on the same live data.'],
        ['q' => 'Is there an API?', 'a' => 'Yes. A REST API protected by Laravel Sanctum covers the catalogue, stock, purchases, sales, payments, and reports.'],
    ],

    // Illustrative data for the interface previews.
    'sample' => [
        'branch' => 'Lilongwe',
        'parts' => [
            ['type' => 'Brake pads', 'brand' => 'Genuine', 'name' => 'Front brake pad set', 'code' => 'BP-COR-08', 'here' => 12, 'other' => 8, 'fits' => 6, 'price' => 38500],
            ['type' => 'Radiator', 'brand' => 'Aftermarket', 'name' => 'Radiator, manual transmission', 'code' => 'RAD-COR-08', 'here' => 3, 'other' => 5, 'fits' => 4, 'price' => 145000],
            ['type' => 'Head lamp', 'brand' => 'Genuine', 'name' => 'Head lamp assembly, left', 'code' => 'HL-COR-11', 'here' => 0, 'other' => 2, 'fits' => 2, 'price' => 96000],
        ],
        'cart' => [
            ['code' => 'BP-COR-08', 'name' => 'Front brake pad set', 'price' => 38500],
            ['code' => 'SA-COR-08', 'name' => 'Shock absorber, front', 'price' => 52000],
        ],
        'discount' => 3100,
        'max_discount' => 20,
        'metrics' => [
            ['label' => 'Today sales', 'value' => 'MWK 1.24M', 'change' => '8.2% vs yesterday', 'up' => true],
            ['label' => 'Today profit', 'value' => 'MWK 312K', 'change' => '5.1% vs yesterday', 'up' => true],
            ['label' => 'Low-stock parts', 'value' => '14', 'change' => '3 since Monday', 'up' => false],
            ['label' => 'Customer balances', 'value' => 'MWK 2.8M', 'change' => '6 open accounts', 'up' => null],
        ],
        'revenue' => [42, 58, 51, 66, 49, 78, 88], // Oldest to today; day labels are generated.
        'actions' => [
            ['mark' => '!', 'tone' => 'warn', 'title' => 'HL-COR-11 is out of stock', 'meta' => 'Lilongwe · 2 available at other branches'],
            ['mark' => '↓', 'tone' => 'info', 'title' => '2 draft purchases waiting', 'meta' => 'Complete them to receive the stock'],
            ['mark' => '$', 'tone' => 'neutral', 'title' => 'Outstanding customer balance', 'meta' => 'Chisomo Motors · MWK 420,000'],
        ],
        'movements' => [
            ['type' => 'Sale', 'doc' => 'SL-00412', 'code' => 'BP-COR-08', 'change' => -1, 'before' => 12, 'after' => 11, 'site' => 'Lilongwe', 'note' => ''],
            ['type' => 'Transfer out', 'doc' => 'TR-0031', 'code' => 'RAD-COR-08', 'change' => -2, 'before' => 5, 'after' => 3, 'site' => 'Blantyre', 'note' => ''],
            ['type' => 'Transfer in', 'doc' => 'TR-0031', 'code' => 'RAD-COR-08', 'change' => 2, 'before' => 1, 'after' => 3, 'site' => 'Mzuzu', 'note' => ''],
            ['type' => 'Purchase', 'doc' => 'PU-0107', 'code' => 'TL-COR-11', 'change' => 6, 'before' => 0, 'after' => 6, 'site' => 'Lilongwe', 'note' => ''],
            ['type' => 'Stock take', 'doc' => 'ST-0019', 'code' => 'SA-COR-08', 'change' => -1, 'before' => 9, 'after' => 8, 'site' => 'Lilongwe', 'note' => 'Damaged in storage'],
        ],
    ],
];
