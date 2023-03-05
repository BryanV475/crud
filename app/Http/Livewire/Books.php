<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Book;

class Books extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $name, $author, $genre, $sinopsis, $restriction, $main, $secondary;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.books.view', [
            'books' => Book::latest()
						->orWhere('name', 'LIKE', $keyWord)
						->orWhere('author', 'LIKE', $keyWord)
						->orWhere('genre', 'LIKE', $keyWord)
						->orWhere('sinopsis', 'LIKE', $keyWord)
						->orWhere('restriction', 'LIKE', $keyWord)
						->orWhere('main', 'LIKE', $keyWord)
						->orWhere('secondary', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->name = null;
		$this->author = null;
		$this->genre = null;
		$this->sinopsis = null;
		$this->restriction = null;
		$this->main = null;
		$this->secondary = null;
    }

    public function store()
    {
        $this->validate([
		'name' => 'required',
		'author' => 'required',
		'genre' => 'required',
		'sinopsis' => 'required',
		'restriction' => 'required',
		'main' => 'required',
		'secondary' => 'required',
        ]);

        Book::create([ 
			'name' => $this-> name,
			'author' => $this-> author,
			'genre' => $this-> genre,
			'sinopsis' => $this-> sinopsis,
			'restriction' => $this-> restriction,
			'main' => $this-> main,
			'secondary' => $this-> secondary
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Book Successfully created.');
    }

    public function edit($id)
    {
        $record = Book::findOrFail($id);
        $this->selected_id = $id; 
		$this->name = $record-> name;
		$this->author = $record-> author;
		$this->genre = $record-> genre;
		$this->sinopsis = $record-> sinopsis;
		$this->restriction = $record-> restriction;
		$this->main = $record-> main;
		$this->secondary = $record-> secondary;
    }

    public function update()
    {
        $this->validate([
		'name' => 'required',
		'author' => 'required',
		'genre' => 'required',
		'sinopsis' => 'required',
		'restriction' => 'required',
		'main' => 'required',
		'secondary' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Book::find($this->selected_id);
            $record->update([ 
			'name' => $this-> name,
			'author' => $this-> author,
			'genre' => $this-> genre,
			'sinopsis' => $this-> sinopsis,
			'restriction' => $this-> restriction,
			'main' => $this-> main,
			'secondary' => $this-> secondary
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Book Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Book::where('id', $id)->delete();
        }
    }
}