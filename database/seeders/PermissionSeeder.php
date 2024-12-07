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
        $developerCategoriesPermissionArray = [
            'Browse Category',
            'Edit Category',
            'Add Category',
            'Delete Category',
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
        //Categories
        $developerCategoryModule = Module::where('name', 'Categories')->select('id')->first();
        for ($i = 0; $i < count($developerCategoriesPermissionArray); $i++) {
            Permission::updateOrCreate([
                'module_id' => $developerCategoryModule->id,
                'name' => $developerCategoriesPermissionArray[$i],
                'slug' => Str::slug($developerCategoriesPermissionArray[$i]),
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
