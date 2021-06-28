@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900"><a class="text-decoration-none" href="{{route("admin.index")}}">Admin</a></h3>
                    <p class="mt-1 text-sm text-gray-600">
                        Here you Create Admin and User
                    </p>
                </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form action="{{route('admin.store')}}" method="POST">
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-6">
                                    <label for="course_name" class="block text-sm font-medium text-gray-700">Name</label>
                                    <input type="text" name="name" value="{{old('name')}}" id="course_name" autocomplete="given-name" placeholder="Admin Name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('name') is-invalid
                               @enderror">
                                    @error('course_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-6">
                                    <label for="last_name" class="block text-sm font-medium text-gray-700">Description</label>
                                    <textarea name="description" id="" cols="30" rows="10" placeholder="Description" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('description') is-invalid
                               @enderror">{{old('description')}}</textarea>
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-6">
                                    <label for="email_address" class="block text-sm font-medium text-gray-700">Price</label>
                                    <input type="number" step="0.01" name="price" value="{{old('price')}}" id="price" autocomplete="price" placeholder="Price" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('price') is-invalid
                               @enderror">
                                    @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>



                            </div>
                        </div>
                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Save
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
@endsection
