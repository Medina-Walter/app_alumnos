@foreach($users as $user)
<tr>
    <td>
        @if($user->photo_path)
            <img src="{{ asset('storage/' . $user->photo_path) }}" class="w-10 h-10 rounded-full">
        @endif
    </td>
    <td>{{ $user->name }}</td>
    <td>{{ $user->email }}</td>
    <td>
        @if($user->phone)
            <a href="https://wa.me/{{ env('WHATSAPP_PREFIX') }}{{ $user->phone }}" target="_blank" class="text-green-600 underline">
                WhatsApp
            </a>
        @endif
    </td>
    <td>
        @if($user->professional_url)
            <a href="{{ $user->professional_url }}" target="_blank" class="text-blue-600 underline">
                Perfil Profesional
            </a>
        @endif
    </td>
</tr>
@endforeach
