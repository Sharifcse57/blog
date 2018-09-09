<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ValidationServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
   
    public function boot()
    {
        
         \Validator::extend( 'composite_unique', function ($attribute, $value, $parameters, $validator){
            // Custom validation logic

            // remove first parameter and assume it is the table name
            $table = array_shift( $parameters ); 

          
            // start building the conditions
            $fields = [ $attribute => $value ]; // current field, company_code in your case

            // iterates over the other parameters and build the conditions for all the required fields
            while ( $field = array_shift( $parameters ) ) {
                if($field=='lang_id'){
                    $fields[ $field ] ='1';
                }else{
                   $fields[ $field ] = \Request::get( $field ); 
                }
                
            }

                      
            // query the table with all the conditions
            if (array_key_exists("slug",$fields)){ 
                if($fields['slug'] == null){
                    $result=1;                                      
                }else{                    
                    $newfields=$fields;
                    unset($newfields['slug']);      
                    $result = \DB::table( $table )->select( \DB::raw( 1 ) )->where($newfields)->where('slug','<>',$fields['slug'])->first();
                }               
            }else{
                $result = \DB::table( $table )->select( \DB::raw( 1 ) )->where($fields)->first(); 
            }           
            return empty( $result );
        },'This value :attribute already exists!');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
