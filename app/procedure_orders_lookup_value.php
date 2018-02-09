<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Sofa\Eloquence\Eloquence;

class procedure_orders_lookup_value extends Model
{
    use Eloquence;
    protected $searchableColumns = ['procedure_orders_lookup_value'];
    protected $fillable = ['procedure_orders_lookup_value', 'archived', 'created_by', 'updated_by'];

    protected $table = "procedure_orders_lookup_value";
    protected $primaryKey = 'procedure_orders_lookup_value_id';
}
