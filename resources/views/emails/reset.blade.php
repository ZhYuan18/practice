<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>重置确认链接</title>
</head>
<body>
<h1>这是一封密码重置邮件，如果是您本人操作，请点击以下按钮继续：</h1>

<p>
    <a href="{{ route('password.reset', $user->token) }}">
        {{ route('password.reset', $user->token) }}
    </a>
</p>

<p>
    如果您并没有执行此操作，您可以选择忽略此邮件。
</p>
</body>
</html>