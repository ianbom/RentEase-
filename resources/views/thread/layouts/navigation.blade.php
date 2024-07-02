<nav class="bg-white shadow mb-8">
    <div class="container mx-auto px-4 py-4 flex justify-between items-center">
        <a href="{{ url('/') }}" class="text-lg font-semibold text-gray-700 flex items-center">
            <svg class="w-6 h-6 mr-2 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M13 5v6m0 0l7 7-7-7z"></path></svg>
            Home
        </a>
        <div class="space-x-4 flex items-center">
            <a href="{{ route('create.thread') }}" class="text-blue-500 hover:text-blue-700 transition duration-300 flex items-center">
                <svg class="w-6 h-6 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Create Thread
            </a>
            <a href="{{ route('index.thread') }}" class="text-blue-500 hover:text-blue-700 transition duration-300 flex items-center">
                <svg class="w-6 h-6 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path></svg>
                Home Thread
            </a>
            <a href="{{ route('index.toko') }}" class="text-blue-500 hover:text-blue-700 transition duration-300 flex items-center">
                <svg class="w-6 h-6 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M13 5v6m0 0l7 7-7-7z"></path></svg>
                Home Toko
            </a>
            <a href="{{ route('create.toko') }}" class="text-blue-500 hover:text-blue-700 transition duration-300 flex items-center">
                <svg class="w-6 h-6 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Create Toko
            </a>
            <a href="{{ route('index.product') }}" class="text-blue-500 hover:text-blue-700 transition duration-300 flex items-center">
                <svg class="w-6 h-6 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path></svg>
                Home Product
            </a>
            <a href="{{ route('create.product') }}" class="text-blue-500 hover:text-blue-700 transition duration-300 flex items-center">
                <svg class="w-6 h-6 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Create Product
            </a>
            <a href="{{ route('wishlist.index') }}" class="text-blue-500 hover:text-blue-700 transition duration-300 flex items-center">
                <svg class="w-6 h-6 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M13 5v6m0 0l7 7-7-7z"></path></svg>
                Wish List
            </a>
            <a href="{{ route('orders.index') }}" class="text-blue-500 hover:text-blue-700 transition duration-300 flex items-center">
                <svg class="w-6 h-6 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path></svg>
                Order List
            </a>
            <a href="{{ route('vendor.order') }}" class="text-blue-500 hover:text-blue-700 transition duration-300 flex items-center">
                <svg class="w-6 h-6 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path></svg>
                Vendor Order
            </a>
        </div>
    </div>
</nav>
