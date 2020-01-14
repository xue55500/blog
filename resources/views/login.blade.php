<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<form action="{{url('/dologin')}}" method="post">
    @csrf
    <input type="text" name="name">
    <input type="password" name="password">
<input type="submit" value="提交">
</form>

</body>
</html>