<h1 class="text-5xl text-center my-[20px] block">MY BLOG</h1>

<div class="w-[600px] mx-auto mb-6">
    <?php for ($i = 0; $i < 6; $i++) : ?>
        <div class="w-full flex flex-row border-[1px] mb-2 border-gray-400 h-[200px] rounded-xl p-4">
            <div class="w-[60px] flex flex-col items-center p-y justify-between">
                <div class="w-[40px] h-[40px] bg-gray-400 rounded-full mb-2"></div>
                <p class="text-sm">Like</p>
                <p class="text-sm">Save</p>
                <p class="text-sm">Show</p>
            </div>
            <div class="w-full">
                <div class="flex flex-row justify-between">
                    <a href="/blog/detail/title-for-my-first-blog" class="font-bold ml-2">Title for my first blog</a>
                    <a href="javascript:;">Edit</a>
                </div>
                <p class="text-xs text-gray-600 ml-2">12/09/2022 - 12:03:45</p>
                <div class="mt-2 ml-2">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur perspiciatis alias amet voluptate reiciendis exercitationem, ab a, animi doloremque dolor laudantium eaque illum nam, delectus quibusdam minus aperiam quod atque.</p>
                </div>
            </div>
        </div>
    <?php endfor ?>
    <div class="flex justify-center my-6">
        <button class="border-[1.5px] focus:ring-0 rounded-xl py-2 px-4 border-gray-600">Load more</button>
    </div>
</div>