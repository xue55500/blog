<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
   <form method="post" action="{{url('/dologin')}}">
       @csrf
       <table>
           <tr>
               <td>用户名</td>
               <td><input type="text" name="d_name"> </td>
           </tr>
           <tr>
               <td>密码</td>
               <td><input type="password" name="d_pwd"></td>
           </tr>
           <tr>
               <td></td>
               <td><input type="submit" value="登录"></td>
           </tr>

       </table>
   </form>
</body>
</html>