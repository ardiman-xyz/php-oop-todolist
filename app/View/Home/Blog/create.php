<h1 class="text-5xl text-center my-[20px] block">ADD NEW YOUR BLOG</h1>

<div class="w-[700px] mx-auto my-6">
    <div class="flex justify-between items-center flex-row">
        <div class="flex flex-row items-center">
            <div class="h-[40px] w-[40px] bg-slate-500 rounded-full"></div>
            <div class="ml-3">
                <p class="font-bold text-[16px]">Ardiman-xyz</p>
                <p class="text-[14px] text-slate-500 font-medium">Aug 14 . 1min read</p>
            </div>
        </div>
        <div class="flex flex-row items-center space-x-3">
            <div class="w-[25px] h-[25px] bg-slate-400 rounded-full"></div>
            <div class="w-[25px] h-[25px] bg-slate-400 rounded-full"></div>
            <div class="w-[25px] h-[25px] bg-slate-400 rounded-full"></div>
            <div class="flex justify-center">
                <button class="border-[1.5px] focus:ring-0 rounded-xl py-1 px-3 border-gray-600 ml-4" onclick="submitForm()">Save blog</button>
            </div>
        </div>
    </div>

    <?php if ($model['error']) : ?>
        <p class="text-red-500 mt-3 block text-center"><?= $model['error'] ?></p>
    <?php endif; ?>
    <div class="mt-6">
        <form action="/blog" method="post" id="form-blog">
            <div class="w-full mb-4">
                <input type="text" name="title" class="ring-1 rounded-xl w-full focus:ring-1 p-4 focus:ring-slate-200 ring-slate-400" placeholder="Enter title...">
            </div>
            <div class="w-full">
                <textarea class="ring-1 w-full focus:ring-1 rounded-xl p-4 focus:ring-slate-200 ring-slate-400" name="content" id="conten" rows="10" placeholder="my content..."></textarea>
            </div>
        </form>
    </div>
</div>

<script>
    function submitForm() {
        const form = document.getElementById("form-blog");
        form.submit();
    }
</script>