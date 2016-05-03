<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public function tasks() {
        # Author has many Books
        # Define a one-to-many relationship.
        return $this->hasMany('\App\Task');
    }

    public static function typesForDropdown() {
        # Get all authors
        $types = \App\Type::orderBy('name','ASC')->get();
        # Build array for author's dropdown
        $types_for_dropdown = [];
        foreach($types as $type) {
            $types_for_dropdown[$type->id] = $type->name;
        }
        return $types_for_dropdown;
    }
}
