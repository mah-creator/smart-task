<x-layout body-wrapper="bg-background text-on-background min-h-screen pb-32" main-wrapper="max-w-content mx-auto px-margin-mobile mt-8 space-y-12">
    <x-slot:style>
        <style>
            .material-symbols-outlined {
                font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            }
        </style>
    </x-slot:style>

    <!-- Header Section -->
    <section class="space-y-2 relative">
        <a href="{{ route('tasks.index') }}" class="absolute -top-12 left-0 flex items-center gap-2 text-on-surface-variant hover:text-primary cursor-pointer transition-colors group">
            <span class="material-symbols-outlined text-sm" data-icon="arrow_back">arrow_back</span>
            <span class="font-label-caps text-label-caps">Back to Tasks</span>
        </a>
        <h2 class="font-headline-lg text-headline-lg md:text-headline-lg text-on-surface">Manage Folders</h2>
        <p class="font-body-lg text-body-lg text-on-surface-variant">Organize your tasks efficiently.</p>
    </section>

    <!-- Folders Grid -->
    <section>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-base">
            @foreach($folders as $folder)
                <div class="bg-surface-container-lowest p-6 rounded-xl border border-outline-variant flex flex-col justify-between space-y-4 hover:shadow-lg transition-all custom-shadow">
                    <div class="flex justify-between items-start">
                        <div class="w-12 h-12 rounded-xl flex items-center justify-center shadow-inner" style="background-color: {{ $folder->color }}20;">
                            <span class="material-symbols-outlined text-[24px]" style="color: {{ $folder->color }};" data-icon="folder">folder</span>
                        </div>
                        <form action="{{ route('folders.destroy', $folder->id) }}" method="post" onsubmit="return confirm('Delete this folder?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-on-surface-variant hover:text-error transition-colors p-2 rounded-full hover:bg-error/10">
                                <span class="material-symbols-outlined text-sm">delete</span>
                            </button>
                        </form>
                    </div>
                    <div>
                        <h4 class="font-headline-md text-headline-md text-on-surface">{{ $folder->name }}</h4>
                        <p class="font-body-sm text-body-sm text-on-surface-variant mt-1">{{ $folder->tasks_count }} tasks inside</p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Create Folder Section -->
    <section class="mt-12 bg-surface-container-lowest p-6 md:p-8 rounded-2xl custom-shadow border border-outline-variant/50">
        <h3 class="font-headline-md text-headline-md text-on-surface mb-6 flex items-center gap-2">
            <span class="material-symbols-outlined text-primary">create_new_folder</span>
            Create New Folder
        </h3>
        <form action="{{ route('folders.store') }}" method="POST" class="flex flex-col md:flex-row items-center gap-4">
            @csrf
            <div class="w-full md:flex-1 relative">
                <input type="text" name="name" placeholder="E.g. Work, Personal, Marketing" required class="w-full bg-surface-container-low border-none rounded-xl px-4 py-4 text-body-lg placeholder:text-outline focus:ring-2 focus:ring-primary/30 transition-all shadow-inner">
            </div>
            
            <div class="w-full md:w-auto flex items-center gap-4">
                <div class="relative group">
                    <input type="color" name="color" value="#5856d6" class="w-14 h-14 rounded-xl cursor-pointer bg-surface-container-low border-none shadow-inner p-1">
                </div>
                
                <button type="submit" class="flex-1 md:flex-none px-8 py-4 rounded-xl font-button-text text-button-text bg-primary text-on-primary shadow-[0_8px_16px_rgba(79,70,229,0.2)] hover:bg-primary-container active:scale-95 transition-all">
                    Create
                </button>
            </div>
        </form>
    </section>

    <!-- BottomNavBar -->
    <nav class="fixed bottom-0 left-0 w-full flex justify-around items-center py-2 px-margin-mobile bg-surface dark:bg-surface-dim z-50 md:hidden shadow-[0_-4px_12px_rgba(0,0,0,0.04)]">
        <a class="flex flex-col items-center justify-center text-on-secondary-container dark:text-on-secondary-fixed-variant px-4 py-1 hover:text-primary active:scale-90 transition-all duration-200" href="{{ route('tasks.index') }}">
            <span class="material-symbols-outlined" data-icon="list_alt">list_alt</span>
            <span class="font-label-caps text-label-caps">Tasks</span>
        </a>
        <a class="flex flex-col items-center justify-center text-on-secondary-container dark:text-on-secondary-fixed-variant px-4 py-1 hover:text-primary active:scale-90 transition-all duration-200" href="#">
            <span class="material-symbols-outlined" data-icon="timer">timer</span>
            <span class="font-label-caps text-label-caps">Focus</span>
        </a>
        <a class="flex flex-col items-center justify-center bg-primary-container dark:bg-primary-fixed-dim text-on-primary-container dark:text-on-primary-fixed-variant rounded-full px-4 py-1 active:scale-90 transition-all duration-200" href="#">
            <span class="material-symbols-outlined" data-icon="folder_open">folder_open</span>
            <span class="font-label-caps text-label-caps">Folders</span>
        </a>
        <a class="flex flex-col items-center justify-center text-on-secondary-container dark:text-on-secondary-fixed-variant px-4 py-1 hover:text-primary active:scale-90 transition-all duration-200" href="#">
            <span class="material-symbols-outlined" data-icon="settings">settings</span>
            <span class="font-label-caps text-label-caps">Settings</span>
        </a>
    </nav>
</x-layout>
