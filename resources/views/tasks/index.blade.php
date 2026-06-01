<x-layout body-wrapper="bg-background text-on-background min-h-screen pb-32" main-wrapper="max-w-content mx-auto px-margin-mobile mt-8 space-y-12">
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
        <div class="grid grid-cols-1 gap-base">
            @foreach ($tasks as $task)
            <!-- Task Card -->
            <div class="group bg-surface-container-lowest custom-shadow rounded-xl p-4 min-h-[56px] flex items-center gap-4 border border-outline-variant hover:shadow-lg transition-all duration-300"
                id="task-card-{{ $task->id }}"
                style="opacity: {{ $task->is_completed ? '0.7' : '1' }}; transform: {{ $task->is_completed ? 'scale(0.98)' : 'scale(1)' }}; transition: 0.4s ease-out;">

                <!-- Hidden form for AJAX -->
                <form id="toggle-task-{{ $task->id }}" action="{{ route('tasks.toggle', ['task' => $task->id]) }}" method="post" style="display: none;">
                    @csrf
                </form>

                <button
                    onclick="toggleTask({{ $task->id }})"
                    class="w-6 h-6 rounded-full border-2 border-primary-container flex items-center justify-center transition-colors hover:bg-primary-fixed {{ $task->is_completed ? 'bg-primary-container' : '' }}"
                    style="border-color: {{ $task->is_completed ? 'transparent' : '' }}">
                    <span class="material-symbols-outlined text-[16px] text-primary {{ $task->is_completed ? '' : 'hidden' }}" data-icon="check" data-weight="fill" style="font-variation-settings: 'FILL' 1;">check</span>
                </button>
                <div class="flex-1">
                    <p class="font-body-lg text-body-lg text-on-surface {{ $task->is_completed ? 'task-checked' : '' }}">
                        {{ $task->title }}
                    </p>
                    <p class="text-xs text-gray-500">{{ $task->due_date?->format('M d, Y') }}</p>
                </div>
                <div class="flex items-center gap-2 relative">

                    @switch($task->priority)
                    @case('low')
                    <span class="px-2 py-0.5 rounded-full bg-secondary-container text-on-secondary-container font-label-caps text-[10px]">Low</span>
                    @break
                    @case('medium')
                    <span class="px-2 py-0.5 rounded-full bg-primary-container text-on-primary-container font-label-caps text-[10px]">Normal</span>
                    @break
                    @case('high')
                    <span class="px-2 py-0.5 rounded-full bg-error-container text-on-error-container font-label-caps text-[10px]">High</span>
                    @break
                    @endswitch

                    <button class="task-menu-trigger p-1 hover:bg-surface-container-high rounded-full transition-colors active:scale-90">
                        <span class="material-symbols-outlined text-on-surface-variant pointer-events-none" data-icon="more_vert">more_vert</span>
                    </button>
                    <div class="task-dropdown hidden absolute right-0 top-full mt-2 w-32 bg-surface-container-lowest border border-outline-variant rounded-lg shadow-xl z-30 overflow-visible transform opacity-0 scale-95 transition-all duration-200 origin-top-right">
                        <div class="flex flex-col py-1">
                            <a href="{{ route('tasks.edit', ['task' => $task->id]) }}" class="flex items-center gap-2 px-3 py-2 hover:bg-surface-container transition-colors text-left">
                                <span class="material-symbols-outlined text-sm" data-icon="edit">edit</span>
                                <span class="font-label-caps text-label-caps">Edit</span>
                            </a>
                            <button
                                onclick="document.getElementById('delete-task-form-{{ $task->id }}').submit()"
                                class="flex items-center gap-2 px-3 py-2 hover:bg-error-container text-error transition-colors text-left">
                                <span class="material-symbols-outlined text-sm" data-icon="delete">delete</span>
                                <span class="font-label-caps text-label-caps text-error">Delete</span>
                            </button>
                            <form id="delete-task-form-{{ $task->id }}" action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="post" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
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
    <a href="{{ route('tasks.create') }}" class="fixed bottom-24 right-6 md:right-12 w-14 h-14 rounded-full bg-primary-container text-on-primary-container shadow-xl flex items-center justify-center active:scale-90 transition-all z-50">
        <span class="material-symbols-outlined text-[32px]" data-icon="add">add</span>
    </a>
    <!-- BottomNavBar -->
    <nav class="fixed bottom-0 left-0 w-full flex justify-around items-center py-2 px-margin-mobile bg-surface dark:bg-surface-dim z-50 md:hidden shadow-[0_-4px_12px_rgba(0,0,0,0.04)]">
        <a class="flex flex-col items-center justify-center bg-primary-container dark:bg-primary-fixed-dim text-on-primary-container dark:text-on-primary-fixed-variant rounded-full px-4 py-1 active:scale-90 transition-all duration-200" href="#">
            <span class="material-symbols-outlined" data-icon="list_alt">list_alt</span>
            <span class="font-label-caps text-label-caps">Tasks</span>
        </a>
        <a class="flex flex-col items-center justify-center text-on-secondary-container dark:text-on-secondary-fixed-variant px-4 py-1 hover:text-primary active:scale-90 transition-all duration-200" href="#">
            <span class="material-symbols-outlined" data-icon="timer">timer</span>
            <span class="font-label-caps text-label-caps">Focus</span>
        </a>
        <a class="flex flex-col items-center justify-center text-on-secondary-container dark:text-on-secondary-fixed-variant px-4 py-1 hover:text-primary active:scale-90 transition-all duration-200" href="#">
            <span class="material-symbols-outlined" data-icon="folder_open">folder_open</span>
            <span class="font-label-caps text-label-caps">Folders</span>
        </a>
        <a class="flex flex-col items-center justify-center text-on-secondary-container dark:text-on-secondary-fixed-variant px-4 py-1 hover:text-primary active:scale-90 transition-all duration-200" href="#">
            <span class="material-symbols-outlined" data-icon="settings">settings</span>
            <span class="font-label-caps text-label-caps">Settings</span>
        </a>
    </nav>

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
    </x-slot:script>
</x-layout>