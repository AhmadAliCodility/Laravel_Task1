<?php

namespace Database\Seeders;

use App\Models\Courses;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Courses::create(['course_name'=>'Vue - The Complete Guide (w/ Router, Vuex, Composition API) ','description'=>"Vue.js is an awesome JavaScript Framework for building Frontend Applications! VueJS mixes the Best of Angular + React! ",'price'=>70.80]);
        Courses::create(['course_name'=>'React - The Complete Guide (incl Hooks, React Router, Redux) ','description'=>"Dive in and learn React.js from scratch! Learn Reactjs, Hooks, Redux, React Routing, Animations, Next.js and way more!  ",'price'=>89.99]);
        Courses::create(['course_name'=>'Angular - The Complete Guide (2021 Edition) ','description'=>'Master Angular 12 (formerly "Angular 2") and build awesome, reactive web apps with the successor of Angular.js ','price'=>11.99]);
        Courses::create(['course_name'=>'Facebook Clone with Laravel, TDD, Vue & Tailwind CSS ','description'=>" Learn to code a social network platform powered by a Laravel API & built using a Vue Single Page Application ",'price'=>20.250]);
        Courses::create(['course_name'=>'Learn Python Programming Masterclass ','description'=>" This Python For Beginners Course Teaches You The Python Language Fast. Includes Python Online Training With Python 3  ",'price'=>50.99]);
    }
}
