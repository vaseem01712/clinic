<x-layouts.app>
<section class="min-h-[calc(100vh-78px)] bg-slate-50 px-5 py-16"><div class="mx-auto max-w-lg rounded-[32px] border border-slate-200 bg-white p-8 shadow-sm sm:p-10">
<span class="section-label">{{strtoupper($portal)}} ACCESS</span><h1 class="mt-5 text-3xl font-extrabold text-navy-900">Forgot your password?</h1><p class="mt-2 text-sm text-slate-500">Enter your email and we'll send a short-lived secure reset link.</p>
@if(session('success'))<div class="mt-5 rounded-2xl bg-emerald-50 p-3 text-sm font-semibold text-emerald-700">{{session('success')}}</div>@endif
@if($errors->any())<div class="mt-5 rounded-2xl bg-red-50 p-3 text-sm font-semibold text-red-700">{{$errors->first()}}</div>@endif
<form method="POST" action="{{route('password.forgot.store',$portal)}}" class="mt-7 space-y-5">@csrf<div><label class="label">Email</label><input name="email" type="email" required class="input-field"></div><button class="btn-primary w-full">Send secure reset link</button></form>
</div></section>
</x-layouts.app>
