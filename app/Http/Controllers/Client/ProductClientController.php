<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductClientController extends Controller
{
    public function show($id)
    {
        //dữ liệu đây chỉ là để test layout thôi
        $product = (object) [
            'id' => $id,
            'name' => 'Apple Watch Series 7',
            'stock' => 18,
            'rating' => 4.5,
            'review_count' => 4,
            'old_price' => 82000,
            'new_price' => 54000,
            'discount' => 12,
            'description' => 'Shop Harry.com for every day low prices. Free shipping on orders $35+ or Pickup In-store and get',
            'sku' => '29045-SB-8',
            'categories' => [
                (object) ['name' => 'Bag', 'url' => '#'],
                (object) ['name' => 'Ladies Bag', 'url' => '#'],
                (object) ['name' => 'Handbags', 'url' => '#'],
            ],
            'tags' => [
                (object) ['name' => 'Bag', 'url' => '#'],
                (object) ['name' => 'Woman', 'url' => '#'],
                (object) ['name' => 'fashion', 'url' => '#'],
            ],
            'images' => [
                (object) [
                    'main' => 'assets/img/product-details/product-details-1.png',
                    'thumbnail' => 'assets/img/product-details/product-details-sm-1.png',
                ],
                (object) [
                    'main' => 'assets/img/product-details/product-details-2.png',
                    'thumbnail' => 'assets/img/product-details/product-details-sm-2.png',
                ],
                (object) [
                    'main' => 'assets/img/product-details/product-details-3.png',
                    'thumbnail' => 'assets/img/product-details/product-details-sm-3.png',
                ],
                (object) [
                    'main' => 'assets/img/product-details/product-details-4.png',
                    'thumbnail' => 'assets/img/product-details/product-details-sm-4.png',
                ],
            ],
            'additional_info' => [
                'Brand' => 'Apple',
                'Style' => 'GPS',
                'Screen Size' => '41 Millimeters',
                'Color' => 'Green Aluminum Case with Clover Sport Band',
                'Compatible Devices' => 'Smartphone',
                'Special Feature' => 'Activity Tracker, Heart Rate Monitor, Sleep Monitor, Blood Oxygen',
                'Capacity' => '32GB',
            ],
            'reviews' => [
                (object) [
                    'user_name' => 'Michelle Hunter',
                    'avatar' => 'assets/img/blog/comment-avata-1.jpg',
                    'rating' => 5,
                    'date' => 'August 8, 2022',
                    'comment' => 'I’m upgrading from a series 1, so it is a completely different watch. I am very satisfied with this purchase. Most of the heart monitoring functions only work with people.',
                ],
                (object) [
                    'user_name' => 'Sean Hathaway',
                    'avatar' => 'assets/img/blog/comment-avata-2.jpg',
                    'rating' => 5,
                    'date' => 'August 10, 2022',
                    'comment' => 'I’m upgrading from a series 1, so it is a completely different watch. I am very satisfied with this purchase. Most of the heart monitoring functions only work with people.',
                ],
            ],
        ];
        return view('client.product-details', compact('product'));
    }
}
