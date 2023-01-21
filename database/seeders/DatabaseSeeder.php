<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create(['name' => 'admin']);
        $iniciar_sesion_permiso = Permission::create(['name' => 'Iniciar_sesion']);
        $editar_usuario_permiso = Permission::create(['name' => 'Editar_usuarios']);
        $ver_denuncia_permiso = Permission::create(['name'=>'Ver_denuncias']);
        $ver_usuarios_permiso = Permission::create(['name'=>'Ver_usuarios']);
        $admin->givePermissionTo($iniciar_sesion_permiso);
        $admin->givePermissionTo($editar_usuario_permiso);
        $admin->givePermissionTo($ver_denuncia_permiso);
        $admin->givePermissionTo($ver_usuarios_permiso);



        $usuario_logueado = Role::create(['name' => 'usuario_logueado']);
        $realizar_denuncia_permiso = Permission::create(['name' => 'Realizar_denuncia']);
        $usuario_logueado->givePermissionTo($iniciar_sesion_permiso);
        $usuario_logueado->givePermissionTo($realizar_denuncia_permiso);

        $visitante = Role::create(['name' => 'visitante']);
        $registrarse_permiso = Permission::create(['name' => 'Registrarse']);
        $crear_denuncia_urgente_permiso = Permission::create(['name' => 'Crear_denuncia_urgente']);
        $visitante->givePermissionTo($registrarse_permiso);
        $visitante->givePermissionTo($crear_denuncia_urgente_permiso);

        
        //user admin para pruebas
        $user = User::create([
            'user_name' => 'Admin1',
            'user_surname' =>'Admin',
            'user_ci' => '3256489',
            'user_email' => 'admin1@gmail.com',
            'password' => Hash::make('admin123'),
            'user_number' => '0981659235',
            'user_date_of_birth' => '2003/02/12',
            'user_gender' => 'Femenino',
        ]);
        $user->assignRole($admin);

        //user admin para pruebas
        $user = User::create([
            'user_name' => 'Elizabeth',
            'user_surname' =>'Grantt',
            'user_ci' => '3256489',
            'user_email' => 'admin2@gmail.com',
            'password' => Hash::make('admin1235'),
            'user_number' => '0981659235',
            'user_date_of_birth' => '2003/02/12',
            'user_gender' => 'Femenino',
        ]);
        $user->assignRole($admin);

          //user admin para pruebas
          $user = User::create([
            'user_name' => 'Stefanni',
            'user_surname' =>'Germanotta',
            'user_ci' => '3256489',
            'user_email' => 'admin3@gmail.com',
            'password' => Hash::make('admin1234'),
            'user_number' => '0981659235',
            'user_date_of_birth' => '2003/02/12',
            'user_gender' => 'Femenino',
        ]);
        $user->assignRole($admin);

        //usuario logueado para pruebas
        $user = User::create([
            'user_name' => 'Denunciante1',
            'user_surname' =>'Denunciante',
            'user_ci' => '5689213',
            'user_email' => 'denunciante1@gmail.com',
            'password' => Hash::make('admin123'),
            'user_number' => '0981651235',
            'user_date_of_birth' => '2003/02/12',
            'user_gender' => 'Masculino',
        ]);
        $user->assignRole($usuario_logueado);

         //usuario logueado para pruebas
         $user = User::create([
            'user_name' => 'Jenna',
            'user_surname' =>'Ortega',
            'user_ci' => '1256145',
            'user_email' => 'jenna@gmail.com',
            'password' => Hash::make('admin123'),
            'user_number' => '0981651235',
            'user_date_of_birth' => '2003/02/12',
            'user_gender' => 'Sin especificar',
        ]);
        $user->assignRole($usuario_logueado);

         //usuario logueado para pruebas
         $user = User::create([
            'user_name' => 'Alexander',
            'user_surname' =>'Paniagua',
            'user_ci' => '125369',
            'user_email' => 'alex@gmail.com',
            'password' => Hash::make('admin123'),
            'user_number' => '0981651235',
            'user_date_of_birth' => '2003/02/12',
            'user_gender' => 'Masculino',
        ]);
        $user->assignRole($usuario_logueado);

        

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
