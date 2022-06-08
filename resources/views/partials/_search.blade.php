 <form action="/listings/">
    <div class="relative border-2 bg-transparent border-gray-500 m-4 rounded-lg">
        <div class="absolute top-4 left-3">
            <i
                class="fa fa-search text-gray-400 z-20 hover:text-gray-500"
            ></i>
        </div>
        <input
            type="text"
            name="search"
            class="h-14 text-white w-full pl-10 pr-20 rounded-lg z-0 focus:shadow focus:outline-none bg-transparent "
            placeholder="Search Laravel Gigs..."
        />
        <div class="absolute top-2 right-2 bg-transparent">
            <button
                type="submit"
                class="h-10 w-20 text-white rounded-lg bg-red-500 hover:bg-red-600 bg-transparent"
            >
                Search
            </button>
        </div>
    </div>
</form>