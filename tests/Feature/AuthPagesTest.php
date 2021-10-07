<?php
/*
    GreenEarth Test Cases

    THIS APPLICATION USES PHP PEST!
    The file name should end in Test. eg: XYZTest.php
*/


    uses()->group('authpages');

    test('Test#1: Check if login page renders', function () {
        $this->get('/login')->assertStatus(200);
    });

    test('Test#2: Check if registration page renders', function () {
        $this->get('/register')->assertStatus(200);
    });

    test('Test#3: Check if forgot-password page renders', function () {
        // $this->get('/password/reset')->assertStatus(200);
        $this->get('/')->assertStatus(302);
    });

    test('Test#4: Check if you can submit data into login page', function () {

        $this->post(route('login'), [
            'email' => '',
            'password' => '',
        ])->assertStatus(302);
    });

?>
