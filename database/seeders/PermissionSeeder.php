<?php

namespace Database\Seeders;

use App\Models\Module;
use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PermissionSeeder extends Seeder
{

    public function run(): void
    {
        $developerDashboardPermissionArray = [
            'Developer Dashboard',
            'Admin Dashboard',
            'Manager Dashboard',
        ];
        $developerBlogCategoriesPermissionArray = [
            'Browse Blog Category',
            'Edit Blog Category',
            'Add Blog Category',
            'Delete Blog Category',
        ];
        $developerModulesPermissionArray = [
            'Browse Module',
            'Edit Module',
            'Add Module',
            'Delete Module',
        ];
        $developerSlidersPermissionArray = [
            'Browse Slider',
            'Edit Slider',
            'Add Slider',
            'Delete Slider',
        ];
        $developerTestimonialsPermissionArray = [
            'Browse Testimonial',
            'Edit Testimonial',
            'Add Testimonial',
            'Delete Testimonial',
        ];
        $developerPermissionsArray = [
            'Browse Permission',
            'Edit Permission',
            'Add Permission',
            'Delete Permission',
        ];
        $developerRolesPermissionArray = [
            'Browse Role',
            'Edit Role',
            'Add Role',
            'Delete Role',
        ];
        $developerFeaturesPermissionArray = [
            'Browse Feature',
            'Edit Feature',
            'Add Feature',
            'Delete Feature',
        ];
        $developerUsersPermissionArray = [
            'Browse User',
            'Read User',
            'Edit User',
            'Add User',
            'Delete User',
        ];
        $developerBlogsPermissionArray = [
            'Browse Blog',
            'Read Blog',
            'Edit Blog',
            'Add Blog',
            'Delete Blog',
            'Browse Blog Comment',
            'Delete Blog Comment',
            'Change Comment Status',
        ];
        $developerFAQsPermissionArray = [
            'Browse FAQs',
            'Edit FAQs',
            'Add FAQs',
            'Delete FAQs',
        ];
        $developerGalleryPermissionArray = [
            'Browse Gallery',
            'Edit Gallery',
            'Add Gallery',
            'Delete Gallery',
        ];
        $developerVolunteerPermissionArray = [
            'Browse Volunteer',
            'Edit Volunteer',
            'Add Volunteer',
            'Delete Volunteer',
        ];
        $developerSettingsPermissionArray = [
            'General Setting',
            'Email Configuration',
        ];
        $developerDatabaseBackupPermissionArray = [
            'Browse Database Backup',
            'Download Database Backup',
            'Add Database Backup',
            'Delete Database Backup',
        ];
        $developerOtherSectionsPermissionArray = [
            'Edit Special Section',
            'Edit Counter',
        ];
        //Dashboard
        $developerDashboardModule = Module::where('name', 'Dashboard')->select('id')->first();
        for ($i = 0; $i < count($developerDashboardPermissionArray); $i++) {
            Permission::updateOrCreate(
                [
                    'module_id' => $developerDashboardModule->id,
                    'name' => $developerDashboardPermissionArray[$i],
                    'slug' => Str::slug($developerDashboardPermissionArray[$i]),
                ],
                [
                    'status' => $i == 1 ? true : false,
                ]
            );
        }

        //Features
        $developerFeatureModule = Module::where('name', 'Features')->select('id')->first();
        for ($i = 0; $i < count($developerFeaturesPermissionArray); $i++) {
            Permission::updateOrCreate([
                'module_id' => $developerFeatureModule->id,
                'name' => $developerFeaturesPermissionArray[$i],
                'slug' => Str::slug($developerFeaturesPermissionArray[$i]),
            ]);
        }
        //Blogs
        $developerBlogModule = Module::where('name', 'Blogs')->select('id')->first();
        for ($i = 0; $i < count($developerBlogsPermissionArray); $i++) {
            Permission::updateOrCreate([
                'module_id' => $developerBlogModule->id,
                'name' => $developerBlogsPermissionArray[$i],
                'slug' => Str::slug($developerBlogsPermissionArray[$i]),
            ]);
        }

        //Gallery
        $developerGalleryModule = Module::where('name', 'Features')->select('id')->first();
        for ($i = 0; $i < count($developerGalleryPermissionArray); $i++) {
            Permission::updateOrCreate([
                'module_id' => $developerGalleryModule->id,
                'name' => $developerGalleryPermissionArray[$i],
                'slug' => Str::slug($developerGalleryPermissionArray[$i]),
            ]);
        }
        //Volunteer
        $developerVolunteerModule = Module::where('name', 'Volunteers')->select('id')->first();
        for ($i = 0; $i < count($developerVolunteerPermissionArray); $i++) {
            Permission::updateOrCreate([
                'module_id' => $developerVolunteerModule->id,
                'name' => $developerVolunteerPermissionArray[$i],
                'slug' => Str::slug($developerVolunteerPermissionArray[$i]),
            ]);
        }
        //Blog Categories
        $developerBlogCategoryModule = Module::where('name', 'Blog Categories')->select('id')->first();
        for ($i = 0; $i < count($developerBlogCategoriesPermissionArray); $i++) {
            Permission::updateOrCreate([
                'module_id' => $developerBlogCategoryModule->id,
                'name' => $developerBlogCategoriesPermissionArray[$i],
                'slug' => Str::slug($developerBlogCategoriesPermissionArray[$i]),
            ]);
        }
        //FAQs
        $developerFAQsModule = Module::where('name', 'FAQs')->select('id')->first();
        for ($i = 0; $i < count($developerFAQsPermissionArray); $i++) {
            Permission::updateOrCreate([
                'module_id' => $developerFAQsModule->id,
                'name' => $developerFAQsPermissionArray[$i],
                'slug' => Str::slug($developerFAQsPermissionArray[$i]),
            ]);
        }
        //Sliders
        $developerSliderModule = Module::where('name', 'Sliders')->select('id')->first();
        for ($i = 0; $i < count($developerSlidersPermissionArray); $i++) {
            Permission::updateOrCreate([
                'module_id' => $developerSliderModule->id,
                'name' => $developerSlidersPermissionArray[$i],
                'slug' => Str::slug($developerSlidersPermissionArray[$i]),
            ]);
        }
        //Testimonials
        $developerTestimonialModule = Module::where('name', 'Testimonials')->select('id')->first();
        for ($i = 0; $i < count($developerTestimonialsPermissionArray); $i++) {
            Permission::updateOrCreate([
                'module_id' => $developerTestimonialModule->id,
                'name' => $developerTestimonialsPermissionArray[$i],
                'slug' => Str::slug($developerTestimonialsPermissionArray[$i]),
            ]);
        }

        //Modules
        $developerModule = Module::where('name', 'Modules')->select('id')->first();
        for ($i = 0; $i < count($developerModulesPermissionArray); $i++) {
            Permission::updateOrCreate([
                'module_id' => $developerModule->id,
                'name' => $developerModulesPermissionArray[$i],
                'slug' => Str::slug($developerModulesPermissionArray[$i]),
            ]);
        }

        //Permissions
        $developerPermissionModule = Module::where('name', 'Permissions')->select('id')->first();
        for ($i = 0; $i < count($developerPermissionsArray); $i++) {
            Permission::updateOrCreate([
                'module_id' => $developerPermissionModule->id,
                'name' => $developerPermissionsArray[$i],
                'slug' => Str::slug($developerPermissionsArray[$i]),
            ]);
        }

        //Roles
        $developerRolesModule = Module::where('name', 'Roles')->select('id')->first();
        for ($i = 0; $i < count($developerRolesPermissionArray); $i++) {
            Permission::updateOrCreate([
                'module_id' => $developerRolesModule->id,
                'name' => $developerRolesPermissionArray[$i],
                'slug' => Str::slug($developerRolesPermissionArray[$i]),
            ]);
        }

        //Users
        $developerUsersModule = Module::where('name', 'Users')->select('id')->first();
        for ($i = 0; $i < count($developerUsersPermissionArray); $i++) {
            Permission::updateOrCreate([
                'module_id' => $developerUsersModule->id,
                'name' => $developerUsersPermissionArray[$i],
                'slug' => Str::slug($developerUsersPermissionArray[$i]),
            ]);
        }

        //Other Section
        $developerOtherSectionModule = Module::where('name', 'Other Sections')->select('id')->first();
        for ($i = 0; $i < count($developerOtherSectionsPermissionArray); $i++) {
            Permission::updateOrCreate([
                'module_id' => $developerOtherSectionModule->id,
                'name' => $developerOtherSectionsPermissionArray[$i],
                'slug' => Str::slug($developerOtherSectionsPermissionArray[$i]),
            ]);
        }

        //Settings
        $developerSettingsModule = Module::where('name', 'Settings')->select('id')->first();
        for ($i = 0; $i < count($developerSettingsPermissionArray); $i++) {
            Permission::updateOrCreate([
                'module_id' => $developerSettingsModule->id,
                'name' => $developerSettingsPermissionArray[$i],
                'slug' => Str::slug($developerSettingsPermissionArray[$i]),
            ]);
        }

        //Database Backup
        $developerDatabaseBackupModule = Module::where('name', 'Database Backup')->select('id')->first();
        for ($i = 0; $i < count($developerDatabaseBackupPermissionArray); $i++) {
            Permission::updateOrCreate([
                'module_id' => $developerDatabaseBackupModule->id,
                'name' => $developerDatabaseBackupPermissionArray[$i],
                'slug' => Str::slug($developerDatabaseBackupPermissionArray[$i]),
            ]);
        }

    }
}
