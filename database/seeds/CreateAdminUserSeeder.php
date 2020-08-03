<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Creation de l'utilisateur
        $user = User::create([

            'name' => 'Ghislain N\'KAGOU',
            'email' => 'ghislain.nkagou@gmail.com',
            'password' => Hash::make('P@ssw0rd')
        ]);

        //Creation Role 'Admin'
        $role = Role::create(['name' => 'Admin']);

        //Recupperation des permission de la table permission.
        $permissions = Permission::all();

        //Affectation de toutes les permissions au role 'Admin'
        $role->syncPermissions($permissions);

        //Affectation du role 'Admin' au utilisateur crée
        $user->assignRole($role->id);
    }
}
