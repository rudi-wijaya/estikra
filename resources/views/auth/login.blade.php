<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login - {{ config('app.name', 'Estikra') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Sora:wght@600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-100 text-slate-900 antialiased" style="font-family:'Plus Jakarta Sans', sans-serif;">
    <div class="relative min-h-screen overflow-hidden">
        <div class="absolute inset-0 pointer-events-none" aria-hidden="true">
            <div class="absolute -top-40 -left-40 h-96 w-96 rounded-full bg-cyan-300/40 blur-3xl"></div>
            <div class="absolute top-1/3 -right-40 h-[30rem] w-[30rem] rounded-full bg-blue-300/40 blur-3xl"></div>
            <div class="absolute -bottom-40 left-1/3 h-96 w-96 rounded-full bg-indigo-300/30 blur-3xl"></div>
        </div>

        <div class="relative z-10 mx-auto flex min-h-screen w-full max-w-6xl items-center justify-center px-5 py-8 sm:px-8 lg:px-10">
            <div class="w-full max-w-xl overflow-hidden rounded-3xl border border-white/70 bg-white/85 shadow-[0_25px_90px_rgba(15,23,42,0.14)] backdrop-blur-xl">
                <section class="p-6 sm:p-8 lg:p-10">
                    <div class="mx-auto w-full max-w-md">
                        <div class="mb-8">
                            <a href="{{ url('/') }}" class="mb-4 inline-flex items-center gap-2 rounded-full border border-slate-200 bg-white px-3 py-1.5 text-xs font-semibold tracking-wide text-slate-600 hover:bg-slate-50 transition-colors duration-200">
                                <span class="inline-block h-2 w-2 rounded-full bg-blue-500"></span>
                                Kembali ke Website
                            </a>
                            <p class="text-xs font-semibold uppercase tracking-[0.18em] text-blue-700">Masuk Sistem</p>
                            <h2 class="mt-2 text-3xl font-bold text-slate-900" style="font-family:'Sora', sans-serif;">Akses Dashboard Admin</h2>
                            <p class="mt-2 text-sm leading-relaxed text-slate-600">Gunakan akun resmi untuk mengakses panel pengelolaan konten sekolah secara aman dan terkontrol.</p>
                        </div>

                        @if (session('status'))
                            <div class="mb-5 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}" class="space-y-5">
                            @csrf

                            <div>
                                <label for="email" class="mb-2 block text-sm font-semibold text-slate-700">Email</label>
                                <input
                                    id="email"
                                    name="email"
                                    type="email"
                                    value="{{ old('email') }}"
                                    required
                                    autofocus
                                    autocomplete="username"
                                    class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-900 shadow-sm outline-none transition duration-200 placeholder:text-slate-400 focus:border-blue-500 focus:ring-4 focus:ring-blue-100"
                                    placeholder="Masukkan email"
                                >
                                @error('email')
                                    <p class="mt-2 text-sm font-medium text-rose-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="password" class="mb-2 block text-sm font-semibold text-slate-700">Password</label>
                                <input
                                    id="password"
                                    name="password"
                                    type="password"
                                    required
                                    autocomplete="current-password"
                                    class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-900 shadow-sm outline-none transition duration-200 placeholder:text-slate-400 focus:border-blue-500 focus:ring-4 focus:ring-blue-100"
                                    placeholder="Masukkan password"
                                >
                                @error('password')
                                    <p class="mt-2 text-sm font-medium text-rose-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex items-center justify-between gap-4">
                                <label for="remember" class="inline-flex items-center gap-2 text-sm text-slate-600">
                                    <input id="remember" name="remember" type="checkbox" class="h-4 w-4 rounded border-slate-300 text-blue-600 focus:ring-blue-500" {{ old('remember') ? 'checked' : '' }}>
                                    <span>Ingat saya</span>
                                </label>

                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="text-sm font-semibold text-blue-700 hover:text-blue-800">
                                        Lupa password?
                                    </a>
                                @endif
                            </div>

                            <button type="submit" class="w-full rounded-xl bg-gradient-to-r from-blue-600 via-blue-500 to-cyan-500 px-4 py-3 text-sm font-semibold text-white shadow-lg shadow-blue-500/30 transition duration-200 hover:translate-y-[-1px] hover:shadow-xl hover:shadow-blue-500/35 focus:outline-none focus:ring-4 focus:ring-blue-200">
                                Masuk ke Dashboard
                            </button>
                        </form>

                        <div class="mt-8 border-t border-slate-200 pt-5 text-center text-xs leading-relaxed text-slate-500">
                            Halaman ini dilindungi autentikasi dan audit keamanan internal.
                            <br>
                            Jika mengalami kendala akses, hubungi super admin sekolah.
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</body>
</html>
