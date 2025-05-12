<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'category_id' => 1,
                'product_name' => 'Veb dizayn Boshlang‘ich To‘plami',
                'description' => 'Boshlovchilar uchun veb dizaynni oson boshlash uchun to‘liq asboblar to‘plami. Shablonlar, dizayn elementlari va qo‘llanmalar kiritilgan.',
                'price' => 199.99,
                'created_at' => now(),
                'updated_at' => now(),
                'images' => [
                    'product-images/01JTW5W682PT6TP6MRCJQ5JJ4K.jpg',
                ],
            ],
            [
                'category_id' => 1,
                'product_name' => 'Rivojlangan Veb Dizayn',
                'description' => 'Veb dizayn san’atini o‘rganing, zamonaviy usullar, javobgar dizayn va ilg‘or asboblar yordamida.',
                'price' => 499.99,
                'created_at' => now(),
                'updated_at' => now(),
                'images' => [
                    'product-images/01JTW6BBCYF6BNKGPEQMJF3431.jpg',
                ],
            ],
            [
                'category_id' => 1,
                'product_name' => 'Responsive Veb Dizayn Kursi',
                'description' => 'Barcha qurilmalarda moslashuvchan veb saytlarni qanday yaratishni o‘rganing. Kasbini oshirishni xohlagan mutaxassislar uchun mukammal.',
                'price' => 349.99,
                'created_at' => now(),
                'updated_at' => now(),
                'images' => [
                    'product-images/01JTW6CK3ZVQ0W5DCCVF17MSGR.jpg',
                ],
            ],
            [
                'category_id' => 4,
                'product_name' => 'Productivity Suite Pro',
                'description' => 'Professional sifatida loyihalar, vazifalar va muddatlarni boshqarish uchun mo‘ljallangan ilg‘or samaradorlik asboblari to‘plami.',
                'price' => 12313.00,
                'created_at' => now(),
                'updated_at' => now(),
                'images' => [
                    'product-images/01JTW6D7QHG9RTC4Y1H0MKX1GJ.jpg',
                ],
            ],
            [
                'category_id' => 4,
                'product_name' => 'Vazifa Boshqaruv Asbobi',
                'description' => 'Kundalik vazifalaringizni kuzatib boring, ustuvorliklarni belgilab, loyihalaringizni samarali boshqaring.',
                'price' => 222.00,
                'created_at' => now(),
                'updated_at' => now(),
                'images' => [
                    'product-images/01JTW6DXXYB4QA17HYK8DZ178T.jpg',
                ],
            ],
            [
                'category_id' => 4,
                'product_name' => 'Vaqtni Kuzatuvchi',
                'description' => 'Vaqtni qanday boshqarayotganingizni o‘lchang, ish jarayonini yaxshilang va kundalik rutiningizni optimallashtiring.',
                'price' => 99.99,
                'created_at' => now(),
                'updated_at' => now(),
                'images' => [
                    'product-images/01JTW6EC3MYTGAVZKM7WT222Z3.jpg',
                ],
            ],
            [
                'category_id' => 2,
                'product_name' => 'E-Commerce Veb Dizayni',
                'description' => 'Shopify va WooCommerce kabi elektron tijorat platformalarida muvaffaqiyatli onlayn do‘konlar yaratish uchun mukammal qo‘llanma.',
                'price' => 499.00,
                'created_at' => now(),
                'updated_at' => now(),
                'images' => [
                    'product-images/01JTW6EWFHQYQZDEBW9Z6EAEZA.jpg',
                ],
            ],
            [
                'category_id' => 2,
                'product_name' => 'Onlayn Do‘kon Masterklass',
                'description' => 'Onlayn sotish va marketing bo‘yicha ilg‘or strategiyalarni o‘rganib, elektron tijorat ko‘nikmalaringizni yangi darajaga ko‘tarish.',
                'price' => 799.00,
                'created_at' => now(),
                'updated_at' => now(),
                'images' => [
                    'product-images/01JTW6JR8MAN6N1HRV0QE3P66X.jpg',
                ],
            ],
            [
                'category_id' => 2,
                'product_name' => 'Asosiy E-Commerce Paket',
                'description' => 'Boshlovchilar uchun onlayn do‘konni yaratish bo‘yicha oson tushuniladigan qo‘llanma va shablonlar.',
                'price' => 149.99,
                'created_at' => now(),
                'updated_at' => now(),
                'images' => [
                    'product-images/01JTW6H1S65SFHT6SPS5S3H977.jpg',
                ],
            ],
            [
                'category_id' => 3,
                'product_name' => 'Biznes Tahlil Asbobi',
                'description' => 'Ma’lumotlarga asoslangan qarorlar qabul qilish va biznes jarayonlarini optimallashtirish uchun ilg‘or tahlil asbobi.',
                'price' => 499.99,
                'created_at' => now(),
                'updated_at' => now(),
                'images' => [
                    'product-images/01JTW6KYZSZ16KHPYAJSAK0HBX.jpg',
                ],
            ],
            [
                'category_id' => 3,
                'product_name' => 'Bozor Tadqiqoti Dasturi',
                'description' => 'Bozor ma’lumotlarini yig‘ish, tahlil qilish va mijozlar xulq-atvorini yaxshiroq tushunish uchun dastur.',
                'price' => 799.00,
                'created_at' => now(),
                'updated_at' => now(),
                'images' => [
                    'product-images/01JTW6MEKRDXSDW7QHYDF8KN34.jpg',
                ],
            ],
            [
                'category_id' => 3,
                'product_name' => 'Mijozlar Tahlili Asbobi',
                'description' => 'Mijozlar bazangiz haqida chuqur tushuncha olish, ilg‘or segmentatsiya va xulq-atvor tahlili.',
                'price' => 1199.99,
                'created_at' => now(),
                'updated_at' => now(),
                'images' => [
                    'product-images/01JTW6N66B597Q72N2AP1WMH8J.jpg',
                ],
            ],
        ];

        collect($products)->each(function ($productData) {
            $product = Product::create([
                'category_id' => $productData['category_id'],
                'product_name' => $productData['product_name'],
                'description' => $productData['description'],
                'price' => $productData['price'],
                'created_at' => $productData['created_at'],
                'updated_at' => $productData['updated_at'],
            ]);

            collect($productData['images'])->each(function ($imageUrl) use ($product) {
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_url' => $imageUrl,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            });
        });

        $this->command->info('All products and images seeded successfully!');
    }
}
