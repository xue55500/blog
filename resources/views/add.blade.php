<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<form method="post" action="{{url('/admin')}}">
    @csrf
    <input type="text" name="name">
    <input type="password" name="parent">
    <input type="submit" value="提交">

</form>
</body>
</html>