@extends('layouts.app')

@section('content')

    <div class="container">

        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    Course Details
                </h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">
                    Course details and description.
                </p>
                <div class="float-right">
                    <a href="{{route('course.edit',$course->id)}}"
                       class="bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:ring-opacity-50 py-2 px-4 rounded text-white text-decoration-none">
                        Edit
                    </a>
                </div>
            </div>
            <div class="border-t border-gray-200">
                <dl>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Course name
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{$course->course_name}}
                        </dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Description
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{$course->description}}
                        </dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                          Price
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            &#36; {{$course->price}}
                        </dd>
                    </div>


                </dl>
                <div class="px-6 py-4 whitespace-nowrap flex ">
                    <a href="{{route('course.index')}}"
                       class="bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-opacity-50 py-2 px-4 rounded text-white text-decoration-none">
                        <i class="fas fa-backward"></i> Back
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
