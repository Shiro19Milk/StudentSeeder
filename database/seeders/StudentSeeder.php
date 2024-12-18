<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\Course; // Add this import
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 20 students
        $students = Student::factory()->count(20)->create();

        // Fetch all courses
        $courses = Course::all();

        // Attach random courses to each student
        foreach ($students as $student) {
            $student->courses()->attach(
                $courses->random(rand(1, 3))->pluck('id')->toArray()
            );
        }
    }
}