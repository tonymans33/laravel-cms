<?php

use App\Category;
use App\Post;
use App\Tag;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $author1 = User::create([
           'name' => 'John Doe',
           'email' => 'john@doe.com',
           'password' => Hash::make('123123123')
        ]);

        $author2 = User::create([
            'name' => 'Jane Doe',
            'email' => 'jane@doe.com',
            'password' => Hash::make('123123123')
        ]);

        $category1 = Category::create([
            'name' => 'News'
        ]);
        $category2 = Category::create([
            'name' => 'Marketing'
        ]);
        $category3 = Category::create([
            'name' => 'Partnership'
        ]);

        $tag1 = Tag::create([
            'name' => 'job'
        ]);

        $tag2 = Tag::create([
            'name' => 'customers'
        ]);

        $tag3 = Tag::create([
            'name' => 'record'
        ]);




        $post1 = Post::create([
            'title' => 'The standard Lorem Ipsum passage, used since the 1500s',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.',
            'body' => 'minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'category_id' => $category1->id,
            'image' => 'posts/1.jpg',
            'user_id' => $author1->id
        ]);

        $post1->tags()->attach([$tag1->id,$tag2->id ]);

        $post2 = Post::create([
            'title' => 'de Finibus Bonorum et Malorum", written by Cicero in 45 BC',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.',
            'body' => 'minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'category_id' => $category2->id,
            'image' => 'posts/2.jpg',
            'user_id' => $author2->id
        ]);
        $post2->tags()->attach([$tag3->id,$tag1->id ]);

        $post3 = Post::create([
            'title' => 'At vero eos et accusamus et iusto odio dignissimos ',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.',
            'body' => 'minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'category_id' => $category3->id,
            'image' => 'posts/3.jpg',
            'user_id' => $author1->id
        ]);
        $post3->tags()->attach([$tag1->id,$tag3->id ]);

        $post4 = $author2->posts()->create([
            'title' => '1914 translation by H. Rackham',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.',
            'body' => 'minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'category_id' => $category2->id,
            'image' => 'posts/4.jpg'
        ]);
        $post4->tags()->attach([$tag2->id,$tag3->id ]);

    }
}
