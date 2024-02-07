<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            ['name' => 'Music'],
            ['name' => 'Festival'],
            ['name' => 'Rock'],
            ['name' => 'Psychedelic'],
            ['name' => 'Counterculture'],
            ['name' => 'Peace'],
            ['name' => 'Love'],
            ['name' => 'Summer'],
            ['name' => 'Art'],
            ['name' => 'Consciousness'],
            ['name' => 'Celebration'],
        ];

        foreach ($tags as $tag) {
            $newTag = new Tag();
            $newTag->fill($tag);
            $newTag->save();
        }
    }
}
