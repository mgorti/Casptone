<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Sofa\Eloquence\Eloquence;

class image_lookup_value extends Model
{
    use Eloquence;
    protected $searchableColumns = ['image_lookup_value_tag'];
    protected $fillable = ['image_lookup_value_tag', 'image_lookup_value_link', 'archived', 'created_by', 'updated_by'];

    protected $table = "image_lookup_value";
    protected $primaryKey = 'image_lookup_value_id';

}
