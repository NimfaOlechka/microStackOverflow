<tr class="border-b">
    <td class="p-3">{{ $user->id }}</td>
    <td class="p-3">{{ $user->name }}</td>
    <td class="p-3">{{ $user->username }}</td>
    <td class="p-3">
        {{ $user->is_admin ? 'Admin' : 'User' }}
    </td>
</tr>
