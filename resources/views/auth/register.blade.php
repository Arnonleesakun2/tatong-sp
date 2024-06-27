{{-- หน้าRegistermember --}}
@extends('admin/layout/adminlayout')

@section('title')
    Register
@endsection
@section('content')
@if (Session::has('message'))
<script>
    toastr.options = {
        "progressBar": true,
        "closeButton": true,
    }
    toastr.success("{{ Session::get('message') }}", 'Success!', {
        timeOut: 3000
    });
</script>
@endif
<div class="w-full  mx-auto pb-8">
    <div class="con ">
        <p>Register</p>
    </div>
    <div class="con-show">
        <div class="w-full">
            <div class="px-16 py-6  rounded-2xl">
                <div class="max-w-96 mx-auto">
                    <form action="{{ Route('register') }}" method="POST">
                        @csrf
                        <div class="w-3/4 mx-auto m-1 mb-4">
                             <!--เลือกให้คัย-->
                            <select  name="employee_id" class="select select-bordered select-m w-full max-w-xs rounded-2xl mb-4">
                                <option disabled selected>เลือกพนักงาน</option>
                                @foreach ($employees as $employee)
                                    <option value="{{$employee->id}}">{{$employee->name}}</option>
                                @endforeach
                              </select>
                              @error('employee_id')
                                <div class="invalid-feedback d-block text-red-700">{{ $errors->first('employee_id') }}</div>
                                @enderror
                            <!-- Name -->
                            <label class="input input-bordered flex items-center gap-2 h-11 rounded-2xl mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                                    class="w-4 h-4 opacity-70">
                                    <path
                                        d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM12.735 14c.618 0 1.093-.561.872-1.139a6.002 6.002 0 0 0-11.215 0c-.22.578.254 1.139.872 1.139h9.47Z" />
                                </svg>
                                <input type="text" class="grow" placeholder="Yourname" name="name" />
                            </label>
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            <!-- Email Address -->
                            <label class="input input-bordered flex items-center gap-2 h-11 rounded-2xl">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                                    class="w-4 h-4 opacity-70">
                                    <path
                                        d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM12.735 14c.618 0 1.093-.561.872-1.139a6.002 6.002 0 0 0-11.215 0c-.22.578.254 1.139.872 1.139h9.47Z" />
                                </svg>
                                <input type="email" class="grow" placeholder="Email" name="email" />
                            </label>
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <div class="w-3/4 mx-auto m-1 mb-4">
                            <!-- Password -->
                            <label class="input input-bordered flex items-center gap-2 h-11 rounded-2xl">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                                    class="w-4 h-4 opacity-70">
                                    <path
                                        d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM12.735 14c.618 0 1.093-.561.872-1.139a6.002 6.002 0 0 0-11.215 0c-.22.578.254 1.139.872 1.139h9.47Z" />
                                </svg>
                                <input type="password" class="grow" placeholder="Password" name="password"
                                    required autocomplete="new-password" />
                            </label>
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                        <div class="w-3/4 mx-auto m-1">
                            <!-- Confirm Password -->
                            <label class="input input-bordered flex items-center gap-2 h-11 rounded-2xl">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                                    class="w-4 h-4 opacity-70">
                                    <path
                                        d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM12.735 14c.618 0 1.093-.561.872-1.139a6.002 6.002 0 0 0-11.215 0c-.22.578.254 1.139.872 1.139h9.47Z" />
                                </svg>
                                <input type="password" class="grow" placeholder="Confirm password"
                                    name="password_confirmation" />
                            </label>
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>

                        <div class="w-3/4 mx-auto m-1">
                            <div class="my-6 ">
                                <button class="btn  btnmodify color w-full" type="submit">Sigh up</button>
                            </div>
                        </div>
                        <div class="w-3/4 mx-auto ">
                            <div class="btn-goadmin ml-10  ">
                                <a href="{{ route('adminlogin') }}">ไปหน้าadmin<span><i class="fa-solid fa-arrow-right fa-sm"></i></span></a>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

