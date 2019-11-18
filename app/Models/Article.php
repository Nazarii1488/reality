<?php


namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;


class Article extends Model
{
    protected $table = 'article';
    protected $quarded = [];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function images()
    {
        return $this->hasMany(ImageArticle::class);
    }
    public function preview()
    {
        $path = '';
        foreach ($this->images as $image){
            $path = 'storage/articles/'.$this->id.'/'.$image->name;
            break;
        }
        return $path;
    }
}
