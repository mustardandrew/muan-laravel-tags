<?php

namespace Muan\Tags\Traits;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Muan\Tags\Models\Tag;

/**
 * Trait Taggable
 *
 * @package App\Tags\Traits
 *
 * @property Collection $tags
 */
trait Taggable
{
    /**
     * Relation to tags
     *
     * @return MorphToMany
     */
    public function tags() : MorphToMany
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    /**
     * Has tag
     *
     * @param string $title
     * @return bool
     */
    public function hasTag(string $title) : bool
    {
        return $this->tags->contains(function (Tag $tag) use (&$title) {
            return in_array($title, [$tag->title, $tag->slug], true);
        });
    }

}
