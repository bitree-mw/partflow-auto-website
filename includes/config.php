<?php

/*
 * Site-wide settings. Edit these values to change contact details
 * without touching the page templates.
 */
return [
    'name' => 'PartFlow Auto',
    'tagline' => 'Auto parts operations',
    'currency' => 'MWK',

    // Subscription tiers shown in the pricing section and FAQ.
    'pricing_tiers' => [
        ['id' => 'single', 'name' => 'Ignition', 'sites' => '1 site', 'description' => 'Manage 1 site with the essentials for your sales counter and stock room.', 'price' => 'MK15,000'],
        ['id' => 'small', 'name' => 'Drive', 'sites' => '2–3 sites', 'description' => 'Manage 2–3 sites with shared stock visibility and branch transfers.', 'price' => 'MK20,000'],
        ['id' => 'multi', 'name' => 'Overdrive', 'sites' => '4–8 sites', 'description' => 'Manage 4–8 sites with vehicle fitment search and CSV exports.', 'price' => 'MK45,000'],
        ['id' => 'large', 'name' => 'Autopilot', 'sites' => '9+ sites', 'description' => 'Manage 9 or more sites with the full feature set and 24/7 support.', 'price' => 'MK60,000'],
    ],
    'price_period' => 'month',
    'setup_fee' => 'MK200,000',

    // Where demo requests from contact.php are sent (opens the visitor's mail app).
    'contact_email' => 'demo@partflowautomw.com',

    // Optional: leave empty to hide.
    'contact_phone' => '',
    'contact_location' => 'Blantyre, Malawi',
];
