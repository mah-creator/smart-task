@props(['task'])

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
