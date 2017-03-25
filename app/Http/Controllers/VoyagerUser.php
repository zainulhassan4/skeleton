<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use TCG\Voyager\Models\DataType;


class VoyagerUser
{
    /**
     * Routes for user end functionalities
     */
    public static function routes()
    {
        Route::group(['as' => 'voyager-user.'], function () {
            event('voyager.routing', app('router'));

            $namespacePrefix = '\\'.config('voyager.controllers.user-namespace').'\\';

            try {
                foreach (DataType::all() as $dataType) {
                    Route::resource(
                        $dataType->slug, 
                        $namespacePrefix . 'VoyagerUserBreadController'
                    );
                }
            } catch (\InvalidArgumentException $e) {
                throw new \InvalidArgumentException("Custom routes hasn't been configured because: ".$e->getMessage(), 1);
            } catch (\Exception $e) {
                // do nothing, might just be because table not yet migrated.
            }
        });
    }
}
