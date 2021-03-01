<?php

use Illuminate\Support\Facades\Route;
use App\Models\Student;
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

Route::get('/insert1', function(){
	DB::insert('insert into students(name,date_of_birth,GPA,advisor) values("Yerbol","2001-07-15",3.56,"Ualikhan Sadyk")');
});

Route::get('/insert2', function(){
	$students = new Student;
	$students->name = "Arman";
	$students->date_of_birth = "2001-06-19";
	$students->GPA = 2.98;
	$students->advisor = "Ualikhan";
	$students->save();
});

Route::get('/read1',function(){
$result = DB::select('select * from students where id=?',[1]);
foreach($result as $students){
	echo "Name is: ".$students->name;
	echo "<br>";
	echo "Date of birth is: ".$students->date_of_birth;
	echo "<br>";
	echo "GPA is: ".$students->GPA;
	echo "<br>";
	echo "Advisor is: ".$students->advisor;
}
});

Route::get('/read2',function(){
	$students = Student::all();
	foreach($students as $students){
		echo "Name is: ".$students->name;
		echo "<br>";
		echo "Date of birth is: ".$students->date_of_birth;
		echo "<br>";
		echo "GPA is: ".$students->GPA;
		echo "<br>";
		echo "Advisor is: ".$students->advisor;
		echo "<br>";
	}
});

Route::get('/update1',function(){
	$updated = DB::update('update students set name="Aibek" where id=?',[1]);
	return $updated;
});

Route::get('/update2',function(){
	$students=Student::find(5);
	$students->name='Aiman';
	$students->GPA = 3.7;
	$students->save();
});

Route::get('/delete1',function(){
	$deleted = DB::delete('delete from students where id=?',[1]);
	return $deleted;
});
Route::get('/delete2',function(){
	$students=Student::find(5);
	$students->delete();
});





