<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a href="<?php echo route('members.show',['id'=>14])?>">testbutton</a>
    <a href="<?php echo route('profile',['id'=>88])?>">ttt</a>
    <a href="<?php echo route('mmgo',['slug'=>'yahoo','id'=>39,'opt'=>'ss'])?>">mmgo</a>
    <a href="<?php echo route('profile',['id'=>88])?>">ttt</a>
    <a href="<?php echo route('members.comments.ttshow',['id'=>553])?>">member.ttshow</a>
    <a href="<?php echo route('invitations',['invitation'=>44455,'answer'=>'yes'])?>">invitations</a>
    <a href="<?php echo route('invtt',['invitation'=>97523,'answer'=>'yestt'])?>">invtt</a>
</body>
</html>
