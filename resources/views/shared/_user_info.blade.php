<a href="{{ route('users.show', $user->id) }}">
  {{-- <img src="{{ $user->gravatar('140') }}" alt="{{ $user->name }}" class="gravatar"/> --}}
  <img src="https://www.96weixin.com/Upload/20200103/1578030548289441.jpg" alt="{{ $user->name }}" class="gravatar"/>
</a>
<h1>{{ $user->name }}</h1>
