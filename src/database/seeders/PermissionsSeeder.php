<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
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

    private const PATIENTS_LIST = 'patients-list';
    private const PATIENTS_CREATE = 'patients-create';
    private const PATIENTS_EDIT = 'patients-edit';
    private const PATIENTS_DELETE = 'patients-delete';
    private const PATIENTS_SHOW = 'patients-show';

    private const ACTIVITIES_LIST = 'activities-list';
    private const ACTIVITIES_CREATE = 'activities-create';
    private const ACTIVITIES_EDIT = 'activities-edit';
    private const ACTIVITIES_DELETE = 'activities-delete';

    private const PATIENT_ACTIVITIES_LIST = 'patient-activities-list';
    private const PATIENT_ACTIVITIES_CREATE = 'patient-activities-create';
    private const PATIENT_ACTIVITIES_EDIT = 'patient-activities-edit';
    private const PATIENT_ACTIVITIES_DELETE = 'patient-activities-delete';

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
        self::PATIENTS_LIST,
        self::PATIENTS_CREATE,
        self::PATIENTS_EDIT,
        self::PATIENTS_DELETE,
        self::PATIENTS_SHOW,
        self::ACTIVITIES_LIST,
        self::ACTIVITIES_CREATE,
        self::ACTIVITIES_EDIT,
        self::ACTIVITIES_DELETE,
        self::PATIENT_ACTIVITIES_LIST,
        self::PATIENT_ACTIVITIES_CREATE,
        self::PATIENT_ACTIVITIES_EDIT,
        self::PATIENT_ACTIVITIES_DELETE,
    ];

    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        foreach ($this->permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        Role::create(['name' => 'root']);
        #$root = Role::findByName('root');
        #$root->givePermissionTo(Permission::all());

        $registered_role = Role::create(['name' => 'registered']);
        $registered_role->givePermissionTo(self::SEE_PANEL);

        $roles_admin = Role::create(['name' => 'roles-admin']);
        $roles_admin->givePermissionTo(self::SEE_PANEL);
        $roles_admin->givePermissionTo(self::ROLES_LIST);
        $roles_admin->givePermissionTo(self::ROLES_CREATE);
        $roles_admin->givePermissionTo(self::ROLES_EDIT);
        $roles_admin->givePermissionTo(self::ROLES_DELETE);

        $users_admin = Role::create(['name' => 'users-admin']);
        $users_admin->givePermissionTo(self::SEE_PANEL);
        $users_admin->givePermissionTo(self::USERS_LIST);
        $users_admin->givePermissionTo(self::USERS_CREATE);
        $users_admin->givePermissionTo(self::USERS_EDIT);
        $users_admin->givePermissionTo(self::USERS_DELETE);
        $users_admin->givePermissionTo(self::USERS_DISABLE);
        $users_admin->givePermissionTo(self::USERS_ENABLE);

        $therapist = Role::create(['name' => 'therapist']);
        $therapist->givePermissionTo(self::SEE_PANEL);
        $therapist->givePermissionTo(self::PATIENTS_LIST);
        $therapist->givePermissionTo(self::PATIENTS_CREATE);
        $therapist->givePermissionTo(self::PATIENTS_EDIT);
        $therapist->givePermissionTo(self::PATIENTS_DELETE);
        $therapist->givePermissionTo(self::PATIENTS_SHOW);

        $therapist->givePermissionTo(self::ACTIVITIES_LIST);
        $therapist->givePermissionTo(self::ACTIVITIES_CREATE);
        $therapist->givePermissionTo(self::ACTIVITIES_EDIT);
        $therapist->givePermissionTo(self::ACTIVITIES_DELETE);

        $therapist->givePermissionTo(self::PATIENT_ACTIVITIES_LIST);
        $therapist->givePermissionTo(self::PATIENT_ACTIVITIES_CREATE);
        $therapist->givePermissionTo(self::PATIENT_ACTIVITIES_EDIT);
        $therapist->givePermissionTo(self::PATIENT_ACTIVITIES_DELETE);
    }
}
