<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Sofa\Eloquence\Eloquence;

class video_lookup_value extends Model
{
    use Eloquence;
    protected $searchableColumns = ['video_lookup_value_tag'];
    protected $fillable = ['video_lookup_value_tag', 'video_lookup_value_link', 'archived', 'created_by', 'updated_by'];

    protected $table = "video_lookup_value";
    protected $primaryKey = 'video_lookup_value_id';
}
