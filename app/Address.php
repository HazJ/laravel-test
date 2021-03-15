<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Address extends Model
{
    protected $guarded = []; // Disable model guarding

    public function contact(): BelongsTo
    {
        // Ideally: I would use morph here as an Address could belong to a User, Contact, Company or whatever
        return $this->belongsTo(Contact::class);
    }
}
