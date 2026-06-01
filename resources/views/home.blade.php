<x-layout body-wrapper="bg-background text-on-background font-body-lg" main-wrapper="max-w-content mx-auto px-margin-mobile">
    <x-slot:style>
        <style>
            .material-symbols-outlined {
                font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
                vertical-align: middle;
            }

            .glass-effect {
                background: rgba(255, 255, 255, 0.7);
                backdrop-filter: blur(10px);
                -webkit-backdrop-filter: blur(10px);
            }

            body {
                min-height: max(884px, 100dvh);
            }
        </style>
    </x-slot:style>

    <!-- Hero Section -->
    <section class="pt-12 pb-16 text-center">
        <h1 class="font-headline-lg-mobile text-headline-lg-mobile text-on-background mb-4">Master Your Day,<br />Master Your Mind</h1>
        <p class="font-body-lg text-body-lg text-on-surface-variant mb-8 max-w-[600px] mx-auto">
            The minimalist productivity companion designed to clear mental clutter and boost deep focus through elegant organization.
        </p>
        <div class="flex flex-col gap-4 items-center">
            <button class="w-full sm:w-auto bg-primary text-on-primary py-4 px-8 rounded-xl font-button-text text-button-text shadow-lg active:scale-95 transition-all">
                Get Started for Free
            </button>
            <p class="font-label-caps text-label-caps text-outline">No credit card required • 14-day pro trial</p>
        </div>
    </section>
    <!-- App Preview (Bento-style Mockup) -->
    <section class="relative mb-20">
        <div class="bg-surface-container rounded-2xl p-4 md:p-8 shadow-[0_4px_12px_rgba(0,0,0,0.04)] border border-tertiary/10">
            <div class="aspect-video bg-white rounded-xl overflow-hidden shadow-2xl relative">
                <img alt="TaskMind App Interface" class="w-full h-full object-cover" data-alt="A clean, minimalist mobile application interface showing a sleek task management dashboard. The UI features a calming white and lavender color scheme with rounded cards, subtle shadows, and soft purple progress bars. The lighting is soft and natural, emphasizing a professional and organized productivity environment in a bright daylight setting." src="https://lh3.googleusercontent.com/aida-public/AB6AXuCWepawMe72H7iW-pBJ2f7oQI0q4jGIJexlEQVBQbLkl2syjl8UBfPJQKmxa-_r2qzdTbz6kRdGwajojZZ7xrtELXKNx7CNW969cdIcwMFeqKuQFUabE_U29T6ey2qKOLAP64XgAm_HIHyXctEvCIgQc_W0ajY_Vzzrnz_0zRQVqkVVl3icGjDyvw5SubnUNeoDM68QRNPaDVa-6uG9MQS0HtGeXRwgGfMZ_ptwq_vdb0K6U6IXxP6-pdjh8zm0KuZIPr_XywJ0GaiL" />
                <!-- Decorative Floating Elements -->
                <div class="absolute top-4 right-4 glass-effect p-3 rounded-lg shadow-lg border border-white/40 hidden md:block">
                    <div class="flex items-center gap-2">
                        <span class="material-symbols-outlined text-primary">check_circle</span>
                        <span class="text-label-caps font-label-caps">Task Completed</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Background Glow -->
        <div class="absolute -z-10 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-3/4 h-3/4 bg-primary/10 blur-[100px] rounded-full"></div>
    </section>
    <!-- Features Section -->
    <section class="mb-20 space-y-8">
        <div class="text-center mb-12">
            <h2 class="font-headline-md text-headline-md text-on-background">Designed for High Performance</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Feature 1 -->
            <div class="p-6 bg-surface-container-lowest rounded-xl border border-tertiary/5 shadow-[0_4px_12px_rgba(0,0,0,0.04)] hover:shadow-md transition-shadow">
                <div class="w-12 h-12 bg-primary-container rounded-lg flex items-center justify-center mb-4">
                    <span class="material-symbols-outlined text-on-primary-container">auto_awesome</span>
                </div>
                <h3 class="font-headline-md text-[18px] mb-2">Smart Organization</h3>
                <p class="font-body-sm text-body-sm text-on-surface-variant">Intelligent sorting that learns your priority patterns and keeps the right tasks in view.</p>
            </div>
            <!-- Feature 2 -->
            <div class="p-6 bg-surface-container-lowest rounded-xl border border-tertiary/5 shadow-[0_4px_12px_rgba(0,0,0,0.04)] hover:shadow-md transition-shadow">
                <div class="w-12 h-12 bg-primary-container rounded-lg flex items-center justify-center mb-4">
                    <span class="material-symbols-outlined text-on-primary-container">timer</span>
                </div>
                <h3 class="font-headline-md text-[18px] mb-2">Deep Focus Mode</h3>
                <p class="font-body-sm text-body-sm text-on-surface-variant">Built-in pomodoro and notification silencing to protect your most productive hours.</p>
            </div>
            <!-- Feature 3 -->
            <div class="p-6 bg-surface-container-lowest rounded-xl border border-tertiary/5 shadow-[0_4px_12px_rgba(0,0,0,0.04)] hover:shadow-md transition-shadow">
                <div class="w-12 h-12 bg-primary-container rounded-lg flex items-center justify-center mb-4">
                    <span class="material-symbols-outlined text-on-primary-container">folder_shared</span>
                </div>
                <h3 class="font-headline-md text-[18px] mb-2">Collaborative Folders</h3>
                <p class="font-body-sm text-body-sm text-on-surface-variant">Share projects effortlessly with your team while maintaining granular privacy controls.</p>
            </div>
        </div>
    </section>
    <!-- Testimonial Section -->
    <section class="mb-20">
        <div class="bg-primary/5 rounded-3xl p-8 md:p-12 text-center relative overflow-hidden">
            <div class="relative z-10">
                <span class="material-symbols-outlined text-primary text-4xl mb-4">format_quote</span>
                <blockquote class="font-headline-md text-headline-md text-on-surface italic mb-6">
                    "TaskMind isn't just a to-do list; it's the first time my workspace has actually felt as organized as I want my brain to be. The focus features are a game changer."
                </blockquote>
                <div class="flex items-center justify-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-surface-dim overflow-hidden">
                        <img alt="Sarah Jenkins" data-alt="A professional headshot of a woman in her early 30s with a warm, confident expression. She is in a modern office setting with soft sunlight coming through a window. The aesthetic is clean, high-end, and professional, utilizing a soft focus background to keep emphasis on the subject's face. The lighting is bright and airy." src="https://lh3.googleusercontent.com/aida-public/AB6AXuACHK65CSPvZdQoEcHfYqWtEWw6ZZibaCofsoEWROPxp3Ahhl_fwXVaxpbdHC44BAyLjuSaW1CoRVFaEffv7gf8hs5tRFCLBSiqQqDEKCScQr66Q-KC_vF8DpFwr7Ky5cY5OQ3g7JB-pS4G8jiCzFngYUg47OQRP0Gv0HEwAnBokuEOoA8TQr74TBSwgYB0-y6vHqPkplvEwdLxD_vRchkbHYybIvwPj8JZdYLjfbtvR2dOE4BY4vOQqDwu1zyw-eK4tJGeUUXRYOot" />
                    </div>
                    <div class="text-left">
                        <p class="font-button-text text-button-text">Sarah Jenkins</p>
                        <p class="font-label-caps text-label-caps text-outline">Product Lead, TechFlow</p>
                    </div>
                </div>
            </div>
            <!-- Decorative background shapes -->
            <div class="absolute -top-10 -right-10 w-40 h-40 bg-primary/10 rounded-full blur-3xl"></div>
            <div class="absolute -bottom-10 -left-10 w-40 h-40 bg-primary/10 rounded-full blur-3xl"></div>
        </div>
    </section>
    <!-- Final CTA Section -->
    <section class="pb-24 text-center">
        <h2 class="font-headline-lg-mobile text-headline-lg-mobile mb-4">Ready to reclaim your focus?</h2>
        <p class="font-body-lg text-body-lg text-on-surface-variant mb-8">Join over 50,000 professionals who trust TaskMind daily.</p>
        <button class="bg-primary text-on-primary py-4 px-12 rounded-xl font-button-text text-button-text shadow-lg hover:bg-primary/90 active:scale-95 transition-all">
            Start Your Free Journey
        </button>
        <div class="mt-8 flex justify-center gap-8">
            <div class="flex flex-col items-center">
                <span class="font-headline-md text-headline-md text-primary">4.9/5</span>
                <span class="font-label-caps text-label-caps text-outline">App Store</span>
            </div>
            <div class="w-px h-10 bg-outline-variant"></div>
            <div class="flex flex-col items-center">
                <span class="font-headline-md text-headline-md text-primary">1M+</span>
                <span class="font-label-caps text-label-caps text-outline">Tasks Mastered</span>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <x-slot:footer>

        <footer class="bg-surface-container py-12 px-margin-mobile border-t border-outline-variant/30">
            <div class="max-w-content mx-auto flex flex-col md:flex-row justify-between items-center gap-8">
                <div class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-primary">checklist</span>
                    <span class="font-headline-md text-headline-md text-primary tracking-tight">TaskMind</span>
                </div>
                <div class="flex gap-6">
                    <a class="font-label-caps text-label-caps text-on-surface-variant" href="#">Privacy</a>
                    <a class="font-label-caps text-label-caps text-on-surface-variant" href="#">Terms</a>
                    <a class="font-label-caps text-label-caps text-on-surface-variant" href="#">Twitter</a>
                </div>
                <p class="font-label-caps text-label-caps text-outline">© 2024 TaskMind Inc.</p>
            </div>
        </footer>
    </x-slot:footer>
    <x-slot:script>
        <script>
            // Micro-interactions and subtle effects
            document.addEventListener('DOMContentLoaded', () => {
                const observerOptions = {
                    threshold: 0.1
                };

                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('opacity-100', 'translate-y-0');
                            entry.target.classList.remove('opacity-0', 'translate-y-10');
                        }
                    });
                }, observerOptions);

                // Simple reveal animation
                const sections = document.querySelectorAll('section');
                sections.forEach(section => {
                    section.classList.add('transition-all', 'duration-700', 'opacity-0', 'translate-y-10');
                    observer.observe(section);
                });
            });
        </script>
    </x-slot:script>
</x-layout>