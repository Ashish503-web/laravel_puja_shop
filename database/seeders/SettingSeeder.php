<?php

namespace Database\Seeders;

use Botble\Base\Supports\BaseSeeder;
use Botble\Blog\Models\Category;
use Botble\Blog\Models\Post;
use Botble\Slug\Facades\SlugHelper;
use Botble\Slug\Models\Slug;

class SettingSeeder extends BaseSeeder
{
    public function run(): void
    {
        $this->uploadFiles('general');

        $this->saveSettings([
            'admin_favicon' => $this->filePath('general/favicon.png'),
            'admin_logo' => $this->filePath('general/logo-white.png'),
            SlugHelper::getPermalinkSettingKey(Post::class) => 'blog',
            SlugHelper::getPermalinkSettingKey(Category::class) => 'blog',
            'payment_cod_status' => 1,
            'payment_cod_description' => 'Please pay money directly to the postman, if you choose cash on delivery method (COD).',
            'payment_bank_transfer_status' => 1,
            'payment_bank_transfer_description' => 'Please send money to our bank account: ACB - 69270 213 19.',
            'payment_stripe_payment_type' => 'stripe_checkout',
            'plugins_ecommerce_customer_new_order_status' => 0,
            'plugins_ecommerce_admin_new_order_status' => 0,
            'ecommerce_is_enabled_support_digital_products' => 1,
            'ecommerce_load_countries_states_cities_from_location_plugin' => 0,
            'ecommerce_product_sku_format' => 'NN-2443-[%S]',
        ]);

        Slug::query()->where('reference_type', Post::class)->update(['prefix' => 'blog']);
        Slug::query()->where('reference_type', Category::class)->update(['prefix' => 'blog']);
    }
}
