<h1 class="text-5xl text-center my-[20px] block">TODOLIST</h1>
<div class="w-[600px] h-[200px] mx-auto">
    <div class="mb-6 flex space-x-2">
        <input type="text" class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleFormControlInput2" placeholder="Add todo..." name="username" />
        <button type="submit" class="inline-block px-7 py-3 bg-blue-600 text-white font-medium text-sm leading-snug uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
            Add
        </button>
    </div>

    <div class="flex w-[100%] mb-3 border-[1px] border-gray-300 p-3 justify-between rounded-sm">
        <p>Hallo from todo</p>
        <div class="flex space-x-1">
            <a href="javascript:;" class="text-blue-500 underline hover:text-blue-600" id="delete">Delete</a>
            <a href="javascript:;" class="text-blue-500 underline hover:text-blue-600">Edit</a>
        </div>
    </div>

</div>

<script>
    const deleteTodo = document.getElementById("delete")
    deleteTodo.addEventListener("click", () => {
        let confirmDelete = confirm("are you sure");

        confirmDelete ? console.info("true") : console.info("false")

    })
</script>