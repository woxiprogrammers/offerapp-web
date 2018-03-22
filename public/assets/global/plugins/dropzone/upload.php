<?php
$image = $request;

$input['imagename'] = time().'.'.$image->getClientOriginalExtension();

$destinationPath = public_path('/public/Upload/images');

$image->move($destinationPath, $input['imagename']);


$this->postImage->add($input);


return back()->with('success','Image Upload successful');
 ?>
