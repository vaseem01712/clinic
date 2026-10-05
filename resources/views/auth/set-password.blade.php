<x-layouts.app>
<section class="min-h-[calc(100vh-78px)] bg-slate-50 px-5 py-16"><div class="mx-auto max-w-lg rounded-[32px] border border-slate-200 bg-white p-8 shadow-[0_25px_80px_-45px_rgba(7,28,64,.35)] sm:p-10">
<span class="section-label">SECURE ACCESS</span><h1 class="mt-5 text-3xl font-extrabold text-navy-900">Set your {{ $portal }} password</h1><p class="mt-2 text-sm text-slate-500">Choose a strong password. This secure setup link expires automatically.</p>
@if($errors->any())<div class="mt-5 rounded-2xl bg-red-50 p-3 text-sm font-semibold text-red-700">{{$errors->first()}}</div>@endif
<form method="POST" action="{{route('password.setup.store')}}" class="mt-7 space-y-5">@csrf<input type="hidden" name="email" value="{{$email}}"><input type="hidden" name="token" value="{{$token}}">
<div><label class="label">New password</label><input name="password" type="password" required minlength="10" class="input-field"></div><div><label class="label">Confirm password</label><input name="password_confirmation" type="password" required minlength="10" class="input-field"></div><button class="btn-primary w-full">Set Password</button></form>
</div></section>
</x-layouts.app>
