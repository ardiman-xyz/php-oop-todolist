<h1 class="text-5xl text-center my-[20px] block">MY BLOG</h1>

<div class="w-[600px] mx-auto mb-6">
    <?php for ($i = 0; $i < 6; $i++) : ?>
        <div class="w-full mb-2 h-[210px]">
            <p class="text-slate-500 text-sm font-semibold">2 hours ago</p>
            <a href="/blog/12" class="text-xl block font-extrabold mt-3">My firs blog in here app</a>
            <p class="mt-1 text-slate-700 leading-relaxed">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus, ratione sint quia dignissimos quas odit optio illo hic totam doloremque velit cum similique neque, consectetur quisquam, corporis suscipit. ..
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
    <?php endfor ?>
    <div class="flex justify-center my-6">
        <button class="border-[1.5px] focus:ring-0 rounded-xl py-2 px-4 border-gray-600">Load more</button>
    </div>
</div>