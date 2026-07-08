<x-layout body-wrapper="bg-background text-on-background min-h-screen pb-32"
    main-wrapper="max-w-content mx-auto px-margin-mobile mt-8 space-y-12">
    <x-slot:style>
        <style>
            .material-symbols-outlined {
                font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            }

            .task-checked {
                text-decoration: line-through;
                opacity: 0.5;
            }

            .custom-shadow {
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.04);
            }
        </style>
    </x-slot:style>
    <!-- Header Section -->
    <section class="space-y-2">
        <h2 class="font-headline-lg text-headline-lg md:text-headline-lg text-on-surface">Stay Productive</h2>
        <p class="font-body-lg text-body-lg text-on-surface-variant">You have 5 tasks to focus on today.</p>
    </section>
    <!-- Today Section (Bento Inspired) -->
    <section>
        <div class="flex items-center justify-between mb-6">
            <h3 class="font-headline-md text-headline-md text-on-surface">Today</h3>
            <div class="font-label-caps text-label-caps text-primary px-3 py-1 bg-primary-fixed rounded-full">
                <span id="tasks-count">{{ $tasks_count }}</span><span> Remaining</span>
            </div>
        </div>
        <div id="tasks-grid-container" class="space-y-8">
            @foreach($folders as $folder)
                @if($folder->tasks->count() > 0)
                    <div class="folder-group">
                        <h4 class="font-label-caps text-label-caps text-on-surface-variant mb-4 flex items-center gap-2 px-2">
                            <span class="w-3 h-3 rounded-full" style="background-color: {{ $folder->color }}"></span>
                            {{ $folder->name }}
                        </h4>
                        <div class="grid grid-cols-1 gap-base">
                            @foreach($folder->tasks as $task)
                                <x-task-card :task="$task" />
                            @endforeach
                        </div>
                    </div>
                @endif
            @endforeach

            @if($unassignedTasks->count() > 0)
                <div class="folder-group">
                    <h4 class="font-label-caps text-label-caps text-on-surface-variant mb-4 flex items-center gap-2 px-2">
                        <span class="w-3 h-3 rounded-full bg-outline"></span>
                        Unassigned Tasks
                    </h4>
                    <div class="grid grid-cols-1 gap-base">
                        @foreach($unassignedTasks as $task)
                            <x-task-card :task="$task" />
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </section>
    <!-- Upcoming Section (Asymmetric / Glass-ish) -->
    <!-- <section class=" pb-24">
            <div class="flex items-center justify-between mb-6">
                <h3 class="font-headline-md text-headline-md text-on-surface">Upcoming</h3>
                <span class="font-label-caps text-label-caps text-on-surface-variant">Tomorrow</span>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-md">
                <!~~ Upcoming Item 1 ~~>
                <div class="bg-surface-container-low p-6 rounded-xl border border-outline-variant flex flex-col justify-between space-y-4 hover:border-primary transition-colors cursor-pointer" style="opacity: 1; transform: translateY(0px); transition: 0.4s ease-out;">
                    <div class="flex justify-between items-start">
                        <div class="w-10 h-10 rounded-lg bg-primary-container flex items-center justify-center">
                            <span class="material-symbols-outlined text-on-primary-container" data-icon="event">event</span>
                        </div>
                        <span class="font-label-caps text-label-caps text-secondary">09:00 AM</span>
                    </div>
                    <div>
                        <h4 class="font-headline-md text-headline-md text-on-surface">Client Presentation</h4>
                        <p class="font-body-sm text-body-sm text-on-surface-variant mt-1">Finalizing the pitch deck for the Q3 strategy.</p>
                    </div>
                    <div class="flex -space-x-2">
                        <div class="w-8 h-8 rounded-full border-2 border-surface bg-primary-fixed-dim"></div>
                        <div class="w-8 h-8 rounded-full border-2 border-surface bg-secondary-fixed"></div>
                        <div class="w-8 h-8 rounded-full border-2 border-surface flex items-center justify-center bg-surface-container-highest text-[10px] font-bold">+3</div>
                    </div>
                </div>
                <!~~ Upcoming Item 2 ~~>
                <div class="bg-surface-container-low p-6 rounded-xl border border-outline-variant flex flex-col justify-between space-y-4 hover:border-primary transition-colors cursor-pointer" style="opacity: 1; transform: translateY(0px); transition: 0.4s ease-out;">
                    <div class="flex justify-between items-start">
                        <div class="w-10 h-10 rounded-lg bg-secondary-container flex items-center justify-center">
                            <span class="material-symbols-outlined text-on-secondary-container" data-icon="fitness_center">fitness_center</span>
                        </div>
                        <span class="font-label-caps text-label-caps text-secondary">05:30 PM</span>
                    </div>
                    <div>
                        <h4 class="font-headline-md text-headline-md text-on-surface">Health &amp; Wellness</h4>
                        <p class="font-body-sm text-body-sm text-on-surface-variant mt-1">Evening cardio session and meditation.</p>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="px-2 py-0.5 rounded-xs bg-primary-fixed text-primary font-label-caps text-[10px]">Personal</span>
                    </div>
                </div>
            </div>
        </section> -->
    <!-- FAB -->
    <a href="{{ route('tasks.create') }}"
        class="fixed bottom-24 right-6 md:right-12 w-14 h-14 rounded-full bg-primary-container text-on-primary-container shadow-xl flex items-center justify-center active:scale-90 transition-all z-50">
        <span class="material-symbols-outlined text-[32px]" data-icon="add">add</span>
    </a>
    <!-- BottomNavBar -->
    <nav
        class="fixed bottom-0 left-0 w-full flex justify-around items-center py-2 px-margin-mobile bg-surface dark:bg-surface-dim z-50 md:hidden shadow-[0_-4px_12px_rgba(0,0,0,0.04)]">
        <a class="flex flex-col items-center justify-center bg-primary-container dark:bg-primary-fixed-dim text-on-primary-container dark:text-on-primary-fixed-variant rounded-full px-4 py-1 active:scale-90 transition-all duration-200"
            href="#">
            <span class="material-symbols-outlined" data-icon="list_alt">list_alt</span>
            <span class="font-label-caps text-label-caps">Tasks</span>
        </a>
        <a class="flex flex-col items-center justify-center text-on-secondary-container dark:text-on-secondary-fixed-variant px-4 py-1 hover:text-primary active:scale-90 transition-all duration-200"
            href="#">
            <span class="material-symbols-outlined" data-icon="timer">timer</span>
            <span class="font-label-caps text-label-caps">Focus</span>
        </a>
        <a class="flex flex-col items-center justify-center text-on-secondary-container dark:text-on-secondary-fixed-variant px-4 py-1 hover:text-primary active:scale-90 transition-all duration-200"
            href="{{ route('folders.index') }}">
            <span class="material-symbols-outlined" data-icon="folder_open">folder_open</span>
            <span class="font-label-caps text-label-caps">Folders</span>
        </a>
        <a class="flex flex-col items-center justify-center text-on-secondary-container dark:text-on-secondary-fixed-variant px-4 py-1 hover:text-primary active:scale-90 transition-all duration-200"
            href="#">
            <span class="material-symbols-outlined" data-icon="settings">settings</span>
            <span class="font-label-caps text-label-caps">Settings</span>
        </a>
    </nav>

    <!-- Chatbot FAB -->
    <button id="chatbot-fab"
        class="fixed bottom-6 right-6 md:right-12 w-14 h-14 rounded-full bg-gradient-to-r from-purple-500 to-indigo-600 text-white shadow-[0_8px_16px_rgba(79,70,229,0.3)] flex items-center justify-center hover:scale-105 active:scale-95 transition-all duration-300 z-[60] group">
        <span class="material-symbols-outlined text-[28px] group-hover:rotate-12 transition-transform">smart_toy</span>
    </button>

    <!-- Chatbot Window -->
    <div id="chatbot-window"
        class="fixed bottom-24 right-6 md:right-12 w-[350px] sm:w-[400px] h-[500px] max-h-[80vh] bg-surface-container-lowest/80 backdrop-blur-2xl border border-white/20 dark:border-white/5 rounded-2xl shadow-2xl z-[60] flex flex-col opacity-0 scale-95 pointer-events-none transition-all duration-400 ease-[cubic-bezier(0.16,1,0.3,1)] origin-bottom-right overflow-hidden custom-shadow">
        <!-- Header -->
        <div
            class="p-4 bg-gradient-to-r from-purple-500 to-indigo-600 text-white flex items-center justify-between shadow-sm z-10">
            <div class="flex items-center gap-3">
                <div
                    class="w-10 h-10 rounded-full bg-white/20 flex items-center justify-center backdrop-blur-md shadow-inner">
                    <span class="material-symbols-outlined text-[20px]">smart_toy</span>
                </div>
                <div>
                    <h3 class="font-headline-sm tracking-wide text-sm font-bold">AI Product Manager</h3>
                    <p class="text-[10px] text-indigo-100 opacity-90 flex items-center gap-1"><span
                            class="w-1.5 h-1.5 rounded-full bg-green-400 animate-pulse"></span> Online</p>
                </div>
            </div>
            <button id="chatbot-close"
                class="w-8 h-8 rounded-full hover:bg-white/20 flex items-center justify-center transition-colors active:scale-90">
                <span class="material-symbols-outlined text-[20px]">close</span>
            </button>
        </div>

        <!-- Messages Area -->
        <div id="chat-messages" class="flex-1 overflow-y-auto p-4 space-y-4 bg-transparent relative scroll-smooth pb-4">
            <!-- Initial Message -->
            <div class="flex items-start gap-2 max-w-[85%]">
                <div
                    class="w-8 h-8 rounded-full bg-gradient-to-br from-purple-100 to-indigo-100 flex-shrink-0 flex items-center justify-center text-indigo-600 shadow-sm border border-indigo-200">
                    <span class="material-symbols-outlined text-[16px]">smart_toy</span>
                </div>
                <div
                    class="bg-surface-container shadow-sm p-3 rounded-2xl rounded-tl-sm text-sm text-on-surface font-body-sm leading-relaxed border border-outline-variant/30">
                    Hi! I'm your AI Product Manager. Describe a feature or idea, and I'll break it down into actionable
                    tasks for you.
                </div>
            </div>
        </div>

        <!-- Input Area -->
        <div
            class="p-3 bg-surface/50 backdrop-blur-md border-t border-outline-variant/50 flex items-center gap-2 relative z-10">
            <input type="text" id="chat-input" placeholder="E.g. Build an auth system..."
                class="flex-1 bg-surface-container-highest/50 border border-outline-variant/50 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 rounded-full px-4 py-2.5 text-sm text-on-surface outline-none transition-all placeholder:text-on-surface-variant shadow-inner">
            <button id="chat-submit"
                class="w-10 h-10 rounded-full bg-gradient-to-r from-purple-600 to-indigo-600 text-white flex items-center justify-center hover:from-purple-500 hover:to-indigo-500 active:scale-90 transition-all shadow-md shadow-indigo-500/30 shrink-0">
                <span class="material-symbols-outlined text-[18px] ml-0.5">send</span>
            </button>
        </div>
    </div>

    <x-slot:script>
        <script>
            // Toggle task function with AJAX
            function toggleTask(taskId) {
                const form = document.getElementById(`toggle-task-${taskId}`);
                const card = document.getElementById(`task-card-${taskId}`);
                const btn = card.querySelector('button:first-of-type');
                const icon = btn.querySelector('.material-symbols-outlined');
                const text = card.querySelector('p');

                // Get CSRF token
                const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

                // Disable button during request
                btn.disabled = true;
                btn.style.opacity = '0.5';

                // Make AJAX request
                fetch(form.action, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json',
                    },
                    body: JSON.stringify({
                        _token: csrfToken,
                        is_completed: Boolean
                    })
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Toggle visual states based on new status
                            if (data.is_completed) {
                                // Task is now completed
                                icon.classList.remove('hidden');
                                btn.classList.add('bg-primary-container');
                                btn.style.borderColor = 'transparent';
                                text.classList.add('task-checked');
                                card.style.opacity = '0.7';
                                card.style.transform = 'scale(0.98)';
                            } else {
                                // Task is now not completed
                                icon.classList.add('hidden');
                                btn.classList.remove('bg-primary-container');
                                btn.style.borderColor = '';
                                text.classList.remove('task-checked');
                                card.style.opacity = '1';
                                card.style.transform = 'scale(1)';
                            }

                            // Update remaining tasks counter
                            updateRemainingTasks(data.is_completed);
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        // Show error feedback (optional)
                        card.style.backgroundColor = '#ffdad6';
                        setTimeout(() => {
                            card.style.backgroundColor = '';
                        }, 500);
                    })
                    .finally(() => {
                        // Re-enable button
                        btn.disabled = false;
                        btn.style.opacity = '1';
                    });
            }

            // Delete task function with AJAX
            function deleteTask(taskId) {
                if (confirm('Are you sure you want to delete this task?')) {
                    const form = document.getElementById(`delete-task-form-${taskId}`);
                    const card = document.getElementById(`task-card-${taskId}`);
                    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

                    fetch(form.action, {
                        method: 'DELETE',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken,
                            'X-Requested-With': 'XMLHttpRequest',
                            'Accept': 'application/json',
                        },
                        body: JSON.stringify({
                            _token: csrfToken,
                            _method: 'DELETE'
                        })
                    })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                // Animate and remove card
                                card.style.opacity = '0';
                                card.style.transform = 'translateX(20px)';
                                setTimeout(() => {
                                    card.remove();
                                    updateRemainingTasks(null); // Recalculate remaining tasks after deletion
                                }, 300);
                            }
                        })
                        .catch(error => console.error('Error:', error));
                }
            }

            // Update remaining tasks counter
            function updateRemainingTasks(is_completed) {
                const tasksCountElement = document.getElementById('tasks-count');
                let currentCount = parseInt(tasksCountElement.textContent, 10);
                console.log(is_completed)
                if (is_completed) {
                    tasksCountElement.textContent = currentCount - 1;
                } else {
                    tasksCountElement.textContent = currentCount + 1;
                }
                // const cards = document.querySelectorAll('#task-card-\\d+');
                // let remaining = 0;

                // cards.forEach(card => {
                //     const text = card.querySelector('p');
                //     if (!text.classList.contains('task-checked')) {
                //         remaining++;
                //     }
                // });

                // const counter = document.querySelector('.bg-primary-fixed.rounded-full');
                // if (counter) {
                //     counter.textContent = `${remaining} Remaining`;
                // }
            }

            // Simple enter animation for cards
            document.addEventListener('DOMContentLoaded', () => {
                const cards = document.querySelectorAll('.group, .bg-surface-container-low');
                cards.forEach((card, index) => {
                    if (card.style.opacity !== '0.7' && card.style.opacity !== '1') {
                        card.style.opacity = '0';
                        card.style.transform = 'translateY(10px)';
                        setTimeout(() => {
                            card.style.transition = 'all 0.4s ease-out';
                            card.style.opacity = '1';
                            card.style.transform = 'translateY(0)';
                        }, index * 100);
                    }
                });
            });
        </script>

        <script>
            // Dropdown menu functionality
            document.addEventListener('click', (e) => {
                const isTrigger = e.target.closest('.task-menu-trigger');
                const allDropdowns = document.querySelectorAll('.task-dropdown');

                if (isTrigger) {
                    const currentDropdown = isTrigger.nextElementSibling;

                    // Close others
                    allDropdowns.forEach(d => {
                        if (d !== currentDropdown) {
                            d.classList.add('hidden', 'opacity-0', 'scale-95');
                        }
                    });

                    // Toggle current
                    const isHidden = currentDropdown.classList.contains('hidden');
                    if (isHidden) {
                        currentDropdown.classList.remove('hidden');
                        // Small timeout to allow transition from hidden to block
                        requestAnimationFrame(() => {
                            currentDropdown.classList.remove('opacity-0', 'scale-95');
                        });
                    } else {
                        currentDropdown.classList.add('opacity-0', 'scale-95');
                        setTimeout(() => currentDropdown.classList.add('hidden'), 200);
                    }
                    return;
                }

                // Click outside closes all
                if (!e.target.closest('.task-dropdown')) {
                    allDropdowns.forEach(d => {
                        d.classList.add('opacity-0', 'scale-95');
                        setTimeout(() => d.classList.add('hidden'), 200);
                    });
                }
            });
        </script>

        <script>
            // Chatbot Functionality
            document.addEventListener('DOMContentLoaded', () => {
                const fab = document.getElementById('chatbot-fab');
                const chatWindow = document.getElementById('chatbot-window');
                const closeBtn = document.getElementById('chatbot-close');
                const input = document.getElementById('chat-input');
                const submitBtn = document.getElementById('chat-submit');
                const messagesContainer = document.getElementById('chat-messages');
                let isChatOpen = false;

                // Toggle Chat Window
                function toggleChat() {
                    isChatOpen = !isChatOpen;
                    if (isChatOpen) {
                        chatWindow.classList.remove('opacity-0', 'scale-95', 'pointer-events-none');
                        chatWindow.classList.add('opacity-100', 'scale-100', 'pointer-events-auto');
                        fab.classList.add('scale-0'); // Hide FAB gracefully
                        setTimeout(() => input.focus(), 300);
                    } else {
                        chatWindow.classList.remove('opacity-100', 'scale-100', 'pointer-events-auto');
                        chatWindow.classList.add('opacity-0', 'scale-95', 'pointer-events-none');
                        fab.classList.remove('scale-0');
                    }
                }

                fab.addEventListener('click', toggleChat);
                closeBtn.addEventListener('click', toggleChat);

                // Add Message to UI
                function appendMessage(text, sender) {
                    const msgDiv = document.createElement('div');
                    msgDiv.className = `flex items-end gap-2 max-w-[85%] ${sender === 'user' ? 'ml-auto flex-row-reverse' : ''} animate-[fade-in_0.3s_ease-out_forwards]`;

                    let avatar = '';
                    if (sender === 'bot') {
                        avatar = `
                        <div class="w-8 h-8 rounded-full bg-gradient-to-br from-purple-100 to-indigo-100 flex-shrink-0 flex items-center justify-center text-indigo-600 shadow-sm border border-indigo-200">
                            <span class="material-symbols-outlined text-[16px]">smart_toy</span>
                        </div>`;
                    }

                    const bubbleColor = sender === 'user'
                        ? 'bg-gradient-to-br from-purple-500 to-indigo-600 text-white rounded-tr-sm'
                        : 'bg-surface-container shadow-sm text-on-surface rounded-tl-sm border border-outline-variant/30';

                    msgDiv.innerHTML = `
                        ${avatar}
                        <div class="p-3 rounded-2xl ${bubbleColor} text-sm font-body-sm leading-relaxed" style="white-space: pre-wrap;">${text}</div>
                    `;

                    messagesContainer.appendChild(msgDiv);
                    messagesContainer.scrollTo({ top: messagesContainer.scrollHeight, behavior: 'smooth' });
                }

                function appendTypingIndicator() {
                    const id = 'typing-' + Date.now();
                    const msgDiv = document.createElement('div');
                    msgDiv.id = id;
                    msgDiv.className = `flex items-end gap-2 max-w-[85%] animate-[fade-in_0.3s_ease-out_forwards]`;

                    msgDiv.innerHTML = `
                        <div class="w-8 h-8 rounded-full bg-gradient-to-br from-purple-100 to-indigo-100 flex-shrink-0 flex items-center justify-center text-indigo-600 shadow-sm border border-indigo-200">
                            <span class="material-symbols-outlined text-[16px] animate-pulse">smart_toy</span>
                        </div>
                        <div class="p-4 rounded-2xl bg-surface-container rounded-tl-sm border border-outline-variant/30 flex items-center gap-1.5 h-[42px]">
                            <div class="w-1.5 h-1.5 bg-indigo-400 rounded-full animate-bounce"></div>
                            <div class="w-1.5 h-1.5 bg-indigo-400 rounded-full animate-bounce" style="animation-delay: 0.2s"></div>
                            <div class="w-1.5 h-1.5 bg-indigo-400 rounded-full animate-bounce" style="animation-delay: 0.4s"></div>
                        </div>
                    `;
                    messagesContainer.appendChild(msgDiv);
                    messagesContainer.scrollTo({ top: messagesContainer.scrollHeight, behavior: 'smooth' });
                    return id;
                }

                // Handle sending
                function sendMessage() {
                    const text = input.value.trim();
                    if (!text) return;

                    input.value = '';
                    appendMessage(text, 'user');
                    const typingId = appendTypingIndicator();

                    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

                    fetch('/chat/message', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken,
                            'Accept': 'application/json',
                        },
                        body: JSON.stringify({ message: text })
                    })
                        .then(response => response.json())
                        .then(data => {
                            document.getElementById(typingId)?.remove();
                            if (data.success) {
                                appendMessage(data.message, 'bot');

                                // Dynamically refresh the tasks grid without a full page reload
                                fetch(window.location.href)
                                    .then(res => res.text())
                                    .then(html => {
                                        const parser = new DOMParser();
                                        const doc = parser.parseFromString(html, 'text/html');

                                        const currentTasksGrid = document.getElementById('tasks-grid-container');
                                        const newTasksGrid = doc.getElementById('tasks-grid-container');

                                        if (currentTasksGrid && newTasksGrid) {
                                            currentTasksGrid.innerHTML = newTasksGrid.innerHTML;

                                            // Animate newly inserted cards
                                            const cards = currentTasksGrid.querySelectorAll('.group');
                                            cards.forEach((card, index) => {
                                                card.style.opacity = '0';
                                                card.style.transform = 'translateY(10px)';
                                                setTimeout(() => {
                                                    card.style.transition = 'all 0.4s ease-out';
                                                    card.style.opacity = card.classList.contains('task-checked') ? '0.7' : '1';
                                                    card.style.transform = card.classList.contains('task-checked') ? 'scale(0.98)' : 'translateY(0)';
                                                }, index * 100);
                                            });
                                        }

                                        // Update task count
                                        const currentCount = document.getElementById('tasks-count');
                                        const newCount = doc.getElementById('tasks-count');
                                        if (currentCount && newCount) {
                                            currentCount.textContent = newCount.textContent;
                                        }
                                    });
                            } else {
                                appendMessage("Sorry, I encountered an error.", 'bot');
                            }
                        })
                        .catch(err => {
                            document.getElementById(typingId)?.remove();
                            appendMessage("Sorry, I couldn't reach the server.", 'bot');
                            console.error(err);
                        });
                }

                submitBtn.addEventListener('click', sendMessage);
                input.addEventListener('keypress', (e) => {
                    if (e.key === 'Enter') sendMessage();
                });
            });
        </script>
        <style>
            @keyframes fade-in {
                from {
                    opacity: 0;
                    transform: translateY(10px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
        </style>
    </x-slot:script>
</x-layout>