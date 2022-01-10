<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Cloth;
use App\Models\Detail;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        //Cloth Categories
        Category::create([
            'category' => 'Men',
            'image'    => 'pi2.jpg'
        ]);

        Category::create([
            'category' => 'Women',
            'image'    => 'pi3.jpg',
        ]);

        Category::create([
            'category' => 'Kids',
            'image'    => 'pi1.jpg',
        ]);

        Category::create([
            'category' => 'Others',
            'image'    => 'pi4.jpg',
        ]);

        //Men Cloths (examples)
        Cloth::create([
            'category_id'   => 1,
            'image'         => 'pi2.jpg',
            'name'          => 'White Stripped T-Shirt Pria',
            'slug'          => 'white-stripped-t-shirt-pria',
            'price'         => '299000'
        ]);

        Cloth::create([
            'category_id'   => 1,
            'image'         => 'pi4.jpg',
            'name'          => 'Kaos Biru Tua Pria',
            'slug'          => 'kaos-biru-Tua-pria',
            'price'         => '199000'
        ]);

        //Women Cloths (examples)
        Cloth::create([
            'category_id'   => 2,
            'image'         => 'pi3.jpg',
            'name'          => 'Kaos Polos Wanita',
            'slug'          => 'kaos-polos-wanita',
            'price'         => '349000'
        ]);

        //Kids Cloths (examples)
        Cloth::create([
            'category_id'   => 3,
            'image'         => 'pi1.jpg',
            'name'          => 'Kaos Hitam Putih Anak Perempuan',
            'slug'          => 'kaos-hitam-putih-anak-perempuan',
            'price'         => '249000'
        ]);

        //Others Cloths (examples)
        Cloth::create([
            'category_id'    => 4,
            'image'          => 'pi4.jpg',
            'name'           => 'Kaos Biru Muda Pria',
            'slug'           => 'kaos-biru-muda-pria',
            'price'          => '249000'
        ]);

        //Details Cloths
        Detail::create([
            'cloth_id'    => 1,
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'
        ]);

        Detail::create([
            'cloth_id'    => 2,
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'
        ]);

        Detail::create([
            'cloth_id'    => 3,
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'
        ]);

        Detail::create([
            'cloth_id'    => 4,
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'
        ]);

        Detail::create([
            'cloth_id'    => 5,
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'
        ]);
    }
}
