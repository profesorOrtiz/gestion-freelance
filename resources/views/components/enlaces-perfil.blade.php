<div class="relative inline-block text-left">
    <!-- Notification Icon -->
    <div>
        <button
            type="button"
            class="flex items-center p-2 text-white hover:text-gray-600 focus:outline-none"
            id="perfil-button"
            aria-haspopup="true"
            aria-expanded="true"
            onclick="toggleDropdown()"
        >
            Usuario
        </button>
    </div>

    <!-- Dropdown Panel -->
    <div id="perfil-dropdown" class="absolute right-0 z-10 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 hidden" role="menu" aria-orientation="vertical" aria-labelledby="perfil-button">
        <div class="py-1" role="none">
            <div class="flex items-center justify-between px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                <a href="{{ route('dashboard') }}">Perfil</a>
            </div>
            <div class="flex items-center justify-between px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function toggleDropdown() {
        const dropdown = document.getElementById('perfil-dropdown');
        dropdown.classList.toggle('hidden');
    }

    // Close dropdown if clicked outside
    // TODO: arreglar codigo
    window.onclick = function(event) {
        if (!event.target.matches('#perfil-button')) {
            const dropdowns = document.getElementsByClassName("dropdown-content");
            for (let i = 0; i < dropdowns.length; i++) {
                const openDropdown = dropdowns[i];
                if (!openDropdown.classList.contains('hidden')) {
                    openDropdown.classList.add('hidden');
                }
            }
        }
    }
</script>
