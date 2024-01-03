<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Response;

class SitemapController extends Controller
{
    public function index()
    {
        
        $urls = [
            '/',
            '/about',
            '/contact',
            '/campaigns',
            '/coupons',
            '/carts',
            '/login',
            '/register',
            '/blogs'
        ];
        // Start building the XML content for the sitemap
        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . PHP_EOL;

        // Generate XML nodes for each URL
        foreach ($urls as $url) {
            $xml .= '<url>' . PHP_EOL;
            $xml .= '<loc>' . url($url) . '</loc>' . PHP_EOL;
            $xml .= '<lastmod>2024-01-16T07:42:40+00:00</lastmod>' . PHP_EOL;
            $xml .= '<priority>0.8</priority>' . PHP_EOL; // Set priority as needed
            $xml .= '</url>' . PHP_EOL;
        }

        // Close the XML structure
        $xml .= '</urlset>';
          // Return the sitemap XML content with appropriate headers
          return Response::make($xml, 200, [
              'Content-Type' => 'application/xml'
          ]);
    }
}
