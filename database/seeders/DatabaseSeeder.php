<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database with initial data.
     */
    public function run()
    {

        /*
        |-------------------------------------------------------------------------- 
        | Call RolePermissionSeeder
        |-------------------------------------------------------------------------- 
        | This section triggers the RolePermissionSeeder to set up roles and permissions
        | for the system. It creates roles like "superadmin" and assigns permissions.
        */
        $this->call(RolePermissionSeeder::class);

        /*
        |-------------------------------------------------------------------------- 
        | Call FeatureSeeder
        |-------------------------------------------------------------------------- 
        | This section triggers the FeatureSeeder to populate the "features" table 
        | with initial feature data for your application, such as available features.
        */
        $this->call(FeatureSeeder::class);

        /*
        |-------------------------------------------------------------------------- 
        | Call AboutSeeder
        |-------------------------------------------------------------------------- 
        | This section triggers the AboutSeeder to populate the "about" table,
        | providing initial information about the company or project (like vision, mission).
        */
        $this->call(AboutSeeder::class);

        /*
        |-------------------------------------------------------------------------- 
        | Call AboutItemSeeder
        |-------------------------------------------------------------------------- 
        | This section triggers the AboutItemSeeder to populate the "about_items" table 
        | with specific items related to the "About" section, such as key points or sub-sections.
        */
        $this->call(AboutItemSeeder::class);

        /*
        |-------------------------------------------------------------------------- 
        | Call StatisticsSeeder
        |-------------------------------------------------------------------------- 
        | This section triggers the StatisticsSeeder to add initial statistical data
        | to the "statistics" table, such as number of projects, customers, or support hours.
        */
        $this->call(StatisticsSeeder::class);

        /*
        |-------------------------------------------------------------------------- 
        | Call ServiceSeeder
        |-------------------------------------------------------------------------- 
        | This section triggers the ServiceSeeder to populate the "services" table 
        | with services offered by your company (e.g. web development, design, etc.).
        */
        $this->call(ServiceSeeder::class);

        /*
        |-------------------------------------------------------------------------- 
        | Call ServiceSectionsSeeder
        |-------------------------------------------------------------------------- 
        | This section triggers the ServiceSectionsSeeder to populate the "service_sections" table
        | with categories or sections for services (e.g. Web Services, Mobile Development, etc.).
        */
        $this->call(ServiceSectionsSeeder::class);

        /*
        |-------------------------------------------------------------------------- 
        | Call OurServicesSeeder
        |-------------------------------------------------------------------------- 
        | This section triggers the OurServicesSeeder to fill the "our_services" table
        | with the services that your company offers to its clients.
        */
        $this->call(OurServicesSeeder::class);

        /*
        |-------------------------------------------------------------------------- 
        | Call SocialLinkSeeder
        |-------------------------------------------------------------------------- 
        | This section triggers the SocialLinkSeeder to populate the "social_links" table
        | with links to the company’s social media profiles (e.g. Facebook, Instagram, LinkedIn).
        */
        $this->call(SocialLinkSeeder::class);

        /*
        |-------------------------------------------------------------------------- 
        | Call MessageSeeder
        |-------------------------------------------------------------------------- 
        | This section triggers the MessageSeeder to populate the "messages" table
        | with sample messages that include sender information, subject, body, and status.
        */
        $this->call(MessageSeeder::class);

        /*
        |-------------------------------------------------------------------------- 
        | Call BannerSeeder
        |-------------------------------------------------------------------------- 
        | This section triggers the BannerSeeder to populate the "banners" table 
        | with banner data for the website.
        */
        $this->call(BannerSeeder::class);

        /*
        |-------------------------------------------------------------------------- 
        | Call CategorySeeder
        |-------------------------------------------------------------------------- 
        | This section triggers the CategorySeeder to populate the "categories" table
        | with sample category data.
        */
        $this->call(CategorySeeder::class);

        /*
        |-------------------------------------------------------------------------- 
        | Call ProductSeeder
        |-------------------------------------------------------------------------- 
        | This section triggers the ProductSeeder to populate the "products" table 
        | with sample product data including product details such as name, price, etc.
        */
        $this->call(ProductSeeder::class);

        $this->call(NewsSeeder::class);
    }
}