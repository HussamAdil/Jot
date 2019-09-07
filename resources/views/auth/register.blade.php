@extends('layouts.app')

@section('content')
<div class="mx-auto h-full flex justify-center items-center bg-gray-300"> 
    <div class="row justify-content-center">
        <div class="w-96 bg-blue-900 rounded-lg shadow-xl p-6">
            
                 
                <h1 class="text-white text-3xl pt-8"> Register </h1>
                 <h2 class="text-blue-300"> Create Your Account</h2>
                 <form  class="pt-8" method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="relative">
                        <label for="name"  class=" uppercase text-blue-500 text-xs font-bold absolute pl-3 pt-2 "> Name</label>

                       
                            <input id="name" type="text"  class="pt-8 w-full rounded p-3 bg-blue-800 outline-none focus:bg-blue-700"  name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="pt-1 text-red-800" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                         
                    </div>

                    <div class="relative pt-3 ">
                        <label for="email"  class=" uppercase text-blue-500 text-xs font-bold absolute pl-3 pt-2 "> E-Mail Address</label>

                        
                            <input id="email" type="email" class="pt-8 w-full rounded p-3 bg-blue-800 outline-none focus:bg-blue-700"   name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="pt-1 text-red-800" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        
                    </div>

                    <div class="relative pt-3">
                        <label for="password"  class=" uppercase text-blue-500 text-xs font-bold absolute pl-3 pt-2 "> Password  </label>

                        <div class="col-md-6">
                            <input id="password" type="password"  class="pt-8 w-full rounded p-3 bg-blue-800 outline-none focus:bg-blue-700"   name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="pt-1 text-red-800" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="relative pt-3">
                        <label for="password-confirm" class=" uppercase text-blue-500 text-xs font-bold absolute pl-3 pt-2 ">{{ __('Confirm Password') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="pt-8 w-full rounded p-3 bg-blue-800 outline-none focus:bg-blue-700"   name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>
 >
                    <div class="pt-8"> 
                        <button type="submit"  class="w-full bg-gray-400 py-2 px-3 text-left uppercase rounded text-blue-800 font-bold">
                            Register
                        </button>
                    </div>
                </form>
                 
        </div>
    </div>
</div>
@endsection
