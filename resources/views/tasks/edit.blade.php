<!DOCTYPE html>

<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Create Task - TaskMind</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&amp;family=Inter:wght@400;500;600&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet" />
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
                }
            }
        }
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }

        body {
            background-color: #fcf8fb;
            color: #1b1b1d;
            -webkit-font-smoothing: antialiased;
        }

        .form-container {
            max-width: 800px;
        }

        input:focus,
        textarea:focus {
            outline: none;
            box-shadow: none;
        }

        .glass-header {
            backdrop-filter: blur(8px);
            background-color: rgba(252, 248, 251, 0.8);
        }
    </style>
    <style>
        body {
            min-height: max(884px, 100dvh);
        }
    </style>
</head>

<body class="font-body-lg text-body-lg min-h-screen pb-24">
    <!-- TopAppBar -->
    <header class="w-full top-0 sticky z-50 bg-surface dark:bg-surface-dim">
        <div class="flex justify-between items-center px-margin-mobile md:px-margin-desktop py-4 max-w-content mx-auto">
            <div class="flex items-center gap-3 cursor-pointer active:scale-95 transition-transform">
                <span class="material-symbols-outlined text-primary dark:text-primary-fixed-dim" data-icon="checklist">checklist</span>
                <h1 class="font-headline-md text-headline-md text-primary dark:text-primary-fixed-dim tracking-tight">TaskMind</h1>
            </div>
            <div class="flex items-center gap-4">
                <div class="w-10 h-10 rounded-full bg-secondary-container flex items-center justify-center overflow-hidden cursor-pointer active:scale-95 transition-transform">
                    <img alt="User profile settings" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBlJhzxBDQ5k3MTwO3DebLdc1GRDGB6XZi6NYG2snDSD8b1cC4zr8ouTREru2qS5PtBf9krLG3-obe3N8jckDIwMYEb-HrnTtJaKyhXyxs2exwDwfsYmcjyDvQkzF10zCH0KkAMIhgRd_03RCQGBu-ViF0pM2CiOcY96rbKPKVnSSB-UBEEtc88XLPULK9uYEvktJIomZog1JYkU492Erc-FNE_FO7RTLbLwiasoCmXkBbivEOnTHskO7_aTJQxchj6zBulrhx-s1A5" />
                </div>
            </div>
        </div>
    </header>
    <main class="max-w-content mx-auto px-margin-mobile md:px-0 py-8">
        <!-- Breadcrumb / Back Navigation (Suppresses global nav context) -->
        <div class="mb-8 flex items-center gap-2 text-on-surface-variant hover:text-primary cursor-pointer transition-colors group">
            <span class="material-symbols-outlined text-sm" data-icon="arrow_back">arrow_back</span>
            <span class="font-label-caps text-label-caps">Back to Tasks</span>
        </div>
        <!-- Task Creation Header -->
        <div class="mb-12">
            <h2 class="font-headline-lg text-headline-lg mb-2">Create New Task</h2>
            <p class="text-on-surface-variant font-body-sm text-body-sm">Organize your thoughts and stay on top of your goals.</p>
        </div>
        <!-- Form Canvas (Bento-style layout for form sections) -->
        <form action="{{ route('tasks.update', ['task' => $task->id]) }}" class="grid grid-cols-1 md:grid-cols-12 gap-6" method="post">
            @csrf
            @method('PUT')
            <!-- Main Content Area -->
            <div class="md:col-span-8 space-y-6">
                <!-- Title Card -->
                <div class="bg-surface-container-lowest p-6 rounded-xl shadow-[0_4px_12px_rgba(0,0,0,0.04)] border border-outline-variant/10">
                    <label class="font-label-caps text-label-caps block mb-4 text-on-surface-variant" for="task-title">Task Title</label>
                    <input name="title" value="{{ $task->title }}" class="w-full bg-surface-container-low border-none rounded-lg px-4 py-3 text-body-lg font-headline-md placeholder:text-outline focus:bg-surface-container-lowest focus:ring-2 focus:ring-primary/20 transition-all" id="task-title" placeholder="What needs to be done?" type="text" />
                </div>
                <!-- Description Card -->
                <div class="bg-surface-container-lowest p-6 rounded-xl shadow-[0_4px_12px_rgba(0,0,0,0.04)] border border-outline-variant/10">
                    <label class="font-label-caps text-label-caps block mb-4 text-on-surface-variant" for="task-desc">Description</label>
                    <textarea name="description" class="w-full bg-surface-container-low border-none rounded-lg px-4 py-3 text-body-lg placeholder:text-outline focus:bg-surface-container-lowest focus:ring-2 focus:ring-primary/20 transition-all resize-none" id="task-desc" placeholder="Add some details about this task..." rows="6">{{ $task->description }}</textarea>
                </div>
            </div>
            <!-- Metadata Sidebar -->
            <div class="md:col-span-4 space-y-6">
                <!-- Due Date Card -->
                <div class="bg-surface-container-lowest p-6 rounded-xl shadow-[0_4px_12px_rgba(0,0,0,0.04)] border border-outline-variant/10">
                    <div class="flex items-center gap-2 mb-4">
                        <span class="material-symbols-outlined text-primary text-[20px]" data-icon="calendar_today">calendar_today</span>
                        <label class="font-label-caps text-label-caps text-on-surface-variant" for="due-date">Due Date</label>
                    </div>
                    <input name="due_date" value="{{ $task->due_date }}" class="w-full bg-surface-container-low border-none rounded-lg px-4 py-2 text-body-sm focus:ring-2 focus:ring-primary/20 transition-all" id="due-date" type="date" />
                </div>
                <!-- Priority Card -->
                <div class="bg-surface-container-lowest p-6 rounded-xl shadow-[0_4px_12px_rgba(0,0,0,0.04)] border border-outline-variant/10">
                    <div class="flex items-center gap-2 mb-4">
                        <span class="material-symbols-outlined text-primary text-[20px]" data-icon="flag">flag</span>
                        <label class="font-label-caps text-label-caps text-on-surface-variant">Priority Level</label>
                    </div>
                    <div class="space-y-2">
                        <label class="flex items-center justify-between p-3 rounded-lg bg-surface-container-low hover:bg-surface-container cursor-pointer transition-colors">
                            <span class="text-body-sm">Urgent</span>
                            <input class="text-primary focus:ring-primary" name="priority" type="radio" value="high" />
                        </label>
                        <label class="flex items-center justify-between p-3 rounded-lg bg-surface-container-low hover:bg-surface-container cursor-pointer transition-colors">
                            <span class="text-body-sm">Standard</span>
                            <input checked="" class="text-primary focus:ring-primary" name="priority" type="radio" value="medium" />
                        </label>
                        <label class="flex items-center justify-between p-3 rounded-lg bg-surface-container-low hover:bg-surface-container cursor-pointer transition-colors">
                            <span class="text-body-sm">Low</span>
                            <input class="text-primary focus:ring-primary" name="priority" type="radio" value="low" />
                        </label>
                    </div>
                </div>
                <!-- Category/Folder Selection (Thematic addition) -->
                <div class="bg-surface-container-lowest p-6 rounded-xl shadow-[0_4px_12px_rgba(0,0,0,0.04)] border border-outline-variant/10">
                    <div class="flex items-center gap-2 mb-4">
                        <span class="material-symbols-outlined text-primary text-[20px]" data-icon="folder">folder</span>
                        <label class="font-label-caps text-label-caps text-on-surface-variant">Folder</label>
                    </div>
                    <select name="folder" class="w-full bg-surface-container-low border-none rounded-lg px-4 py-2 text-body-sm focus:ring-2 focus:ring-primary/20 transition-all">
                        <option>Personal</option>
                        <option>Work</option>
                        <option>Health</option>
                        <option>Finance</option>
                    </select>
                </div>
            </div>
            <!-- Form Actions -->
            <div class="md:col-span-12 mt-8 flex flex-col-reverse md:flex-row items-center justify-end gap-4">
                <button class="w-full md:w-auto px-8 py-3 rounded-full font-button-text text-button-text text-on-surface-variant hover:bg-surface-container-high transition-colors active:scale-95" type="button">
                    Cancel
                </button>
                <button class="w-full md:w-auto px-10 py-3 rounded-full font-button-text text-button-text bg-primary text-on-primary shadow-lg shadow-primary/20 hover:bg-primary-container transition-all active:scale-95" type="submit">
                    Update Task
                </button>
            </div>
        </form>
        <!-- Contextual Illustration/Visual Aid -->
        <div class="mt-16 relative w-full h-[200px] rounded-2xl overflow-hidden grayscale hover:grayscale-0 transition-all duration-700">
            <div class="absolute inset-0 bg-gradient-to-t from-background via-transparent to-transparent z-10"></div>
            <img class="w-full h-full object-cover" data-alt="A clean, minimalist desk setup from a top-down perspective, featuring an open notebook with a checklist, a sleek black pen, and a laptop. The lighting is bright and airy, characteristic of a productive light-mode workspace. The color palette is composed of soft whites, light grays, and professional deep blue accents. The atmosphere is serene, organized, and focused, reflecting a state of flow and mental clarity." src="https://lh3.googleusercontent.com/aida-public/AB6AXuD1TtYZuKrIOlJ6V6anylsFmZmZ5ilyQP6y8mZuBs6-9Mef7LuEl1sqelsMmdFwLL9P5JCrRotewY8tXX85J3QFn9lDO5r275GiKDrNBtPXpPeaWvErLcL-JPICJAx5-XqMCFWhXhlGn11Wx5Li5Z4dOFelZk4VS4fwv7w7kBWPtpfsngziufNjPZgiNgJRnBkAPWKDXYT-kSGSLmWBCebVarXK9MjRvjnAuEaiL7FZsT4oVbOxip1NclJPGTutzA0320zuVPeROInd" />
        </div>
    </main>
    <!-- Bottom Navigation (Suppressed based on "Task-Focused" rule, but implemented for responsiveness consistency check) -->
    <!-- The prompt specifies 'Task creation screen' which is task-focused, thus global nav is suppressed per instructions. -->
    <script>
        // Micro-interactions for form focus effects
        const inputs = document.querySelectorAll('input, textarea, select');
        inputs.forEach(input => {
            input.addEventListener('focus', () => {
                input.parentElement.classList.add('ring-1', 'ring-primary/10');
            });
            input.addEventListener('blur', () => {
                input.parentElement.classList.remove('ring-1', 'ring-primary/10');
            });
        });

        // Simple form submission mock
        // document.querySelector('form').addEventListener('submit', (e) => {
        //     e.preventDefault();
        //     const btn = e.target.querySelector('button[type="submit"]');
        //     const originalText = btn.innerText;
        //     btn.innerHTML = '<span class="material-symbols-outlined animate-spin">sync</span>';
        //     btn.disabled = true;

        //     setTimeout(() => {
        //         btn.innerHTML = 'Saved!';
        //         btn.classList.replace('bg-primary', 'bg-emerald-600');
        //         setTimeout(() => {
        //             btn.innerHTML = originalText;
        //             btn.classList.replace('bg-emerald-600', 'bg-primary');
        //             btn.disabled = false;
        //         }, 2000);
        //     }, 1000);
        // });
    </script>
</body>

</html>