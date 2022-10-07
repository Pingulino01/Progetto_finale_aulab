<?php

namespace App\Http\Livewire;

use App\Models\Prefix;
use Livewire\Component;
use App\Models\Category;
use App\Jobs\RemoveFaces;
use App\Jobs\ResizeImage;
use App\Models\Announcement;
use Livewire\WithFileUploads;
use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CreateAnnouncement extends Component
{

    use WithFileUploads;

    public $title;
    public $body;
    public $price;
    public $telephone;
    public $category_id;
    public $prefix;
    public $images = [];
    public $temporary_images;
    public $image;

    // public function store(){
    //     // dd($this->title, $this->body, $this->price, $this->category_id);
    //     $this->validate();
    //     $category = Category::find($this->category_id);
    //     $prefix = Prefix::find($this->prefix);
    //     $announcement = $category->announcements()->create([

    //         'title'=>$this->title,
    //         'body'=>$this->body,
    //         'price'=>$this->price,
    //         'category_id'=>$this->category_id,
    //         'telephone'=>$this->telephone,
    //         'prefix'=>$this->prefix
    //     ]);

    //     Auth::user()->announcements()->save($announcement);
    //     $this->reset();
    //     return redirect(route('welcome'))->with('message',"L'articolo è stato inserito correttamente. Grazie!");       
    // }

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

    public function store(){
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

                
                RemoveFaces::withChain([
                    new ResizeImage($newImage->path, 635, 300),
                    new ResizeImage($newImage->path, 400, 300),
                    new ResizeImage($newImage->path, 350, 250),
                    new GoogleVisionSafeSearch($newImage->id),
                    new GoogleVisionLabelImage($newImage->id)
                ])->dispatch($newImage->id);
            }

            File::deleteDirectory(storage_path('/app/livewire-tmp'));
        } else {
            $this->announcement->images()->create(['path'=>'images/default.jpg']);
            
        }
        $this->announcement->user()->associate(Auth::user());
        $this->announcement->save();
        $this->cleanForm();
        return redirect(route('welcome'))->with('message',"L'articolo è stato inserito correttamente. Verrà preso in carico da un revisore.");
    }
// Image::get()
    public function cleanForm(){
        $this->title='';
        $this->body='';
        $this->category='';
        $this->image='';
        $this->images=[];
        $this->temporary_images=[];
        $this->telephone='';
        $this->prefix='';
        $this->form_id=rand();
    }

    public function render(){
        return view('livewire.create-announcement');
    }



    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }


}
