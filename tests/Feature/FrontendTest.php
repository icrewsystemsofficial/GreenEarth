<?php
/*
    GreenEarth Test Cases

    THIS APPLICATION USES PHP PEST!
    1. The file name should end in Test. eg: XYZTest.php
    2. All tests should have a clearly defined @objective & @expected
*/


    uses()->group('frontend');
    beforeEach(function () {
        $this->withoutExceptionHandling();
    });
    /*  Test # 1
        @objective: Checks if the "/" route is redirected to the home.index
        @expected: 302
    */

    test('Test#1: If root page redirects to home route', function () {
        $this->get('/')->assertStatus(302);
    });

    /*  Test # 2
        @objective: Checks if "home" route renders
        @expected: 200
    */

    test('Test#2: If home route renders', function () {
        $this->get('/home')->assertStatus(200);
    });



    // it('has homepage', function () {
    //     $this->browse(function (Browser $browser) {
    //         $browser->visit('/')
    //             ->assertSee('Pest');
    //     });
    // });

?>
