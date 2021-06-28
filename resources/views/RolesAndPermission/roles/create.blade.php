@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900"><a class="text-decoration-none"
                                                                               href="{{route("roles.index")}}">Role</a>
                    </h3>
                    <p class="mt-1 text-sm text-gray-600">
                        Here you Create Role
                    </p>
                </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form action="{{route('roles.store')}}" method="POST">
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-6">
                                    <label for="role" class="block text-sm font-medium text-gray-700">Role Name</label>
                                    <input type="text" name="name" value="{{old('name')}}" id="name"
                                           autocomplete="given-name" placeholder="Role Name"
                                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('course_name') is-invalid
                                       @enderror">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-6">
                                    <label for="role" class="block text-sm font-medium text-gray-700">Assign Role</label>
                                    <select name="role" id="" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <option disabled selected>Select...</option>
                                        @foreach($admin as $row)
                                            <option value="{{$row->id}}">{{$row->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-span-6 sm:col-span-6">
                                    <label for="permission" class="block text-sm font-medium text-gray-700">Permissions</label>
                                    @foreach($permission as $value)
                                        <div class="flex items-start">
                                            <div class="flex items-center h-5">
                                                <input id="comments" name="permission[]" value="{{$value->id}}" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                            </div>
                                            <div class="ml-3 text-sm">
                                                <label for="comments" class="font-medium text-gray-700">{{ $value->name }}</label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                        </div>
                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button type="submit"
                                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Save
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
@endsection
