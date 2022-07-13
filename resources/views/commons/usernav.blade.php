<ul class="nav nav-tabs nav-justified mb-3">
    {{-- ガイドライン --}}
    <li class="nav-item">
        <a href="{{ route('users.guidelines_show', ['id' => $user->id]) }}" class="nav-link {{ Request::routeIs('users.guidelines_show') ? 'active' : '' }}">
            ガイドライン
        </a>
    </li>
    {{-- チュートリアル --}}
    <li class="nav-item">
        <a href="{{ route('users.tutorials_show', ['id' => $user->id]) }}" class="nav-link {{ Request::routeIs('users.tutorials_show') ? 'active' : '' }}">
            チュートリアル
        </a>
    </li>
</ul>