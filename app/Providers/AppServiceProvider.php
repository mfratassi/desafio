<?php

namespace App\Providers;

use App\Models\Desconto;
use App\Models\DescontoProduto;
use App\Observers\DescontoObserver;
use App\Observers\DescontoProdutoObserver;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer("app", function($view){
            $view->with('itensMenu', [
                [
                    'descricao' => "Cidades", 
                    'link' => route('cidades.index'),
                ]
            ]);
        });

        Desconto::observe(DescontoObserver::class);
        DescontoProduto::observe(DescontoProdutoObserver::class);
    }
}
