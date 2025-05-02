<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * Pile des middlewares globaux HTTP.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            // Middlewares par défaut de Laravel...
            \App\Http\Middleware\SetLanguage::class, // ✅ Ajout du middleware
        ],
    ];
    
   
    

    // Autres méthodes...
}
