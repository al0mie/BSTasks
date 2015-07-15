<?php

namespace App\Jobs;

use App\Jobs\Job;
use App\Book;
use App\User;
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
    * @param  Mailer  $mailer
    * @return void
    */
    public function handle(Mailer $mailer) {
        $users = User::all();
        foreach ($users as $user) {
            $data = array('firstname' => $user->firstname, 
                          'email' => $user->email, 
                          'book_title' => $this->book['title'],
                          'book_author' => $this->book['author'],
                          'book_year' => $this->book['year'],
                          'book_genre' =>$this->book['genre']);

            $mailer->queue('emails.notification_new_book', $data, function ($message) use ($data) {
                $message->to($data['email'], '')
                    ->subject('New book was added!');
            });
        }
    }
}
