<x-layout>
    <section class="max-w-6xl mx-auto mt-10 px-4">
        <div class="flex items-center justify-between mb-8">
            <h1 class="text-3xl font-bold">Administrate Users</h1>

            <a href="{{ route('admin.panel') }}"
               class="text-blue-600 hover:underline">
                Back to Admin Panel
            </a>
        </div>

        @include('admin.users.partials.table', ['users' => $users])

        <div class="mt-6">
            {{ $users->links() }}
        </div>
    </section>
</x-layout>
