<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    // Permisos base
    private const SEE_PANEL = 'see-panel';
    private const ROLES_LIST = 'roles-list';
    private const ROLES_CREATE = 'roles-create';
    private const ROLES_EDIT = 'roles-edit';
    private const ROLES_DELETE = 'roles-delete';
    private const USERS_LIST = 'users-list';
    private const USERS_CREATE = 'users-create';
    private const USERS_EDIT = 'users-edit';
    private const USERS_DELETE = 'users-delete';
    private const USERS_DISABLE = 'users-disable';
    private const USERS_ENABLE = 'users-enable';

    // Permisos nuevos
    private const SEE_OWN_PATIENTS = 'see-own-patients';
    private const ASSIGN_PATIENT_ACTIVITY = 'assign-patient-activity';
    private const SEE_ACTIVITIES = 'see-activities';
    private const ACCESS_AS_PATIENT = 'access-as-patient';

    private $permissions = [
        self::SEE_PANEL,
        self::ROLES_LIST,
        self::ROLES_CREATE,
        self::ROLES_EDIT,
        self::ROLES_DELETE,
        self::USERS_LIST,
        self::USERS_CREATE,
        self::USERS_EDIT,
        self::USERS_DELETE,
        self::USERS_DISABLE,
        self::USERS_ENABLE,
        self::SEE_OWN_PATIENTS,
        self::ASSIGN_PATIENT_ACTIVITY,
        self::SEE_ACTIVITIES,
        self::ACCESS_AS_PATIENT,
    ];

    public function run(): void
    {
        // Reset cache
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        foreach ($this->permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Roles existentes
        $root = Role::firstOrCreate(['name' => 'root']);
        $registered = Role::firstOrCreate(['name' => 'registered']);
        $rolesAdmin = Role::firstOrCreate(['name' => 'roles-admin']);
        $usersAdmin = Role::firstOrCreate(['name' => 'users-admin']);

        // Nuevos roles
        $therapist = Role::firstOrCreate(['name' => 'therapist']);
        $paciente = Role::firstOrCreate(['name' => 'paciente']);

        // Permisos por rol
        $root->syncPermissions(Permission::all());

        $registered->givePermissionTo(self::SEE_PANEL);

        $rolesAdmin->syncPermissions([
            self::SEE_PANEL,
            self::ROLES_LIST,
            self::ROLES_CREATE,
            self::ROLES_EDIT,
            self::ROLES_DELETE,
        ]);

        $usersAdmin->syncPermissions([
            self::SEE_PANEL,
            self::USERS_LIST,
            self::USERS_CREATE,
            self::USERS_EDIT,
            self::USERS_DELETE,
            self::USERS_DISABLE,
            self::USERS_ENABLE,
        ]);

        $therapist->syncPermissions([
            self::SEE_PANEL,
            self::SEE_OWN_PATIENTS,
            self::ASSIGN_PATIENT_ACTIVITY,
            self::SEE_ACTIVITIES,
        ]);

        $paciente->syncPermissions([
            self::SEE_PANEL,
            self::SEE_ACTIVITIES,
            self::ACCESS_AS_PATIENT,
        ]);
    }
}
