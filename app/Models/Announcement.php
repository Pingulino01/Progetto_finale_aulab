<?php

namespace App\Models;

use App\Models\User;
use App\Models\Image;
use App\Models\Prefix;
use App\Models\Category;
use App\Models\Announcement;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Announcement extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        'title', 'price' , 'body' , 'telephone', 'category_id', 'prefix_id',
    ];

    public function toSearchableArray(){
        $category = $this->category;
        $array = [
            'id' => $this->id,
            'title' => $this->title,
            'body' => $this->body,
            'category' => $category,
            
        ];
        
        return $array;
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function setAccepted($value){
        $this->is_accepted=$value;
        $this->save();
        return true;
    }

    public static function toBeRevisionedCount(){
        return Announcement::where('is_accepted', null)->count();
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
    
    public function prefix(){
        return $this->belongsTo(Prefix::class);
    }

    public function images(){
        return $this->hasMany(Image::class);
    }
}
