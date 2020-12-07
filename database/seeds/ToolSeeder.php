<?php

use App\Models\Tool;
use Illuminate\Database\Seeder;

class ToolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tools = collect([
            [
                'title' => 'Notion',
                'link' => 'https://notion.so',
                'description' => 'All in one tool to organize teams and ideas. Write, plan, collaborate, and get organized.',
                'tags' => [
                    '1',
                    '2',
                    '3',
                    '5',
                    '6'
                ]
            ],
            [
                'title' => 'json-server',
                'link' => 'https://github.com/typicode/json-server',
                'description' => 'Fake REST API based on a json schema. Useful for mocking and creating APIs for front-end devs to consume in coding challenges.',
                'tags' => [
                    '6',
                    '7',
                    '8',
                    '9',
                    '10',
                    '11'
                ]
            ],
            [
                'title' => 'fastify',
                'link' => 'https://www.fastify.io/',
                'description' => 'Extremely fast and simple, low-overhead web framework for NodeJS. Supports HTTP2.',
                'tags' => [
                    '12',
                    '13',
                    '9',
                    '14',
                    '15',
                    '16'
                ]
            ]
        ]);

        $tools->each(function($tool)
        {
            $toolCreated = Tool::create([
                'title' => $tool['title'],
                'link' => $tool['link'],
                'description' => $tool['description'],
            ]);
            $toolCreated->tags()->sync($tool['tags']);
        });
    }
}
