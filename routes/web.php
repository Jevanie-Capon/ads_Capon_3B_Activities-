<?php
use App\Models\Students;
use Illuminate\Support\Facades\Route;

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

Route:: get('/', function(){
    return view('welcome');
});

Route::get('/students/create', function () {
    $student = new Student();
    $student->first_name = 'John';
    $student->last_name = 'Doe';
    $student->email = 'johndoe@example.com';
    $student->save();
    return 'student Created';
});

Route::get('/students', function () {
    $students = Student::all();
    return $students;
});

Route::get('/students/update', function () {
    $student = Students::where('email','johndoe@example.com')->first();
    $student->email = 'johndoe@example.com';
    $student->save();
    return 'student Updated!';


});

Route::get('/students/delete', function () {
  $student =Student::where('email', 'johndoe@example.com')->first();
  $student->delete();
  return 'Student Deleted!';

});

Route::get('/courses/create', function(){
    $course = new Course();
    $course->course_name = "Introduction to databases";
    $course->save();
    return 'Course Created!';
});

Route::get('/courses/{id}/students', function($id){
    $course = Course::find($id);
    return $Course->students;
});
?>