<?php
// Start the session
session_start();
?>

<h1 class="text-5xl text-center my-[20px] block">TODOLIST</h1>
<div class="w-[600px] h-[200px] mx-auto">
    <?php if ($model['error']) : ?>
        <h1 class="mb-2 text-red-400"><?= $model['error'] ?></h1>
    <?php endif; ?>
    <form action="/todo/store" method="post">
        <div class="mb-6 flex space-x-2">
            <input type="text" name="title" class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleFormControlInput2" placeholder="Add todo..." name="username" />
            <button type="submit" class="inline-block px-7 py-3 bg-blue-600 text-white font-medium text-sm leading-snug uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                Add
            </button>
        </div>

    </form>

    <?php foreach ($model['todos'] as $todo) : ?>
        <div class="flex w-[100%] mb-3 border-[1px] border-gray-300 p-3 justify-between rounded-sm">
            <div class="flex flex-row space-x-2 items-center">
                <input value="<?= $todo['is_done'] === 1 ? "checked" : "" ?>" type="checkbox" name="is-done" id="is-done" onchange="changeStatus(<?= $todo['id'] ?>)" <?= $todo['is_done'] === 1 ? "checked" : "" ?>>
                <p><?= $todo['title'] ?></p>
            </div>
            <div class="flex space-x-1">
                <a onclick="return confirm('Are you sure ?')" href="/todo/<?= $todo['id'] ?>/delete" class="text-blue-500 underline hover:text-blue-600">Delete</a>
                <a href="/todo/<?= $todo['id'] ?>/edit" class="text-blue-500 underline hover:text-blue-600">Edit</a>
            </div>
        </div>
    <?php endforeach ?>

    <div class="mt-[30px]">
        <h1 class="text-xl">Done</h1>
        <hr>
        <div class="flex w-[100%] my-3 border-[1px] bg-green-200 border-green-300 p-3 justify-between rounded-sm">
            <p class="text-clip">Go to shower</p>
            <!-- <div class="flex space-x-1">
                    <a href="javascript:;" class="text-blue-500 underline hover:text-blue-600">Delete</a>
                    <a href="javascript:;" class="text-blue-500 underline hover:text-blue-600">Edit</a>
                </div> -->
        </div>
    </div>

</div>

<script>
    function changeStatus(id) {
        fetch("/todo/changeStatus/", {
                method: "POST",
                body: {}
            })
            .then(response => response.json())
            .then(data => console.info(data))
    }
</script>