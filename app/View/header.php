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
        <aside class="w-56 min-h-screen bg-slate-300">
            <div class="flex flex-col justify-between  min-h-screen">
                <div>
                    <div id="logo" class="flex px-3">
                        <div class="w-[40px] h-[40px] bg-gray-200 rounded-sm p-4 my-3"></div>
                        <div class="py-2 px-2 ">
                            <p class="text-leading font-medium text-gray-700 text-xs">PHP OOP</p>
                            <p class="text-leading text-blue-400 text-xs">Aktif</p>
                        </div>
                    </div>

                    <ul className="space-y-1">
                        <li class="px-4 py-2 rounded-sm bg-blue-300 border-r-2 border-blue-500 hover:bg-blue-300 hover:cursor-pointer">
                            <span className="ml-3 text-sm">Dahboard</span>
                        </li>
                        <li class="px-4 py-2 rounded-sm hover:bg-blue-300 hover:border-r-2 border-blue-500 hover:cursor-pointer">
                            <span className="ml-3 text-sm">Todo</span>
                        </li>
                        <li class="px-4 py-2 rounded-sm hover:bg-blue-300 hover:border-r-2 border-blue-500 hover:cursor-pointer">
                            <span className="ml-3 text-sm">Upload</span>
                        </li>
                    </ul>
                </div>
                <div class="px-4 py-2 text-end">
                    <a href="javascript:;" class="hover:underline">
                        < Hide</a>
                </div>
            </div>
        </aside>
        <div class="w-full">