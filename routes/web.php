<?php
/*
 * @Author: your name
 * @Date: 2021-04-10 22:55:10
 * @LastEditTime: 2021-05-22 20:03:19
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: \testd:\phpstudy_pro\WWW\equipment\routes\web.php
 */

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Events\TestEvent;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('test');
});

Route::get('/state', function () {
    return view('state');
});

Route::get('/show', function () {
    return view('show');
});


Route::get('/event', function () {
    event(new TestEvent('hello world'));
    dd('done');
});
