<?php


use App\Models\User;

test('toutes les pages retournent un code 200 lorsque l\'utilisateur est connecté', function () {
    $user = User::factory()->create();

    $this->actingAs($user);

    $excludedPages = [
        'welcome',
    ];


    foreach (route::getRoutes()->getRoutes() as $route) {
        $uri = $route->uri();
        if (!in_array($uri, $excludedPages)) {
            $response = $this->get($uri);
            $statusCode = $response->getStatusCode();
            if ($statusCode !== 200) {
                $this->fail('La route ' . $uri . ' a renvoyé un code de statut ' . $statusCode);
            }
            $response->assertStatus(200);

        } 
    }

});