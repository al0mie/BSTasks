<?php



use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        
    	for ($i = 0; $i < 100; $i++) { 
    		DB::table('books')->insert([
                'title' => 'Book'.$faker->word,
                'author' => $faker->lastName,
                'year' => $faker->year,
                'genre' => 'genre '
        ]); 
    	}
    	
    }
}
