<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\DB;

abstract class TestCase extends BaseTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        config(['database.default' => 'mysql-test']);

        DB::delete('delete from users');
        DB::delete('delete from templates');
        DB::delete('delete from template_variabels');
        DB::delete('delete from invitations');
        DB::delete('delete from invitation_variabels');
        DB::delete('delete from rsvps');
    }
}
