<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{
    // API credentials and base URL
    private $baseUrl;
    private $clientId;
    private $clientKey;

    // Constructor to initialize API credentials
    public function __construct()
    {
        $this->baseUrl = env("API_URL");
        $this->clientId = env("API_ID");
        $this->clientKey = env("API_KEY");
    }

    /**
     * Make an API request with proper headers
     *
     * @param string $endpoint The API endpoint
     * @param array $params Optional parameters for the request
     * @param string $method HTTP method (get/post)
     * @return \Illuminate\Http\Client\Response
     */
    private function makeApiRequest($endpoint, $params = [], $method = 'get')
    {
        $url = $this->baseUrl . $endpoint;

        $request = Http::withHeaders([
            'Client-ID' => $this->clientId,
            'Client-Key' => $this->clientKey
        ]);

        if ($method === 'post') {
            return $request->post($url, $params);
        }

        return $request->get($url);
    }

    /**
     * Get all posts for the blog page
     *
     * @return \Illuminate\View\View
     */
    public function getPost()
    {
        // Check if data exists in cache
        $cacheKey = 'blog-posts-data';
        if (Cache::has($cacheKey)) {
            $cachedData = Cache::get($cacheKey);
            return view('blog', $cachedData);
        }

        // If not in cache, make the API request
        $response = $this->makeApiRequest('/data-posts');
        $datas = $response->json()['data'] ?? [];

        // Default values if no data
        $latest_post = [];
        $latest_posts = [];

        // Process data if available
        if (!empty($datas)) {
            // Get the latest post
            $latest_post = $datas[0] ?? [];

            // Get 5 latest posts for sidebar
            $latest_posts = array_slice($datas, 0, 5);

            // Exclude latest post from main listing
            $datas = array_slice($datas, 1);
        }

        if (!$response->successful() || empty($datas)) {
            session()->flash('message', 'Tidak ada post atau gagal mengambil data.');
        }

        // Store the data in an array for caching
        $viewData = compact('datas', 'latest_post', 'latest_posts');

        // Cache the data for 5 minutes
        Cache::put($cacheKey, $viewData, 300);

        return view('blog', $viewData);
    }

    /**
     * Get a specific post by slug
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function getPostBySlug(Request $request)
    {
        $slug = $request['slug'];
        $cacheKey = "blog-post-{$slug}";

        // Check if data exists in cache
        if (Cache::has($cacheKey)) {
            $cachedData = Cache::get($cacheKey);
            return view('detail-blog', $cachedData);
        }

        // If not in cache, make the API request
        $response = $this->makeApiRequest('/get-post', ['slug' => $slug], 'post');
        $data = $response->json() ?? [];

        if (!$response->successful() || empty($data)) {
            session()->flash('message', 'Tidak ada post atau gagal mengambil data.');
        }

        // Increment view count if successful
        if ($response->successful() && !empty($data)) {
            // This could be another API call to increment views if needed
        }

        // Store the data in an array for caching
        $viewData = compact('data');

        // Cache the data for 30 minutes
        Cache::put($cacheKey, $viewData, 1800);

        return view('detail-blog', $viewData);
    }
}
