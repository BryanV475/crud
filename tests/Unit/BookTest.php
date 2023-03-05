<?php

namespace Tests\Unit;


use App\Models\Book;
use Tests\TestCase; //this
use Illuminate\Foundation\Testing\RefreshDatabase;


class BookTest extends TestCase

{
    use RefreshDatabase;
    /** @test */
    public function it_can_create_a_book()
    {
        $bookData = [
            'name' => 'Test book',
            'author' => 'Test author',
            'genre' => 'Test genre',
            'sinopsis' => 'Test sinopsis',
            'restriction' => 18,
            'main' => 'Test main',
            'secondary' => 'Test secondary',
        ];

        $response = $this->post('api/books', $bookData);

        $response->assertStatus(201)
            ->assertJsonFragment($bookData);

        $this->assertDatabaseHas('books', $bookData);
    }

    /** @test */
    public function it_can_show_a_book()
    {
        $book = Book::factory()->create();

        $response = $this->get('api/books/' . $book->id);

        $response->assertStatus(200)
            ->assertJsonFragment($book->toArray());
    }

    /** @test */
    public function it_can_update_a_book()
    {
        $book = Book::factory()->create();

        $bookData = [
            'name' => 'Updated name',
            'author' => 'Updated author',
            'genre' => 'Updated genre',
            'sinopsis' => 'Updated sinopsis',
            'restriction' => 18,
            'main' => 'Updated main',
            'secondary' => 'Updated secondary',
        ];

        $response = $this->put('api/books/' . $book->id, $bookData);

        $response->assertStatus(200)
            ->assertJsonFragment($bookData);

        $this->assertDatabaseHas('books', $bookData);
    }

    /** @test */
    public function it_can_delete_a_book()
    {
        $book = Book::factory()->create();

        $response = $this->delete('api/books/' . $book->id);

        $response->assertStatus(200)
            ->assertSee('deleted succesfully');

        $this->assertDatabaseMissing('books', $book->toArray());
    }

    /** @test */
    public function it_can_list_all_books()
    {

        $books = Book::factory()->count(8)->create();

        $response = $this->get('api/books');

        $response->assertStatus(200)
            ->assertJsonCount($books->count());
    }

}
