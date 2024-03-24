<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'Ludgerdusl@gmail.com',
            'password' => bcrypt('12345678'),
        ]);

        'DB'::table('kategori')->insert([
            'nama_kategori' => 'Nasional'
        ]);
        
        'DB'::table('berita')->insert([
            'judul_berita' => 'Lorem ipsum',
            'isi_berita' => 'Lorem ipsum',
            'gambar_berita' => 'lorem.jpg',
            'id_kategori' => 1
        ]);

        'DB'::table('page')->insert([
            'judul_page' => 'Lorem ipsum',
            'isi_page' => 'Lorem ipsum',
            'status_page' => 1
        ]);

        'DB'::table('menu')->insert([
            'nama_menu' => 'Lorem',
            'jenis_menu' => 'page',
            'url_menu' => '1',
            'target_menu' => 'blank',
            'urutan_menu' => 1
        ]);

        'DB'::table('menu')->insert([
            'nama_menu' => 'Google',
            'jenis_menu' => 'url',
            'url_menu' => 'https://www.google.com',
            'target_menu' => 'blank',
            'urutan_menu' => 2
        ]);

        'DB'::table('menu')->insert([
            'nama_menu' => 'Cloud Storage',
            'jenis_menu' => 'url',
            'url_menu' => '#',
            'target_menu' => '_self',
            'urutan_menu' => 3
        ]);

        'DB'::table('menu')->insert([
            'nama_menu' => 'Cloud Storage',
            'jenis_menu' => 'url',
            'url_menu' => 'https://cloud.google.com',
            'target_menu' => '_self',
            'urutan_menu' => 1,
            'parent_menu' => 3
        ]);

        'DB'::table('menu')->insert([
            'nama_menu' => 'AWS',
            'jenis_menu' => 'url',
            'url_menu' => 'https://aws.amazon.com',
            'target_menu' => '_self',
            'urutan_menu' => 2,
            'parent_menu' => 3
        ]);
    }
}
