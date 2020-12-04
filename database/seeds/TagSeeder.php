<?php

use App\Model\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = collect([
            [
                'name' => 'Organização',
                'label' => 'organization'
            ],
            [
                'name' => 'Planejamento',
                'label' => 'planning'
            ],
            [
                'name' => 'Colaboração',
                'label' => 'collaboration'
            ],
            [
                'name' => 'Escrita',
                'label' => 'writing'
            ],
            [
                'name' => 'Calendário',
                'label' => 'calendar'
            ],
            [
                'name' => 'Api',
                'label' => 'api'
            ],
            [
                'name' => 'Json',
                'label' => 'json'
            ],
            [
                'name' => 'Schema',
                'label' => 'schema'
            ],
            [
                'name' => 'Node',
                'label' => 'node'
            ],
            [
                'name' => 'Github',
                'label' => 'github'
            ],
            [
                'name' => 'Rest',
                'label' => 'rest'
            ],
            [
                'name' => 'Web',
                'label' => 'web'
            ],
            [
                'name' => 'Framework',
                'label' => 'framework'
            ],
            [
                'name' => 'Http2',
                'label' => 'http2'
            ],
            [
                'name' => 'Https',
                'label' => 'https'
            ],
            [
                'name' => 'Localhost',
                'label' => 'localhost'
            ]
        ]);

        $tags->each(function($tag)
        {
            Tag::create($tag);
        });

    }
}
