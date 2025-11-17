<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            ['Keyboard Mechanical', 'Keyboard gaming RGB switch biru', 450000, 'keyboard.jpg'],
            ['Mouse Gaming', 'Mouse gaming 6 tombol dengan LED', 250000, 'mouse.jpg'],
            ['Headset RGB', 'Headset gaming noise cancelling', 350000, 'headset.jpg'],
            ['Monitor 24 Inch', 'Monitor full HD 75Hz panel IPS', 1450000, 'monitor.jpg'],
            ['Laptop Stand', 'Stand aluminium untuk laptop', 120000, 'stand.jpg'],
            ['USB Hub 4 Port', 'Hub USB 3.0 kecepatan tinggi', 90000, 'usbhub.jpg'],
            ['Webcam HD', 'Webcam 1080p untuk meeting online', 200000, 'webcam.jpg'],
            ['Microphone Condenser', 'Mic condenser untuk streaming', 300000, 'mic.jpg'],
            ['Speaker Bluetooth', 'Speaker portable dengan bass kuat', 220000, 'speaker.jpg'],
            ['Powerbank 20.000mAh', 'Powerbank fast charging', 180000, 'powerbank.jpg'],
            ['Tripod Kamera', 'Tripod aluminium ringan', 160000, 'tripod.jpg'],
            ['Ring Light', 'Ring light 26cm untuk konten creator', 140000, 'ringlight.jpg'],
            ['Charger 33W', 'Charger fast charging 33W', 90000, 'charger.jpg'],
            ['Cable Type-C', 'Kabel type-c braided 1 meter', 40000, 'cable.jpg'],
            ['Flashdisk 64GB', 'Flashdisk USB 3.0', 70000, 'flashdisk.jpg'],
            ['SSD 256GB', 'SSD SATA kecepatan tinggi', 350000, 'ssd.jpg'],
            ['Harddisk 1TB', 'HDD external portable 1TB', 650000, 'hdd.jpg'],
            ['Keyboard Wireless', 'Keyboard wireless minimalis', 180000, 'keyboard2.jpg'],
            ['Mouse Wireless', 'Mouse wireless silent click', 75000, 'mouse2.jpg'],
            ['Bluetooth Earbuds', 'TWS earbuds dengan low latency', 300000, 'tws.jpg'],
        ];

        foreach ($products as $p) {
            Product::create([
                'name' => $p[0],
                'description' => $p[1],
                'price' => $p[2],
                'image' => $p[3],
            ]);
        }
    }
}
