<?php

namespace App\Ai\Tools;

use App\Models\Folder;
use App\Models\Task;
use Illuminate\Contracts\JsonSchema\JsonSchema;
use Illuminate\Support\Facades\Auth;
use Laravel\Ai\Contracts\Tool;
use Laravel\Ai\Tools\Request;
use Stringable;

class CreateTaskTool implements Tool
{
    /**
     * Get the description of the tool's purpose.
     */
    public function description(): Stringable|string
    {
        return 'Creates a new task in the user\'s database based on a broken-down feature or idea.';
    }

    /**
     * Execute the tool.
     */
    public function handle(Request $request): Stringable|string
    {
        $userId = Auth::id() ?? 1;
        $folderName = $request['folder'] ?? 'AI Chat';

        $folder = Folder::firstOrCreate(
            ['name' => $folderName, 'user_id' => $userId],
            ['color' => '#5856d6']
        );

        $task = Task::create([
            'user_id' => $userId,
            'title' => $request['title'] ?? 'Untitled Task',
            'description' => $request['description'] ?? null,
            'priority' => $request['priority'] ?? 'medium',
            'folder_id' => $folder->id,
        ]);

        return "Task '{$task->title}' created successfully with ID: {$task->id}";
    }

    /**
     * Get the tool's schema definition.
     */
    public function schema(JsonSchema $schema): array
    {
        return [
            'title' => $schema->string()->description('The title of the task. Keep it concise and actionable.')->required(),
            'description' => $schema->string()->description('A detailed description of what needs to be done for this task.'),
            'priority' => $schema->string()->description('The priority of the task. Can be low, medium, or high.'),
            'folder' => $schema->string()->description('The category or folder for this task. E.g. "Frontend", "Backend", "AI Chat"'),
        ];
    }
}
