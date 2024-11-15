<form method="POST" action="{{ route('login.custom') }}">
    @csrf
    <div>
        <label>Username</label>
        <input type="text" name="name" required>
    </div>
    <div>
        <label>Password</label>
        <input type="password" name="password" required>
    </div>
    <div>
        <label>Role</label>
        <select name="role" required>
            <option value="admin">Admin</option>
            <option value="librarian">Librarian</option>
        </select>
    </div>
    <button type="submit">Login</button>
</form>
