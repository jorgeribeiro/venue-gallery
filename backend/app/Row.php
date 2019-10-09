<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Unnecessary model. Delete later
 */
class Row extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'image', 'discount_percentage',
    ];

    public function __construct($data) {
    	parent::__construct($data);
    }
}
