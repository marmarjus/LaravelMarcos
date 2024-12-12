<?php
/**
 * Modelo de tabla Events
 *
 * Este archivo gestiona la tabla Events
 * para poder usarla en Laravel,
 * además de la relación "muchos a muchos"
 * con la tabla Users.
 *
 * @author Marcos Martínez Justicia
 *
 * @version 1.0
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Event extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
