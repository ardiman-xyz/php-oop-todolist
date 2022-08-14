<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/output.css">
    <title><?= $model['title'] ?? 'Todo list PHP' ?></title>
</head>

<body>
    <div class="flex flex-row">
        <div class="w-full">
            <div class="w-full bg-slate-200 shadow-sm">
                <div class="mb-7 w-[1200px] mx-auto justify-between items-center h-[60px] flex flex-row px-[20px]">
                    <h1 class="text-xl font-semibold">My Activity</h1>
                    <ul class="flex flex-row  space-x-7">
                        <li>
                            <a href="/home">Home</a>
                        </li>
                        <li>
                            <a href="/">Todo</a>
                        </li>
                        <li>
                            <a href="/blog">BLog</a>
                        </li>
                    </ul>
                </div>
            </div>
            <main class=" min-h-screen w-full">