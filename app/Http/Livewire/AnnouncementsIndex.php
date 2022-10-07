<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Announcement;
use Livewire\WithPagination;

class AnnouncementsIndex extends Component{
    
    // use WithPagination;
    
    // protected $paginationTheme = 'bootstrap';



    public $search = '';
    public $order = 'DESC';
    public $orderFactor = 'created_at';
    



    
    //    public function orderByCategory()
//    {
//     $this->orderFactor = 'category_id';
//     $this->order == 'ASC' ? $this->order = 'DESC' : $this->order = 'ASC';

//    }

//    public function orderByAccepted()
//    {
    //     $this->orderFactor = 'is_accepted';
    //     $this->order == 'ASC' ? $this->order = 'DESC' : $this->order = 'ASC';
    
    //    }
    
//    public function orderByCreated_at()
//    {
    //     $this->orderFactor = 'created_at';
    //     $this->order == 'ASC' ? $this->order = 'DESC' : $this->order = 'ASC';
    
    //    }
    
//    public function orderByUpdated_at()
//    {
//     $this->orderFactor = 'updated_at';
//     $this->order == 'ASC' ? $this->order = 'DESC' : $this->order = 'ASC';
//     }

// public function search()
// {
    
    
    // }
    
    
    public function orderByPrice()
    {
       
     $this->orderFactor = 'price';
     $this->order == 'DESC' ? $this->order = 'ASC' : $this->order = 'DESC';

    }

    public function mount($search)
    {
        $this->search = $search;
    }
    
    
    public function render()
    {
        if($this->search === ''){
            $announcements = Announcement::where('is_accepted', true)->orderBy($this->orderFactor, $this->order)->paginate(5);
       } else {
           $announcements = Announcement::search($this->search)->where('is_accepted', true)->orderBy($this->orderFactor, $this->order)->paginate(5);
       }

       return view('livewire.announcements-index',
           [   
               'announcements' => $announcements,
           ]
       );
   }
   
}
