
    document.getElementById('add-scientist-role').addEventListener('click', function() {
        var container = document.getElementById('scientist-roles');
        var index = container.getElementsByClassName('form-group').length;
        var group = document.createElement('div');
        group.className = 'form-group';
        group.innerHTML = `
            <label for="scientist">Scientist</label>
            <select class="form-control" name="scientists[${index}][id]" required>
                @foreach($scientists as $scientist)
                    <option value="{{ $scientist->id }}">{{ $scientist->name }}</option>
                @endforeach
            </select>
            <label for="role">Role</label>
            <select class="form-control" name="scientists[${index}][role_id]" required>
                @foreach($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                @endforeach
            </select>
        `;
        container.appendChild(group);
    });
