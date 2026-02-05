<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login | Magpie IT</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Custom Tailwind Config -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#6c63ff',
                    }
                }
            }
        }
    </script>
</head>

<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-[#1b1a4b] via-[#0b0b2e] to-[#050514]">

    <!-- Login Card -->
    <div class="w-full max-w-md bg-white/5 backdrop-blur-xl border border-white/10 rounded-2xl p-8 shadow-2xl">

        <!-- Logo / Title -->
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-white">Magpie IT</h1>
            <p class="text-gray-400 mt-2">Welcome back! Please login</p>
        </div>

        <!-- Login Form -->
        <form class="space-y-6" action="{{ route('login') }}" method="POST">
            @csrf
            <!-- Email -->
            <div>
                <label class="block text-sm text-gray-300 mb-2">Email Address</label>
                <input type="email" name="email" placeholder="example@email.com"
                    class="w-full px-4 py-3 rounded-lg bg-white/10 border border-white/20 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
            </div>

            <!-- Password -->
            <div>
                <label class="block text-sm text-gray-300 mb-2">Password</label>

                <div class="relative">
                    <input id="password" type="password" name="password" placeholder="••••••••"
                        class="w-full px-4 py-3 pr-12 rounded-lg bg-white/10 border border-white/20 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">

                    <!-- Eye Icon -->
                    <button type="button" onclick="togglePassword()"
                        class="absolute inset-y-0 right-3 flex items-center text-gray-400 hover:text-white transition">
                        <svg id="eye-open" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hidden" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>

                        <svg id="eye-closed" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.956 9.956 0 012.442-4.362M6.223 6.223A9.955 9.955 0 0112 5c4.478 0 8.268 2.943 9.542 7a9.97 9.97 0 01-4.293 5.065M15 12a3 3 0 00-3-3m0 0a3 3 0 00-3 3m3-3l6 6" />
                        </svg>
                    </button>
                </div>
            </div>


            <!-- Remember & Forgot -->
            <div class="flex items-center justify-between text-sm">
                <label class="flex items-center gap-2 text-gray-300">
                    <input type="checkbox" class="accent-primary">
                    Remember me
                </label>
                <a href="#" class="text-primary hover:underline">Forgot password?</a>
            </div>

            <!-- Login Button -->
            <button type="submit"
                class="w-full py-3 rounded-lg bg-gradient-to-r from-primary to-indigo-500 text-white font-semibold hover:opacity-90 transition">
                Login
            </button>

        </form>

        <!-- Footer -->
        <p class="text-center text-gray-400 text-sm mt-6">
            Don’t have an account?
            <a href="#" class="text-primary hover:underline">Sign Up</a>
        </p>

    </div>

</body>

</html>
<script>
    function togglePassword() {
        const password = document.getElementById('password');
        const eyeOpen = document.getElementById('eye-open');
        const eyeClosed = document.getElementById('eye-closed');

        if (password.type === 'password') {
            password.type = 'text';
            eyeOpen.classList.remove('hidden');
            eyeClosed.classList.add('hidden');
        } else {
            password.type = 'password';
            eyeOpen.classList.add('hidden');
            eyeClosed.classList.remove('hidden');
        }
    }
</script>

