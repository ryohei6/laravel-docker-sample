<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$kernel->bootstrap();

use App\Models\Item;

foreach (range(1, 5) as $i) {
    Item::create(['name' => 'Demo Item ' . $i, 'description' => 'This is a description for item ' . $i]);
}
echo "Seeded 5 items successfully.\n";
