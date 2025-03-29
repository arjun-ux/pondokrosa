<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PostController extends Controller
{
     // get data posts
     public function getPost(){
        // get data form api
        $base_url = env("API_URL");
        $url = $base_url . "/data-posts";// url api
        $client_id = env("API_ID");
        $client_key = env("API_KEY");

        $response = Http::withHeaders([
            'Client-ID' => $client_id,
            'Client-Key' => $client_key
            ])->get($url);

        $datas = $response->json()['data'] ?? null;
        // dd($datas);

        // data terbaru
        $latest_post = $datas[0];

        // 5 artikel terbaru
        $latest_posts = array_slice($datas, 0, 5);

        // kecualikan data terbaru
        $datas = array_slice($datas, 1);

        // Mengecek apakah permintaan berhasil
        if ($response->successful() && !empty($datas)) {
            // Mengembalikan data yang diterima
            return view('blog', compact('datas', 'latest_post', 'latest_posts'));
        } else {
            // notif
            session()->flash('message', 'Tidak ada post atau gagal mengambil data.');

            // Kembalikan ke halaman post dengan data kosong atau null
            return view('blog', compact('datas', 'latest_post', 'latest_posts'));
        }
    }

    // get post by slug
    public function getPostBySlug(Request $request){
        $base_url = env("API_URL");
        $url = $base_url . "/get-post";// url api
        $client_id = env("API_ID");
        $client_key = env("API_KEY");


        $slug = $request['slug'];


        $response = Http::withHeaders([
            'Client-ID' => $client_id,
            'Client-Key' => $client_key
        ])->post($url, [
            'slug' => $slug
        ]);

        $data = $response->json()?? null;

        // Mengecek apakah permintaan berhasil
        if ($response->successful() && !empty($data)) {
            // Mengembalikan data yang diterima
            // return response()->json($response->json());
            return view('detail-blog', compact('data'));
        } else {
            // notif
            session()->flash('message', 'Tidak ada post atau gagal mengambil data.');

            // Kembalikan ke halaman post dengan data kosong atau null
            return view('detail-blog', compact('data'));
        }
    }
}
