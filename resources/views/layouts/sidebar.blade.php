<div class="card">
    <div class="card-header">
        {{auth()->user()->full_name}}
    </div>
    <div class="body">
        <ul class="nav flex-column">
            <li class="nav-item text-secondary px-2">User</li>
            <li class="nav-item"><a href="{{ route('home') }}" class="nav-link">Home</a></li>
            <li class="nav-item"><a href="{{ route('user.profile.view') }}" class="nav-link">Profile</a></li>
            <li class="nav-item text-secondary px-2">Groups</li>
            @foreach ($groups as $group)
                <li class="nav-item">
                    <a class="nav-link" href="#">{{ $group->name }}</a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
