<?php
namespace App;

use DateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

/**
 * Class News
 *
 * @package App
 * @property string $name
 * @property datetime $created_at
 * @property string $description
 * @property string $picture
 */
class News extends Model
{
    use Notifiable;
    protected $fillable = ['name', 'created_at', 'description', 'picture', 'size', 'mime'];


    /**
     * Get all of the models from the database.
     *
     * @param  array|mixed  $columns
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function all($columns = ['*'])
    {
        return (new static)->newQuery()->get(
            is_array($columns) ? $columns : func_get_args()
        );
    }
}
