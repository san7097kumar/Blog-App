<?php

namespace App\Http\Traits;
use App\Models\Student;

trait StudentTrait {

    public function getData() {
        // Fetch all the students from the 'student' table.
        $student = Student::all();
        return view('Trait-test')->with(compact('student'));
    }

    public function Get_test(){
        return "ok working";
    }

}



?>

