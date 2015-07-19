<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{ 
    use DatabaseMigrations;


   /**
      * Test redirect to login  user without amon rights
      *
      * @return [type] [description]
      */
    public function testBookGuest()
    {   
    
        $this->visit('/book')
             ->see('Login');
    }

    /**
     *  Check redirect from user without admin rights
     */
    public function testBookUser()
    {   
        $user = factory('App\User')->create();
        $this->actingAs($user)
             ->visit('/book')
             ->see('Login');
  
    }

     /**
      * Test acting with admin rights
      *
      * @return [type] [description]
      */
    public function testBookAdmin()
    {   
        $user = factory('App\User','admin')->create();
        $this->actingAs($user)
             ->visit('/book')
             ->dontSee('Login');
    }

    public function testBookCreate()
    {   
        $user = $user = factory('App\User','admin')->create();
        $this->actingAs($user)
              ->visit('book/create')
              ->type('Bookds', 'title')
              ->type('John' , 'author')
              ->type('1995' , 'year')
              ->type('Fantasy', 'genre')
              ->press('Save')
              ->seePageIs('/book');
    }

    /**
    * @dataProvider provider
    */
    public function testBookCreateWrong($title, $author, $year, $genre)
    {   
        $user = $user = factory('App\User','admin')->create();
        $this->actingAs($user)
              ->visit('book/create')
              ->type($title, 'title')
              ->type($author, 'author')
              ->type($year, 'year')
              ->type($genre, 'genre')
              ->press('Save')
              ->seePageIs('/book/create');
    }


    public function testBookDrop()
    {   
        $user = factory('App\User')->create();
        $book1 = factory('App\Book')->create();
        $book2 = factory('App\Book')->create();
        $user->books()->attach($book1->id);
        $user->books()->attach($book2->id);
        $this->actingAs($user)
               ->visit('user/' . $user->id)
               ->press('Drop');
        foreach ($user->books as $book) {
            if ($book->id == $book1->id) {
                $this->assertTrue(false);
            }
        }
    }

   public function testBookEdit()
    {   
        $user = $user = factory('App\User','admin')->create();
        $book = factory('App\Book')->create();
        $this->actingAs($user)
               ->visit('book/' . $book->id . '/edit')
               ->type('NewBook', 'title')
               ->type('NewAuthor', 'author')
               ->type('1990', 'year')
               ->type('Genre', 'genre')
               ->press('Save')
               ->seePageIs('/book');
    
    }

   /**
    * @dataProvider provider
    */
   public function testBookEditWrong($title, $author, $year, $genre)
    {   
        $user = $user = factory('App\User','admin')->create();
        $book = factory('App\Book')->create();
        $this->actingAs($user)
               ->visit('book/' . $book->id . '/edit')
               ->type($title, 'title')
               ->type($author, 'author')
               ->type($year, 'year')
               ->type($genre, 'genre')
               ->press('Save')
               ->seePageIs('/book/' . $book->id . '/edit');
    
    }

    public function provider() {
        return array(
            array('Tits1le', 'Author', '4332', 'genres'),
            array('Tit2lesd', 'Au1thor', '1232', 'genres'),
            array('itleds1f', 'Author', '123d', 'genres'),
            array('sdf', 'A1uthor', '1232', 'genres')
        );
    }
}
