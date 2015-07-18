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

class SendEmailForNotification extends Job implements SelfHandling, ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $book;
  
   /**
    * Create a new job instance.
    *
    * @param  User  $user
    * @return void
    */
    public function __construct(Book $book)
    {
        $this->book = $book;
    }

   /**
    * Execute the job.
    *
    */
    public function handle() {
        $users = User::all();
        foreach ($users as $user) {
            $data = array('firstname' => $user->firstname, 
                          'email' => $user->email, 
                          'book_title' => $this->book['title'],
                          'book_author' => $this->book['author'],
                          'book_year' => $this->book['year'],
                          'book_genre' =>$this->book['genre']);
            Mail::send('emails.notification_new_book', $data, function ($message) use ($data) {
                $message->to($data['email'], $data['firstname'])
                    ->subject('New book was added!');
            });
        }
    }
}

