<html lang="en">

@if ($user->role == env('ACL_ADMIN_ROLE')))
    @include('admin.admin')
@endif

@if ($user->role == "2")
    @include('user')
@endif

</body>

</html>
