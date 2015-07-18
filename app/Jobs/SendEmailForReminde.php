<?php

namespace App\Jobs;

use App\Jobs\Job;
use App\Book;
use App\User;
use Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmailForReminde extends Job implements SelfHandling, ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $book;
    protected $user;
   /**
    * Create a new job instance.
    *
    * @param  User  $user
    * @return void
    */
    public function __construct(User $user, Book $book)
    { 
        $this->user = $user;
        $this->book = $book;
    }

   /**
    * Execute the job.
   */
    public function handle() {
      foreach ($this->user->books as $tBook) {
        if ($tBook->id == $this->book['id']) {
            $data = array(
                          'firstname' => $this->user['firstname'], 
                          'email' => $this->user['email'], 
                          'book_title' => $this->book['title'],
                          'book_author' => $this->book['author'],
                          'book_year' => $this->book['year'],
                          'book_genre' =>$this->book['genre']);

            Mail::send('emails.reminde_to_revert', $data, function ($message) use ($data) {
               $message->to($data['email'], $data['firstname'])->subject('Reminde');
            });
          }
        }
      }
    
}
  

