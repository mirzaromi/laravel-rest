<?php
//
//use App\Repository\AuthRepository;
//use App\Repository\Implementation\AuthRepositoryImplementation;
//use App\Service\Implementation\AuthServiceImplementation;
//use Illuminate\Http\Request;
//
//test('auth example', function () {
//    $request = Request::create("/api/auth/register/", "POST");
////    $request->email = "mirzaromi12@gmail.com";
////    $request->password = "password";
//    $request->request->add([
//       "email" => "email",
//       "password" => "password"
//    ]);
//
//    $auth = Mockery::mock(AuthRepository::class);
//    $auth->shouldReceive('registerUser')
//        ->with($request)
//        ->andReturn(new \App\Models\User());
//
//
//
//    $service = new AuthServiceImplementation($auth);
//    $result = $service->register($request);
//    expect($result)->toBeObject(new \App\Models\User());
//});
