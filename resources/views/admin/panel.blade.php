<x-layout>
    <section class="max-w-4xl mx-auto mt-10">
        <h1 class="text-3xl font-bold mb-8">Admin Panel</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <a href="{{ route('admin.users.index') }}"
               class="block bg-blue-500 hover:bg-blue-600 text-white text-center font-bold rounded-lg p-8">
                Administrate Users
            </a>

            <a href="/admin/questions"
               class="block bg-gray-700 hover:bg-gray-800 text-white text-center font-bold rounded-lg p-8">
                Administrate Content
            </a>
        </div>
    </section>
</x-layout>
