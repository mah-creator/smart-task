@props(['bodyWrapper' => '', 'mainWrapper' => ''])

<!DOCTYPE html>
<html class="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>TaskMind - Tasks</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700&amp;family=Inter:wght@400;600&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "surface-tint": "#4f4ccd",
                        "surface-container": "#f0edef",
                        "secondary-fixed-dim": "#c9c5cd",
                        "on-secondary-fixed-variant": "#48464c",
                        "primary-fixed": "#e2dfff",
                        "on-surface": "#1b1b1d",
                        "error": "#ba1a1a",
                        "tertiary-container": "#66676b",
                        "surface": "#fcf8fb",
                        "on-primary-container": "#e7e4ff",
                        "tertiary-fixed-dim": "#c6c6cb",
                        "on-error": "#ffffff",
                        "on-primary-fixed": "#0c006a",
                        "on-secondary-container": "#646169",
                        "secondary-fixed": "#e6e1e9",
                        "primary-container": "#5856d6",
                        "on-tertiary-fixed-variant": "#45474b",
                        "surface-container-high": "#eae7ea",
                        "surface-container-highest": "#e4e2e4",
                        "on-tertiary-fixed": "#1a1c1f",
                        "surface-container-low": "#f6f3f5",
                        "on-error-container": "#93000a",
                        "on-primary": "#ffffff",
                        "outline": "#777585",
                        "surface-dim": "#dcd9dc",
                        "on-tertiary": "#ffffff",
                        "on-secondary-fixed": "#1c1b21",
                        "on-background": "#1b1b1d",
                        "inverse-primary": "#c2c1ff",
                        "surface-bright": "#fcf8fb",
                        "surface-container-lowest": "#ffffff",
                        "inverse-on-surface": "#f3f0f2",
                        "on-primary-fixed-variant": "#3631b4",
                        "surface-variant": "#e4e2e4",
                        "tertiary": "#4e4f53",
                        "primary": "#3f3bbd",
                        "on-surface-variant": "#464554",
                        "inverse-surface": "#303032",
                        "background": "#fcf8fb",
                        "secondary-container": "#e3dee6",
                        "secondary": "#605d64",
                        "on-tertiary-container": "#e6e6eb",
                        "tertiary-fixed": "#e2e2e7",
                        "on-secondary": "#ffffff",
                        "primary-fixed-dim": "#c2c1ff",
                        "outline-variant": "#c7c4d6",
                        "error-container": "#ffdad6"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                    "spacing": {
                        "margin-desktop": "auto",
                        "margin-mobile": "20px",
                        "gutter": "16px",
                        "sm": "12px",
                        "md": "24px",
                        "xl": "64px",
                        "max-width-content": "800px",
                        "lg": "40px",
                        "base": "8px",
                        "xs": "4px"
                    },
                    "fontFamily": {
                        "button-text": ["Manrope"],
                        "body-sm": ["Inter"],
                        "label-caps": ["Inter"],
                        "headline-md": ["Manrope"],
                        "body-lg": ["Inter"],
                        "headline-lg-mobile": ["Manrope"],
                        "headline-lg": ["Manrope"]
                    },
                    "fontSize": {
                        "button-text": ["15px", {
                            "lineHeight": "20px",
                            "fontWeight": "600"
                        }],
                        "body-sm": ["14px", {
                            "lineHeight": "20px",
                            "fontWeight": "400"
                        }],
                        "label-caps": ["12px", {
                            "lineHeight": "16px",
                            "letterSpacing": "0.05em",
                            "fontWeight": "600"
                        }],
                        "headline-md": ["20px", {
                            "lineHeight": "28px",
                            "fontWeight": "600"
                        }],
                        "body-lg": ["16px", {
                            "lineHeight": "24px",
                            "fontWeight": "400"
                        }],
                        "headline-lg-mobile": ["24px", {
                            "lineHeight": "32px",
                            "letterSpacing": "-0.01em",
                            "fontWeight": "700"
                        }],
                        "headline-lg": ["32px", {
                            "lineHeight": "40px",
                            "letterSpacing": "-0.02em",
                            "fontWeight": "700"
                        }]
                    }
                },
            },
        }
    </script>
    {{ $style ?? '' }}

</head>

<body class="{{ $bodyWrapper }}">
    <!-- TopAppBar -->
    <header class="w-full top-0 sticky z-40 bg-surface dark:bg-surface-dim">
        <div class="flex justify-between items-center px-margin-mobile md:px-margin-desktop py-4 max-w-content mx-auto">
            <a href="{{ route('home') }}" class="flex items-center gap-3 cursor-pointer active:scale-95 transition-transform">
                <span class="material-symbols-outlined text-primary dark:text-primary-fixed-dim" data-icon="checklist">checklist</span>
                <h1 class="font-headline-md text-headline-md text-primary dark:text-primary-fixed-dim tracking-tight">TaskMind</h1>
            </a>
            @auth
            <div class="hidden md:flex items-center gap-6">
                <nav class="flex items-center gap-4">
                    <a class="text-primary dark:text-primary-fixed-dim font-bold font-label-caps text-label-caps px-3 py-1 rounded hover:bg-surface-container transition-colors" href="#">Tasks</a>
                    <a class="text-on-surface-variant dark:text-outline font-label-caps text-label-caps px-3 py-1 rounded hover:bg-surface-container transition-colors" href="#">Focus</a>
                    <a class="text-on-surface-variant dark:text-outline font-label-caps text-label-caps px-3 py-1 rounded hover:bg-surface-container transition-colors" href="#">Folders</a>
                    <a class="text-on-surface-variant dark:text-outline font-label-caps text-label-caps px-3 py-1 rounded hover:bg-surface-container transition-colors" href="#">Settings</a>
                </nav>
            </div>
            <!-- <div class="cursor-pointer active:scale-95 transition-transform">
                <img alt="User Profile" class="w-10 h-10 rounded-full object-cover border-2 border-primary-container" data-alt="A professional and clean studio headshot of a person against a neutral backdrop, perfectly lit with soft, flattering light. The aesthetic is modern and corporate, reflecting a productivity-focused identity. The colors are muted and professional, aligning with a light-mode workspace theme that emphasizes clarity and efficiency. The overall mood is approachable yet focused." src="https://lh3.googleusercontent.com/aida-public/AB6AXuD-LXo_4ACBdp1tL46anbiuAH2qjnLH6WJcCvTB9RwnCZl5eRIP3jfm-refhizXbg6Uqc7EUDaGdXSeQentvLcEcAF_21V0y5NSHx32EAhESveotJ_JY9CwR44tdf-_eGbE7DImzx6myMDlWuKs0b6-Ct7Q2mG47jU9aWwmPBxarHiJW2UX-9d4KXP28w0hikfB1m-iioK3UOvtvI50eIhYPn6Mq3n1qJ6DBGEEBe_-680AhHKUM7EofREPvxAfyDZ3ls5zRjrPvRY2">
            </div> -->

            <div class="flex items-center gap-4">
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
                <button
                    onclick="document.getElementById('logout-form').submit()"
                    class="text-primary dark:text-primary-fixed-dim font-label-caps text-label-caps px-3 py-1 rounded hover:bg-surface-container transition-colors" href="{{ route('logout') }}">Logout</button>
            </div>
            @else
            <div class="flex items-center gap-4">
                <a href="{{ route('login') }}" class="font-label-caps text-label-caps text-on-surface-variant hover:text-primary transition-colors">Log In</a>
                <a href="{{ route('register') }}" class="bg-primary text-on-primary px-4 py-2 rounded-lg font-button-text text-button-text active:scale-95 transition-transform">Sign Up</a>
            </div>
            @endauth
    </header>
    <main class="{{ $mainWrapper }}">
        {{ $slot }}
    </main>
    @isset($footer)
    {{ $footer }}
    @else
    <footer class="w-full fixed bottom-0 left-0 bg-surface dark:bg-surface-dim py-6 mt-12">
        <div class="max-w-content mx-auto px-margin-mobile text-center text-on-surface-variant text-sm">
            &copy; {{ date('Y') }} TaskMind. All rights reserved.
        </div>
    </footer>
    @endisset
    {{ $script ?? '' }}
</body>

</html>