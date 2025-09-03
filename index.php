<?php

require './vendor/autoload.php';

use AbdelrhmanSaeed\PHP\Http\{Request, Response, Cookie};

$request = new Request;
// $file     = $request->file('picture');

// $request->session()
        // ->set('name', 'abdelrhman');

Response::json([
  'token' => $request->bearer()
//   'name'          => $request->session()->get('name'),
//   'id'            => $request->session()->id(),
//   'session_name'  => $request->session()->name()
]);

// $request->session()->regenerate_id();

// Cookie::forget('name');
// Cookie::set('name', 'abdelrhman', Cookie::days(15));
// $request->cookies()
        // ->set('name', 'ahmed', $request->cookies()->minutes(10));

// Response::json([
  // 'name'          => $request->session()->get('name'),
  // 'id'            => $request->session()->id(),
  // 'session_name'  => $request->session()->name()
// ]);


// setcookie('mynameis', 'abdelrhman', time() + 100, '/');
// $request->cookies()->set('mynameis', 'abdelrhman', 100, '/');
// $request->cookies()->forget('mynameis');
// Response::json([

  // 'name'      => $file->name(),
  // 'extension' => $file->extension(),
  // 'tmp'       => $file->tmp(),
  // 'size'      => $file->size(),
  // 'uploaded'  => $file->uploaded()
// ]);
//


// echo $request->file('picture')->name();
// var_dump($request->file('picture')?->store('src/', 'abdelrhman.jpg'));

// var_dump(move_uploaded_file($_FILES['picture']['tmp_name'],
  // "src/". basename($_FILES['picture']['name'])
// ));
