<?php

namespace Muan\Tags\Console\Commands;

use Illuminate\Console\Command;
use Muan\Tags\Models\Tag;

/**
 * Class TagCreateCommand
 * @package Muan\Tags\Console\Commands
 */
class TagCreateCommand extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tag:create 
        {title : Title of tags}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create tag';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if (($title = $this->argument('title')) && !$this->hasTag($title)) {
            $this->createTag($title);
            $this->info("Tag '{$title}' created!");
        }

        return 0;
    }

    /**
     * Has tag
     *
     * @param string $title
     * @return bool
     */
    public function hasTag(string $title) : bool
    {
        return (bool) Tag::where('title', $title)
            ->orWhere('slug', str_slug($title))
            ->first();
    }

    /**
     * Create tag
     *
     * @param string $title
     * @return Tag
     */
    private function createTag(string $title) : Tag
    {
        return Tag::create([
            'title' => $title,
            'slug' => str_slug($title)
        ]);
    }

}
