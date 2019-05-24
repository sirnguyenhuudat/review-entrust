<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Permission;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $owner = new Role();
		$owner->name         = 'owner';
		$owner->display_name = 'Project Owner'; // optional
		$owner->description  = 'User is the owner of a given project'; // optional
		$owner->save();

		$admin = new Role();
		$admin->name         = 'admin';
		$admin->display_name = 'User Administrator'; // optional
		$admin->description  = 'User is allowed to manage and edit other users'; // optional
		$admin->save();

		$createPost = Permission::where('name', 'create-post')->first();
		$editUser = Permission::where('name', 'edit-user')->first();

		$admin->attachPermission($createPost);
		// $admin->perms()->sync(array($createPost->id));

		$owner->attachPermissions(array($createPost, $editUser));
		// $owner->perms()->sync(array($createPost->id, $editUser->id));
    }
}
