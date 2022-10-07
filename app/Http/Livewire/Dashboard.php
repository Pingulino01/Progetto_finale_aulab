<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Announcement;
use Livewire\WithPagination;

class Dashboard extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $order = 'ASC';
    public $orderFactor = 'id';
    public $query = '';

    public function orderById()
   {
    $this->orderFactor = 'id';
    $this->order == 'ASC' ? $this->order = 'DESC' : $this->order = 'ASC';

   }

   public function orderByTitle()
   {
    $this->orderFactor = 'title';
    $this->order == 'ASC' ? $this->order = 'DESC' : $this->order = 'ASC';
   }

   public function orderByCategory()
   {
    $this->orderFactor = 'category_id';
    $this->order == 'ASC' ? $this->order = 'DESC' : $this->order = 'ASC';

   }

   public function orderByAccepted()
   {
    $this->orderFactor = 'is_accepted';
    $this->order == 'ASC' ? $this->order = 'DESC' : $this->order = 'ASC';

   }

   public function orderByCreated_at()
   {
    $this->orderFactor = 'created_at';
    $this->order == 'ASC' ? $this->order = 'DESC' : $this->order = 'ASC';

   }

   public function orderByUpdated_at()
   {
    $this->orderFactor = 'updated_at';
    $this->order == 'ASC' ? $this->order = 'DESC' : $this->order = 'ASC';
    }
    


    public function render()
    {


    if($this->query === ''){

            $announcements = Announcement::orderBy($this->orderFactor, $this->order)->paginate(6);
    } else {

            $announcements = Announcement::where('title', 'LIKE', "%$this->query%")->orderBy($this->orderFactor, $this->order)->paginate(3);
    }

        return view('livewire.dashboard',
        [   
            'announcements' => $announcements,
        ]
    );
}














  
}
