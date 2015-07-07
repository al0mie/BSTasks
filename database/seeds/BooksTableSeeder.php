<?php



use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	for ($i = 0; $i < 100; $i++) { 
    		DB::table('books')->insert([
            'title' => 'Book #'. $i,
            'author' => 'Author #' . $i,
            'year' => $i*$i,
            'genre' => 'genre '.$i
        ]); 
    	}
    	
    }
}
