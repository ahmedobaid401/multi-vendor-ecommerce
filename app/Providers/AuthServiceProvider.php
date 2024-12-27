<?php

namespace App\Providers;

use Log;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    public function register(){
        parent::register();
        $this->app->bind("abilities",function(){
           return include base_path("data/abilities.php");
        });

    }

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        
        $abilities= $this->app->make("abilities");
        
       
        foreach( $abilities as $ability_code=>$ability_value){
            
          Gate::define($ability_code,function ($user) use($ability_code) {
            
               
                return $user->hasAbility($ability_code);
           
             });
        }
       

        
         
    }
}
