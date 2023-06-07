<?php

use Illuminate\Support\Facades\Route;
use OpenAI\Laravel\Facades\OpenAI;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/openai/{q}', function ($question) {

$result = OpenAI::completions()->create([
    'model' => 'text-davinci-003',
    'prompt' => $question,
]);

echo $result['choices'][0]['text'];
});

Route::get('/openimg', function () {

    $result = OpenAI::images()->create([
        'prompt' => 'a man in dubai',
         'n' => 1,
         'size' => "512x512"
    ]);
     
    return response(['url'=>$result->data[0]->url]);
    // echo $result['choices'][0]['text'];
    });
