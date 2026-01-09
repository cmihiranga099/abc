<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-gradient-to-r from-purple-600 to-pink-600 border border-transparent rounded-lg font-semibold text-sm text-white uppercase tracking-wider hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-purple-400 focus:ring-offset-2 transition transform hover:-translate-y-0.5']) }}>
    {{ $slot }}
</button>
