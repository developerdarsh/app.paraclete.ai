<?php
// Include the Laravel application
require __DIR__.'/bootstrap/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';

// Create an instance of the console kernel
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);

// Run the necessary artisan commands
$kernel->call('view:clear');
$kernel->call('config:clear');
$kernel->call('route:clear');
$kernel->call('cache:clear');
$kernel->call('clear-compiled');
$kernel->call('optimize');

echo "Cache cleared!";
