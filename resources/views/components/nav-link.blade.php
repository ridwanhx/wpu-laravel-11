<!-- Episode 6 : View Data - Mengirim data ke view -->
 <!-- Membuat properti untuk komponen tertentu -->
  @props(['active' => FALSE])

<a {{ $attributes }} class="{{ $active ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium" aria-current="{{ $active ? 'page' : false }}">
    {{ $slot }}
</a>