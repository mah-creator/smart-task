<?php

namespace App\Ai\Agents;

use App\Ai\Tools\CreateTaskTool;
use Laravel\Ai\Attributes\Provider;
use Laravel\Ai\Contracts\Agent;
use Laravel\Ai\Contracts\Conversational;
use Laravel\Ai\Contracts\HasTools;
use Laravel\Ai\Contracts\Tool;
use Laravel\Ai\Enums\Lab;
use Laravel\Ai\Messages\Message;
use Laravel\Ai\Promptable;
use Stringable;

#[Provider(Lab::Groq)]
class TaskBreakdownAgent implements Agent, Conversational, HasTools
{
    use Promptable;

    /**
     * Get the instructions that the agent should follow.
     */
    public function instructions(): Stringable|string
    {
        return 'You are an expert AI Product Manager. Your goal is to help the user break down their feature ideas or use cases into a series of actionable, small tasks. 
When a user provides an idea, break it down and explain your breakdown. Then, use the `CreateTaskTool` to automatically create those tasks in their system. Always assign a relevant folder for the tasks (e.g., "Frontend", "Backend", "Design", or the feature name). Let the user know once the tasks have been created.';
    }

    /**
     * Get the list of messages comprising the conversation so far.
     *
     * @return Message[]
     */
    public function messages(): iterable
    {
        return [];
    }

    /**
     * Get the tools available to the agent.
     *
     * @return Tool[]
     */
    public function tools(): iterable
    {
        return [
            new CreateTaskTool,
        ];
    }
}
