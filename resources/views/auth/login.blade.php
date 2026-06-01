<x-layout body-wrapper="bg-surface text-on-surface min-h-screen flex flex-col font-body-lg" main-wrapper="flex-grow flex items-center justify-center px-margin-mobile py-lg">
    <x-slot:style>
        <style>
            .material-symbols-outlined {
                font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            }

            .brand-shadow {
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.04);
            }

            body {
                min-height: max(884px, 100dvh);
            }
        </style>
    </x-slot:style>

    <div class="w-full max-w-[400px] bg-surface-container-lowest rounded-xl brand-shadow p-md md:p-lg border border-tertiary/10">
        <!-- Welcoming Header -->
        <div class="text-center mb-lg">
            <h1 class="font-headline-lg-mobile md:font-headline-lg text-headline-lg-mobile md:text-headline-lg text-on-surface mb-xs">Welcome back</h1>
            <p class="font-body-sm text-body-sm text-on-surface-variant">Manage your focus and tasks with ease.</p>
        </div>
        <!-- Login Form -->
        <form class="space-y-md" action="{{ route('login') }}" method="POST">
            @csrf
            <div class="space-y-xs">
                <label class="font-label-caps text-label-caps text-on-surface-variant px-xs" for="email">Email Address</label>
                <input name="{{ config('fortify.username') }}" class="w-full h-12 px-md bg-surface-container rounded-lg border-none focus:ring-2 focus:ring-primary focus:bg-surface-container-lowest transition-all placeholder:text-outline text-body-lg font-body-lg" id="email" placeholder="name@company.com" type="email" />
            </div>
            <div class="space-y-xs">
                <div class="flex justify-between items-center px-xs">
                    <label class="font-label-caps text-label-caps text-on-surface-variant" for="password">Password</label>
                    <a class="font-label-caps text-label-caps text-primary hover:underline transition-all" href="#">Forgot Password?</a>
                </div>
                <div class="relative">
                    <input name="password" class="w-full h-12 px-md bg-surface-container rounded-lg border-none focus:ring-2 focus:ring-primary focus:bg-surface-container-lowest transition-all placeholder:text-outline text-body-lg font-body-lg" id="password" placeholder="••••••••" type="password" />
                    <button class="absolute right-md top-1/2 -translate-y-1/2 text-on-surface-variant hover:text-primary transition-colors" type="button">
                        <span class="material-symbols-outlined text-[20px]" data-icon="visibility">visibility</span>
                    </button>
                </div>
            </div>
            <button class="w-full h-12 bg-primary text-on-primary font-button-text text-button-text rounded-lg hover:opacity-90 active:scale-[0.98] transition-all brand-shadow mt-base" type="submit">
                Sign In
            </button>
        </form>
        <!-- Social Login Divider -->
        <div class="relative my-lg flex items-center justify-center">
            <div class="absolute inset-0 flex items-center">
                <span class="w-full border-t border-surface-variant"></span>
            </div>
            <span class="relative bg-surface-container-lowest px-md font-label-caps text-label-caps text-outline uppercase tracking-widest">Or sign in with</span>
        </div>
        <!-- Social Buttons -->
        <div class="grid grid-cols-2 gap-sm">
            <button class="flex items-center justify-center gap-base h-12 border border-outline-variant rounded-lg hover:bg-surface-container transition-colors active:scale-95 group">
                <img alt="Google" class="w-5 h-5" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBtEnP9itNWrEhz7xo302EIg2puA70UU5sBH3MBOHFrgDA7J5kA_uQ8uH68eHUWleRH-7QW5VH1tYwDLJv57xY8z0bR3npEgtToghQHVXJssH3hLFGHSUvOqs4OgD3GMPwrnyPXYvlUFj14bUFD68I03iRBvQ3xEx39Iu39ptqFbcZSb74YuOKzCfriMb4jx7OCu0fgX_dtFfTwNftaX_47C_q6ca9Z2nqkWYNTjlnT-jgzeoFMUIfWFGdbDlozoML46znqGaeV5x8E" />
                <span class="font-button-text text-button-text text-on-surface-variant group-hover:text-on-surface">Google</span>
            </button>
            <button class="flex items-center justify-center gap-base h-12 border border-outline-variant rounded-lg hover:bg-surface-container transition-colors active:scale-95 group">
                <span class="material-symbols-outlined text-[20px] text-on-surface" data-icon="apple" data-weight="fill" style="font-variation-settings: 'FILL' 1;">ios</span>
                <span class="font-button-text text-button-text text-on-surface-variant group-hover:text-on-surface">Apple</span>
            </button>
        </div>
        <!-- Footer Links -->
        <div class="mt-xl text-center">
            <p class="font-body-sm text-body-sm text-on-surface-variant">
                Don't have an account?
                <a class="text-primary font-semibold hover:underline ml-xs transition-all" href="#">Sign Up</a>
            </p>
        </div>
    </div>

    <!-- Visual Background Atmosphere (Non-intrusive) -->
    <div class="fixed top-0 right-0 -z-10 w-1/3 h-1/2 bg-gradient-to-bl from-primary-container/10 to-transparent blur-3xl opacity-50 pointer-events-none"></div>
    <div class="fixed bottom-0 left-0 -z-10 w-1/3 h-1/2 bg-gradient-to-tr from-secondary-container/10 to-transparent blur-3xl opacity-50 pointer-events-none"></div>
    <x-slot:script>

        <script>
            // Micro-interactions for form focus states and subtle layout shifts
            const inputs = document.querySelectorAll('input');
            inputs.forEach(input => {
                input.addEventListener('focus', () => {
                    input.parentElement.closest('div').classList.add('scale-[1.01]');
                });
                input.addEventListener('blur', () => {
                    input.parentElement.closest('div').classList.remove('scale-[1.01]');
                });
            });

            // Toggle password visibility
            const togglePass = document.querySelector('button[type="button"]');
            const passInput = document.getElementById('password');
            togglePass.addEventListener('click', () => {
                const isText = passInput.type === 'text';
                passInput.type = isText ? 'password' : 'text';
                togglePass.children[0].textContent = isText ? 'visibility' : 'visibility_off';
                togglePass.children[0].setAttribute('data-icon', isText ? 'visibility' : 'visibility_off');
            });
        </script>
    </x-slot:script>
</x-layout>