<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->foreignId('folder_id')->nullable()->constrained('folders')->nullOnDelete();
        });

        // Migrate existing string-based folders into real folders
        $tasks = DB::table('tasks')->whereNotNull('folder')->get();
        foreach ($tasks as $task) {
            if (! empty($task->folder)) {
                $folder = DB::table('folders')
                    ->where('name', $task->folder)
                    ->where('user_id', $task->user_id)
                    ->first();

                if (! $folder) {
                    $folderId = DB::table('folders')->insertGetId([
                        'user_id' => $task->user_id,
                        'name' => $task->folder,
                        'color' => '#5856d6',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                } else {
                    $folderId = $folder->id;
                }

                DB::table('tasks')->where('id', $task->id)->update(['folder_id' => $folderId]);
            }
        }

        Schema::table('tasks', function (Blueprint $table) {
            $table->dropColumn('folder');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->string('folder')->nullable();
        });

        $tasks = DB::table('tasks')->whereNotNull('folder_id')->get();
        foreach ($tasks as $task) {
            $folder = DB::table('folders')->where('id', $task->folder_id)->first();
            if ($folder) {
                DB::table('tasks')->where('id', $task->id)->update(['folder' => $folder->name]);
            }
        }

        Schema::table('tasks', function (Blueprint $table) {
            $table->dropForeign(['folder_id']);
            $table->dropColumn('folder_id');
        });
    }
};
