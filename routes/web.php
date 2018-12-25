<?php

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

use Illuminate\Http\Request;

Route::get('/', function () {
    $notes = \App\Note::orderBy('created_at', 'asc')->get();
    return view('notes', [
        'notes' =>$notes
    ]);
});

Route::post('/note', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255'
    ]);

    if ($validator->fails()) {
        return redirect( '/')
            ->withInput()
            ->withErrors($validator);
    }

    $note = new \App\Note;
    $note->name = $request->name;
    $note->save();

    return redirect('/');

});

Route::delete('/note/{note}', function (\App\Note $note) {
    $note->delete();

    return redirect('/');
});




