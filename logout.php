<!-- [PHP_BACKEND_HOOK: Session termination handler (session_destroy, unset auth cookies, redirect to login.php)] -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="0;url=login.php">
    <title>Logout | FurnishMe</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.ico?v=2">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png?v=2">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png?v=2">
    <link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png?v=2">
</head>

<body class="bg-[#FAF8F5] text-stone-900 font-sans p-8 flex items-center justify-center min-h-screen">
    <div class="text-center">
        <p class="text-sm text-stone-600">Signing out of FurnishMe Atelier...</p>
        <p class="text-xs text-stone-400 mt-2">Redirecting to <a href="login.php" class="underline">login</a>...</p>
    </div>
</body>

</html>
