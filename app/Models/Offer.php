<?php


namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;


class Offer extends Model
{
    protected $table = 'offers';
    protected $quarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function images()
    {
        return $this->hasMany(ImageOffer::class);
    }
    public function preview()
    {
        $path = '';
        foreach ($this->images as $image){
            $path = 'storage/offers/'.$this->id.'/'.$image->name;
            break;
        }
        return $path;
    }
}
