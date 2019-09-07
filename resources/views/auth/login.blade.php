@extends('layouts.app')

@section('content')
<div class="mx-auto h-full flex justify-center items-center bg-gray-300">
    <div class="w-96 bg-blue-900 rounded-lg shadow-xl p-6">
            <h1 class="text-white text-3xl pt-8"> Welcome Back</h1>
            <h2 class="text-blue-300"> Enter Your Data</h2>

            <form method="POST" action="{{ route('login') }}" class="pt-8">
                    @csrf

                    <div class="relative">
                        <label for="email" class=" uppercase text-blue-500 text-xs font-bold absolute pl-3 pt-2 ">E-mail</label>

                        
                            <input id="email" type="email" class="pt-8 w-full rounded p-3 bg-blue-800 outline-none focus:bg-blue-700" name="email" value="{{ old('email') }}"   autocomplete="email" autofocus>

                            @error('email')
                                <span class="pt-1 text-red-800" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                         
                    </div>

                    <div class="relative pt-3">
                        <label for="password"  class=" uppercase text-blue-500 text-xs font-bold absolute pl-3 pt-2 "> Password</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="pt-8 w-full rounded p-3 bg-blue-800 outline-none focus:bg-blue-700"  name="password"   autocomplete="current-password">

                            @error('password')
                                <span class="pt-1 text-red-800" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                            <div>
                                <input class="text-white" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="text-white form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
 
                     <div class="pt-8"> 
                        <button type="submit"  class="w-full bg-gray-400 py-2 px-3 text-left uppercase rounded text-blue-800 font-bold">
                            login
                        </button>
                    </div>
                    <div class="flex justify-between p-8 text-white text-sm font-bold">
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                <a class="btn btn-link" href="{{ route('register') }}">
                                        register
                                    </a>
                    </div>
                    </div>
                </form>
    </div>
</div>
@endsection
