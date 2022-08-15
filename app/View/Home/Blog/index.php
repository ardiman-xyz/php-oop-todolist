<?php

use App\Helper\SiteHelper;
?>

<h1 class="text-5xl text-center my-[20px] block">MY BLOGS</h1>

<div class="w-[600px] mx-auto mb-6">

    <div class="my-3 flex flex-row justify-between items-center">
        <p class="text-sm text-slate-500"><?= $model['counts'] ?> Totals / 10 Loaded</p>
        <a href="/blog/add" class="border-[1.5px] focus:ring-0 rounded-xl py-1 px-3 border-gray-600 ml-4">Add new blog</a>
    </div>
    <hr>

    <br>
    <?php foreach ($model['blogs'] as $blog) : ?>
        <div class="w-full mb-2 h-[210px]">
            <p class="text-slate-500 text-sm font-semibold"><?= SiteHelper::time_elapsed_A($blog['created_at']) ?></p>
            <a href="/blog/<?= $blog['id'] ?>" class="text-xl block font-extrabold mt-3"><?= $blog['title'] ?></a>
            <p class="mt-1 text-slate-700 leading-relaxed">
                <?= SiteHelper::shorterText($blog['content'], 230) ?>
            </p>
            <div class="mt-5 flex-row items-center flex justify-between">
                <p class="text-slate-500 text-xs font-semibold">2 min read</p>
                <div class="flex flex-row space-x-2 items-center">
                    <div class="">
                        <a href="#" class="text-slate-500">Save</a>
                    </div>
                    <div class="">
                        <a href="#" class="text-slate-500">Edit</a>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <br>
    <?php endforeach ?>
    <div class="flex justify-center my-6">
        <button class="border-[1.5px] focus:ring-0 rounded-xl py-2 px-4 border-gray-600">Load more</button>
    </div>
</div>