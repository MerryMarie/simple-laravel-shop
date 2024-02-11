<?php

namespace App\Providers;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
class AppServiceProvider extends ServiceProvider

{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
        Blade::if('incart', function ($id){
            return Product::isInCart($id);
        });

        Blade::directive('price', function ($price){
            return "<?php echo number_format($price, 0, '.', ' '); ?>";
        });






        View::composer('*', function ($view) {


            $view->with('cart_count', Cart::cartCount());
        });
    }
}
