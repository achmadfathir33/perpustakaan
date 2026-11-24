<nav class="navbar">
    <div class="brand">
        <a href="{{ route('books.index') }}">📚 Perpustakaan Digital Kampus</a>
    </div>

    <ul class="nav-links">
        <li>
            <a href="{{ route('books.index') }}"
               class="{{ request()->routeIs('books.*') ? 'active' : '' }}">
                Buku
            </a>
        </li>
        <li>
            <a href="{{ route('categories.index') }}"
               class="{{ request()->routeIs('categories.*') ? 'active' : '' }}">
                Kategori
            </a>
        </li>
        <li>
            <a href="{{ route('members.index') }}"
               class="{{ request()->routeIs('members.*') ? 'active' : '' }}">
                Anggota
            </a>
        </li>
        <li>
            @if (\Illuminate\Support\Facades\Route::has('loans.index'))
                <a href="{{ route('loans.index') }}"
                   class="{{ request()->routeIs('loans.*') ? 'active' : '' }}">
                    Peminjaman
                </a>
            @else
                <a href="#" class="disabled" title="Belum tersedia">
                    Peminjaman
                </a>
            @endif
        </li>
    </ul>
</nav>