<?php

namespace Tests\Feature\View;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminPageTest extends TestCase
{
    use RefreshDatabase;

    public function testHasPanelIfAdmin()
    {
        $user = factory(\App\User::class)->states('admin')->create();
        $users = url('/users');
        $userscreate = url('/users/create');
        $meds = url('/medications');
        $medscreate = url('/medications/create');
        $medformat = url('/medformatter');
        $patients = url('/patients');
        $patientscreate = url('/patients/create');
        $patientformat = url('/patientformatter');
        $response = $this->actingAs($user)->get('/home');
        $response->assertSee('<div class="panel-heading">Administrator Dashboard</div>');
        $response->assertSee('<a class="btn btn-primary" href="' . url('/users') . '">View Users</a>');
        $response->assertSee('View and edit existing users.');
        $response->assertSee('<a class="btn btn-primary" href="' . url('/users/create') . '">Create User</a>');
        $response->assertSee('Create new user.');
        $response->assertSee('<a class="btn btn-primary" href="' . url('/medications') . '">View Medications</a>');
        $response->assertSee('View and edit existing medications.');
        $response->assertSee('<a class="btn btn-primary" href="' . url('/medications/create') . '">Create Medication</a>');
        $response->assertSee('Add new medication.');
        $response->assertSee('<a class="btn btn-primary" href="' . url('/medformatter') . '">Format Medication</a>');
        $response->assertSee('Format medication data for QR codes.');
        $response->assertSee('<a class="btn btn-primary" href="' . url('/patients') . '">View Patients</a>');
        $response->assertSee('View and edit existing patients.');
        $response->assertSee('<a class="btn btn-primary" href="' . url('/patients/create') . '">Create Patient</a>');
        $response->assertSee('Create new patient.');
        $response->assertSee('<a class="btn btn-primary" href="' . url('/patientformatter') . '">Format Patient</a>');
        $response->assertSee('Format patient data for QR codes.');
        $response->assertSee('<a class="btn btn-primary" href="' . url('/orders') . '">View Orders</a>');
        $response->assertSee('View and edit existing orders.');
        $response->assertSee('<a class="btn btn-primary" href="' . url('/orders/create') . '">Create Order</a>');
        $response->assertSee('Create new order.');
        $response->assertSee('<a class="btn btn-primary" href="' . url('/labs') . '">View Labs</a>');
        $response->assertSee('View and edit existing labs.');
        $response->assertSee('<a class="btn btn-primary" href="' . url('/labs/create') . '">Create Lab</a>');
        $response->assertSee('Create new lab.');
    }

    public function testHasPanelIfInstructor()
    {
        $user = factory(\App\User::class)->states('instructor')->create();
        $users = url('/users');
        $userscreate = url('/users/create');
        $meds = url('/medications');
        $medscreate = url('/medications/create');
        $medformat = url('/medformatter');
        $patients = url('/patients');
        $patientscreate = url('/patients/create');
        $patientformat = url('/patientformatter');
        $response = $this->actingAs($user)->get('/home');
        $response->assertSee('<div class="panel-heading">Administrator Dashboard</div>');
        $response->assertSee('<p>Administrator options:</p>');
        $response->assertDontSee('<p><a class="btn btn-primary" href="' . url('/users') . '">View Users</a>&nbsp;View and edit existing users.</p>');
        $response->assertDontSee('<p><a class="btn btn-primary" href="' . url('/users/create') . '">Create User</a>&nbsp;Create new user.</p>');
        $response->assertSee('<p><a class="btn btn-primary" href="' . url('/medications') . '">View Medications</a>&nbsp;View and edit existing medications.</p>');
        $response->assertSee('<p><a class="btn btn-primary" href="' . url('/medications/create') . '">Create Medication</a>&nbsp;Add new medication.</p>');
        $response->assertSee('<p><a class="btn btn-primary" href="' . url('/medformatter') . '">Format Medication</a>&nbsp;Format medication data for QR/bar code.</p>');
        $response->assertSee('<p><a class="btn btn-primary" href="' . url('/patients') . '">View Patients</a>&nbsp;View and edit existing patients.</p>');
        $response->assertSee('<p><a class="btn btn-primary" href="' . url('/patients/create') . '">Create Patient</a>&nbsp;Create new patient.</p>');
        $response->assertSee('<p><a class="btn btn-primary" href="' . url('/patientformatter') . '">Format Patient</a>&nbsp;Format patient data for QR/bar code.</p>');
        $response->assertSee('<p><a class="btn btn-primary" href="' . url('/orders') . '">View Orders</a>&nbsp;View and edit existing orders.</p>');
        $response->assertSee('<p><a class="btn btn-primary" href="' . url('/orders/create') . '">Create Order</a>&nbsp;Create new order.</p>');
        $response->assertSee('<p><a class="btn btn-primary" href="' . url('/labs') . '">View Labs</a>&nbsp;View and edit existing labs.</p>');
        $response->assertSee('<p><a class="btn btn-primary" href="' . url('/labs/create') . '">Create Lab</a>&nbsp;Create new lab.</p>');
    }
}
