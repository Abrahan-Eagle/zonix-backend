<?php

require_once 'vendor/autoload.php';

use Illuminate\Support\Facades\App;

// Bootstrap Laravel
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "Actualizando URLs de imágenes de local a producción...\n";

// Actualizar URLs de imágenes de perfil
$profiles = \App\Models\Profile::whereNotNull('photo_users')->get();

foreach ($profiles as $profile) {
    $oldUrl = $profile->photo_users;
    $newUrl = str_replace('http://192.168.27.4:8000', 'https://zonix.aiblockweb.com', $oldUrl);
    
    if ($oldUrl !== $newUrl) {
        $profile->photo_users = $newUrl;
        $profile->save();
        echo "Actualizada imagen ID: {$profile->id}\n";
        echo "  Antes: {$oldUrl}\n";
        echo "  Después: {$newUrl}\n\n";
    }
}

echo "Actualización completada.\n";
