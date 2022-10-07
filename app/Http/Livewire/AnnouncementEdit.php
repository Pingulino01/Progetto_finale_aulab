<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Jobs\ResizeImage;
use App\Models\Announcement;

class AnnouncementEdit extends Component
{
    public $announcementId;
    public $title;
    public $body;
    public $price;
    public $telephone;
    public $category_id;
    public $prefix;
    public $images = [];
    public $temporary_images;
    public $image;

    protected $rules=[
        'title'=>'required|min:5|max:100',
        'body'=>'required|min:10|max:500',
        'price'=>'required|numeric|max:999999',
        'category_id'=>'required',
        'images.*'=>'image|max:1024',
        'temporary_images.*'=>'image|max:1024'
        
    ];

    protected $messages=[
        'title.required'=>'Il Titolo è obbligatorio',
        'title.min'=>'Il Titolo deve avere almeno 5 caratteri',
        'title.max'=>'Il Titolo può avere massimo 100 caratteri',
        'body.required'=>'La descrizione è obbligatoria',
        'body.min'=>'La descrizione deve avere almeno 10 caratteri',
        'body.max'=>'La descrizione può avere massimo 500 caratteri',
        'price.required'=>'Il prezzo è obbligatorio',
        'price.numeric'=>'Il prezzo deve essere numerico',
        'price.max'=>'Il prezzo deve avere massimo 8 cifre compresa la virgola',
        'telephone.numeric'=>'Il numero di telefono deve essere numerico',
        'telephone.min'=>'Il numero di telefono deve avere minimo 10 cifre',
        'telephone.max'=>'Il numero di telefono deve avere massimo 10 cifre',
        'category_id.required'=>'La categoria è obbligatoria',
        'temporary_images.*.max'=>'L\'immagine dev\'essere massimo di 1mb',
        'temporary_images.*.image'=>'I file devono essere immagini',
        'temporary_images.required'=>'L\'immagine è richiesta',
        'images.image'=>'L\'immagine dev\'essere un\'immagine',
        'images.max'=>'L\'immagine dev\'essere massimo di 1mb'

    ];


    public function updatedTemporaryImages(){
        if($this->validate([
            'temporary_images.*'=>'image|max:1024'
        ])) {
            foreach ($this->temporary_images as $image) {
                $this->images[] = $image;
            }
        };
    }

    public function removeImage($key){
        if (in_array($key, array_keys($this->images))) {
            unset($this->images[$key]);
        }
    }

    public function updateAnnouncement(){
        $this->validate();
        $this->category=Category::find($this->category_id);
        $this->announcement = $this->category->announcements()->create([
                    'title'=>$this->title,
                    'body'=>$this->body,
                    'price'=>$this->price,
                    'telephone'=>$this->telephone,
                    'prefix'=>$this->prefix
                ]);

        if(count($this->images)){
            foreach($this->images as $image){
                // $this->announcement->images()->create(['path'=>$image->store('images', 'public')]);
                $newFileName = "announcements/{$this->announcement->id}";
                $newImage = $this->announcement->images()->create(['path'=>$image->store($newFileName, 'public')]);
                // dd($newImage->path);
                dispatch(new ResizeImage($newImage->path, 300, 300));
                dispatch(new ResizeImage($newImage->path, 400, 300));
            }

            File::deleteDirectory(storage_path('/app/livewire-tmp'));
        } else {
            $this->announcement->images()->create(['path'=>'images/default.jpg']);
            
        }
        $this->announcement->user()->associate(Auth::user());
        $this->announcement->save();
        $this->cleanForm();
        return redirect(route('welcome'))->with('message',"L'articolo è stato inserito correttamente. Grazie!");
    }

    public function mount($announcementId)
    {
        $announcement = Announcement::find($announcementId);
        $this->announcementId = $announcementId->id;
        $this->title = $article->title;
        $this->subtitle = $article->subtitle;
        $this->body = $article->body;
        $this->price = $article->price;
        $this->body = $article->body;
        $this->telephone = $article->telephone;
        $this->category_id = $article->category_id;
        $this->prefix = $article->prefix;
        $this->images = $article->images;
        $this->temporary_images = $article->temporary_images;
        $this->image = $article->image;
    }

    public function render()
    {
        return view('livewire.announcement-edit');
    }
}
