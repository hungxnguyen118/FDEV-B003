<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

use Illuminate\Support\Facades\Blade;
use Money\Money;

use DB;

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
        //get loai sach cap 1
        $ds_loai_sach_cap_1 = DB::table('bs_loai_sach')
        ->where('id_loai_cha',0)
        ->get();

        $ds_loai_sach_cap_1 = json_decode(json_encode($ds_loai_sach_cap_1));

        foreach($ds_loai_sach_cap_1 as $loai_con_cap_1){
            $ds_loai_sach_cap_2 = DB::table('bs_loai_sach')
                ->where('id_loai_cha', $loai_con_cap_1->id)
                ->get();

            $ds_loai_sach_cap_2 = json_decode(json_encode($ds_loai_sach_cap_2));
            $loai_con_cap_1->ds_con = $ds_loai_sach_cap_2;
        }

        //echo '<pre>',print_r($ds_loai_sach_cap_1),'</pre>';
        View::share('ds_loai_sach', $ds_loai_sach_cap_1);


        Blade::directive('convert_money', function ($money) {
            return "<?php echo number_format($money, 0, '', '.'); ?>";
        });
    }
}
