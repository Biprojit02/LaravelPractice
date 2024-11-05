<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Someddleware;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\ProductController;
// use App\Http\Controllers\respose();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/welcome', function(){
    return "Welcome";
});

Route::get('/welcome1', function(){
    echo "<span style= 'color:red;'>Welcome1</span>". "<br>";
    echo "all";
});

Route::get('/name', function(){
    $name1 = "Biprojit";
    $name2 = "Ankit";
    echo "the first volunteer is: ". $name1. "<br>";
    echo "the second volunteer is: ". $name2. "<br>";

});

Route::get('/details', function(){
    return ['name'=>'nav', 'occupation'=>'faculty'];
});

Route::get('/stuff', function(){
    $product = ['type'=>'Smartphone', 'model'=>'Samsung Galaxy',
    'cost'=>20000];
    return $product[type];
});

Route::get('/myprofile/login/{name}', function($name){
    return "Welcome to your profile ". $name;
});

Route::get('/myprofile/login/{name?}', function($name = null){
    return "Welcome to your profile ". $name;
});

Route::get('/myprofile/login/{name?}', function($name = 'Guddu'){
    $name = "Mahi";
    return "Welcome to your profile ". $name;
});

Route::get('/add/{num1}/{num2}', function($num1, $num2){
    $sum = $num1 + $num2;
    return "The sum is: $sum";
});

Route::get('/grade/{num}', function($num){
    if($num >= 80 && $num <= 100){
        return "Grade A";
    }
    else if($num >= 60 && $num < 80){
        return "Grade B";
    }
    else if($num >= 40 && $num < 60){
        return "Grade C";
    }
    else if($num >= 0 && $num < 40){
        return "Fail";
    }
    else{
        return "Bad Input";
    }
});

// Route::get('test', function(){
//     return view('test');
// });

// Route::view('test', 'test');

Route::get('test', function(){
    return view('test', ["name"=>"Bipro", "profile"=>"Student"]);
});

Route::get('test/{name}/{profile}', function($name, $profile){
    return view('test', ["name" =>name]);
});


Route::get('testing', [TestControler::class, 'display'])->name('testcont');

Route::get('testingredirect/{message}', function($message){
    return redirect()->route('testcont', compact ('message'));
});

Route::get('testingredirect1/{message}', function(){
    return redirect()->action([TestController::class, 'display'], ['message'=>$message]);
});
// Route::get('testingredirect', function(){
//     return redirect()->route('testcont');
// });

// Route::get('testingredirect', function(){
//     return redirect()->route('testcont');
// });

// Route::get('Calcute-discount/{price}/{discount}', function($num1, $num2){
//     $sum = ($num2/100)*$num1;
//     return "The final price after discount is ($sum)";
// });

Route::prefix('cloudkitchen')->group(function(){
    Route::get('homexyz', function(){
        return "This is home page";
    });
    Route::get('contactxyz', function(){
        return "This is contact page";
    });
    Route::get('aboutxyz', function(){
        return "This is about page";
    });
});

Route::name('ck.')->group(function(){
    Route::get('cloud/visit/service', function(){
        return "welcome to our service";
    })->name("serv");
    Route::get('cloud/visit/contact', function(){
        return "welcome to our contact";
    })->name("con");
});

Route::get('myservices', function(){
    return redirect()->route('ck.serv');
});

Route::get('signinxyz', function($id){
    return "Sign in here right now";
})->middleware(SomeMiddleware::class);

Route::middleware('Some')->group(function(){
    Route::get('sign', function(){
        return "Sign in";
    });
    Route::get('log', function(){
        return "Log here";
    });
});


Route::middleware(['ss'])->group(function(){
    Route::get('sign', function(){
        return "Sign here";
    });
    Route::get('log', function(){
        return "Log here";
    });
    Route::get('loog', function(){
        return "loog here";
    })->withoutMiddleware('some');
});

Route::get('add-story', [StoryController::class, 'addStory'])->name('add-story');
Route::post('add-story', [StoryController::class, 'addStorySubmit'])->name('add-story');
Route::get('allstories', [StoryController::class, 'getallStories']);
Route::get('single-story/{id}', [StoryController::class, 'singleStory']);
Route::get('edit-story/{id}', [StoryController::class, 'editStory']);
Route::post('update-story/{id}', [StoryController::class, 'updateStory'])->name('update-story');
Route::resource('products',  ProductController::class);
