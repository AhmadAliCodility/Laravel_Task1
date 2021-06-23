@extends('layouts.app')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div>
                <img class="mx-auto h-12 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg"
                     alt="Workflow">
                <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                    Sign in to your {{ isset($url) ? ucwords($url) : "User"}} account
                </h2>
                <p class="mt-2 text-center text-sm text-gray-600">
                    Or
                    <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">
                        start your 14-day free trial
                    </a>
                </p>
            </div>

            @isset($url)
                <form class="mt-8 space-y-6" action="{{ url("login/$url") }}" method="POST">
                    @else
                        <form class="mt-8 space-y-6" action="{{ route('login') }}" method="POST">
                                @endisset
                                @csrf
                                <input type="hidden" name="remember" value="true">
                                <div class="rounded-md shadow-sm -space-y-px">
                                    <div>
                                        <label for="email-address" class="sr-only">{{ __('E-Mail Address') }}</label>
                                        <input id="email-address" name="email" type="email" autocomplete="email" required
                                               class="appearance-none  rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm @error('email') is-invalid
                                   @enderror"
                                               placeholder="Email address" value="{{ old('email') }}" autofocus>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>


                                    <div>
                                        <label for="password" class="sr-only">{{ __('Password') }}</label>
                                        <input id="password" name="password" type="password" autocomplete="current-password"
                                               required
                                               class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm @error('password') is-invalid @enderror"
                                               placeholder="Password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <input id="remember_me" name="remember_me" type="checkbox"
                                               class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded" {{ old('remember') ? 'checked' : '' }}>
                                        <label for="remember_me" class="ml-2 block text-sm text-gray-900">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>

                                    <div class="text-sm">
                                        @if (Route::has('password.request'))
                                            <a href="{{ route('password.request') }}"
                                               class="font-medium text-indigo-600 hover:text-indigo-500">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                    </div>
                                </div>

                                <div>
                                    <button type="submit"
                                            class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                  <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                                                    <!-- Heroicon name: solid/lock-closed -->
                                                    <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400"
                                                         xmlns="http://www.w3.org/2000/svg"
                                                         viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                      <path fill-rule="evenodd"
                                                            d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                                            clip-rule="evenodd"/>
                                                    </svg>
                                                  </span>
                                        Sign in
                                    </button>
                                </div>
                        </form>

        </div>
    </div>
    {{--
                               <div class="form-group row">
                                   <div class="col-md-6 offset-md-4">
                                       <div class="form-check">
                                           <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                           <label class="form-check-label" for="remember">
                                               {{ __('Remember Me') }}
                                           </label>
                                       </div>
                                   </div>
                               </div>

                               <div class="form-group row mb-0">
                                   <div class="col-md-8 offset-md-4">
                                       <button type="submit" class="btn btn-primary">
                                           {{ __('Login') }}
                                       </button>

                                       @if (Route::has('password.request'))
                                           <a class="btn btn-link" href="{{ route('password.request') }}">
                                               {{ __('Forgot Your Password?') }}
                                           </a>
                                       @endif
                                   </div>
                               </div>
                           </form>
                       </div>
                   </div>
               </div>
           </div>
       </div>--}}
@endsection
