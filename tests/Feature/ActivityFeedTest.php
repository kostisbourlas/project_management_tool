<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Facades\Tests\Setup\ProjectFactory;
use Tests\TestCase;

class ActivityFeedTest extends TestCase
{

    use RefreshDatabase;

    function test_create_a_project_triggers_activity()
    {
//        $project = app(\Tests\Setup\ProjectFactory::class)->create();

        $project = ProjectFactory::create();

        $this->assertCount(1, $project->activity);

        $this->assertEquals('created', $project->activity[0]->description);
    }

    function test_updating_a_project_triggers_activity()
    {
        $project = ProjectFactory::create();

        $project->update(['title' => 'Changed']);

        $this->assertCount(2, $project->activity);

        $this->assertEquals('updated', $project->activity->last()->description);
    }

    function test_creating_a_new_task_triggers_project_activity()
    {
        $project = ProjectFactory::create();

        $project->addTask('Test task');

        $this->assertCount(2, $project->activity);

        $this->assertEquals('created_task', $project->activity->last()->description);
    }

    function test_completing_a_task_triggers_project_activity()
    {
        $project = ProjectFactory::withTasks(1)
            ->ownedBy($this->signIn())
            ->create();

        $this->patch($project->tasks[0]->path(), [
            'body' => 'test body',
            'completed' => true
        ]);

        $this->assertCount(3, $project->activity);

        $this->assertEquals('completed_task', $project->activity->last()->description);
    }

    function test_incompleting_a_task_triggers_project_activity()
    {
        $project = ProjectFactory::withTasks(1)
            ->ownedBy($this->signIn())
            ->create();

        $this->patch($project->tasks[0]->path(), [
            'body' => 'test body',
            'completed' => true
        ]);

        $this->assertCount(3, $project->activity);

        $this->patch($project->tasks[0]->path(), [
            'body' => 'test body',
            'completed' => false
        ]);

        $this->assertCount(4, $project->fresh()->activity);

        $this->assertEquals('incompleted_task', $project->fresh()->activity->last()->description);
    }

    function test_deleting_a_task_triggers_activity()
    {
        $project = ProjectFactory::withTasks(1)
            ->ownedBy($this->signIn())
            ->create();

        $project->tasks[0]->delete();

        $this->assertCount(3, $project->activity);
    }
}
