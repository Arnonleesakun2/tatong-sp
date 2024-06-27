@extends('home/layout/layout')
@section('title')
    Forget Password
@endsection
@section('content')
<div class="w-full  mx-auto ">
    <div class="con-show">
        <div class=" w-3/6 mx-auto">
            <div class="mb-4 text-sm text-gray-600">
                {{ __('ลืมรหัสผ่านหรือไม่?  เพียงแจ้งให้เราทราบที่อยู่อีเมลของคุณ แล้วเราจะส่งลิงก์รีเซ็ตรหัสผ่านให้คุณทางอีเมล ซึ่งคุณสามารถเลือกรหัสผ่านใหม่ได้.') }}
            </div>
            <x-auth-session-status class="mb-4" :status="session('status')" />
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
        
                <!-- Email Address -->
                <div>
                    <x-input-label class="mb-4" for="email" :value="__('Email')" />
                    <input  name="email" type="email" id="email" type="text" placeholder="email" class="input input-bordered input-primary w-full max-w-xs" :value="old('email')" required autofocus/>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
        
                <div class="flex items-center justify-end mt-4">
                    <x-primary-button>
                        {{ __('Email Password Reset Link') }}
                    </x-primary-button>
                        <button type="button" class="btn btn-error ml-4 btnmodify"><a href="/">ย้อนกลับ</a></button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
