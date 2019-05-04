<?php

namespace Muan\Tags\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tag
 *
 * @package Muan\Tags\Models
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 */
class Tag extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
    ];
}
