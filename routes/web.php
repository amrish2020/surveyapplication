<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*
 * Surveys non user routes
 */
Route::get('/survey/{id}', [App\Http\Controllers\SurveyController::class, 'takeSurvey'])->name('survey.take')->middleware('auth');
Route::get('survey', [App\Http\Controllers\SurveyController::class, 'getIndex'])->name('survey.index')->middleware('auth');
Route::post('survey/create', [App\Http\Controllers\SurveyController::class, 'surveyCreate'])->name('survey.create')->middleware('auth');
Route::get('survey/results/{id}', [App\Http\Controllers\SurveyController::class, 'surveyResults'])->name('survey.results')->middleware('auth');
/*
 * end surveys non admin routes
 */

/*
 * Group admin pages
 * */
Route::group(['prefix' => 'admin'], function() {

    /*
     *  admin questions routes
     */
    Route::get('questions/', [App\Http\Controllers\QuestionController::class, 'getAdminIndex'])->name('admin.questions.index')->middleware('auth');
    Route::get('questions/create', [App\Http\Controllers\QuestionController::class, 'getAdminCreate'])->name('admin.questions.create')->middleware('auth');
    Route::post('questions/create', [App\Http\Controllers\QuestionController::class, 'questionAdminCreate'])->name('admin.questions.create')->middleware('auth');
    Route::get('questions/edit/{id}', [App\Http\Controllers\QuestionController::class, 'getAdminEdit'])->name('admin.questions.edit')->middleware('auth');
    Route::post('questions/edit', [App\Http\Controllers\QuestionController::class, 'questionAdminUpdate'])->name('admin.questions.update')->middleware('auth');
    Route::get('questions/delete/{id}', [App\Http\Controllers\QuestionController::class, 'questionAdminDelete'])->name('admin.questions.delete')->middleware('auth');
    /*
     * end admin questions routes
     */

    /*
     * Admin Answers Routes
     */
    Route::get('answers/', [App\Http\Controllers\AnswerController::class, 'getAdminIndex'])->name('admin.answers.index')->middleware('auth');
    Route::get('answers/create', [App\Http\Controllers\AnswerController::class, 'getAdminCreate'])->name('admin.answers.create')->middleware('auth');
    Route::post('answers/create', [App\Http\Controllers\AnswerController::class, 'answerAdminCreate'])->name('admin.answers.create')->middleware('auth');
    Route::get('answers/edit/{id}', [App\Http\Controllers\AnswerController::class, 'getAdminEdit'])->name('admin.answers.edit')->middleware('auth');
    Route::post('answers/edit', [App\Http\Controllers\AnswerController::class, 'answerAdminUpdate'])->name('admin.answers.update')->middleware('auth');
    Route::get('answers/delete/{id}', [App\Http\Controllers\AnswerController::class, 'answerAdminDelete'])->name('admin.answers.delete')->middleware('auth');
    /*
     * end admin answers routes
     */

    /*
     * admin surveys routes
     */
    Route::get('surveys/', [App\Http\Controllers\SurveyController::class, 'getAdminIndex'])->name('admin.surveys.index')->middleware('auth');
    Route::get('surveys/create', [App\Http\Controllers\SurveyController::class, 'getAdminCreate'])->name('admin.surveys.create')->middleware('auth');
    Route::post('surveys/create', [App\Http\Controllers\SurveyController::class, 'surveyAdminCreate'])->name('admin.surveys.create')->middleware('auth');
    Route::get('surveys/edit/{id}', [App\Http\Controllers\SurveyController::class, 'getAdminEdit'])->name('admin.surveys.edit')->middleware('auth');
    Route::post('surveys/edit', [App\Http\Controllers\SurveyController::class, 'surveyAdminUpdate'])->name('admin.surveys.update')->middleware('auth');
    Route::get('surveys/delete/{id}', [App\Http\Controllers\SurveyController::class, 'surveyAdminDelete'])->name('admin.surveys.delete')->middleware('auth');
    Route::get('surveys/resport/{id}', [App\Http\Controllers\SurveyController::class, 'getAdminSurveyReport'])->name('admin.surveys.report')->middleware('auth');
    /*
     * end admin surveys routes
     */
});

/*
 * End admin page grouping
 * */

Auth::routes();
