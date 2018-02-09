<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Sofa\Eloquence\Eloquence;

class audio_lookup_value extends Model
{
    use Eloquence;
    protected $searchableColumns = ['audio_lookup_value_tag'];
    protected $fillable = ['audio_lookup_value_tag', 'audio_lookup_value_link', 'archived', 'created_by', 'updated_by'];

    protected $table = "audio_lookup_value";
    protected $primaryKey = 'audio_lookup_value_id';

}
