<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\File;

class CategorySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $cat1 = new Category();
      $cat1->reference = 'test';
      $cat1->name = 'Test';

      $cat1->save();

      $cat2 = new Category();
      $cat2->reference = 'sub1';
      $cat2->name = 'sub1';

      $cat1->children()->save($cat2);

      $file = new File();
      $file->reference = 'subfile';
      $file->filename = 'subfile.md';

      $cat2->file()->save($file);
    }
}
