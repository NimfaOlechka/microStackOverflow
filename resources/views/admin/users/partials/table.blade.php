<div class="overflow-x-auto">
    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="border-b">
                <th class="p-3">ID</th>
                <th class="p-3">Name</th>
                <th class="p-3">Username</th>
                <th class="p-3">Role</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
                @include('admin.users.components.row', ['user' => $user])
            @empty
                <tr>
                    <td colspan="4" class="p-3">No users found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
