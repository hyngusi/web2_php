<div class="content">
    <h1>Quản lý người dùng</h1>
    <table>
        <tr>
            <th>Tên người dùng</th>
            <th>Quyền</th>
            <th>Hành động</th>
        </tr>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo $user['username']; ?></td>
                <td><?php echo $user['role']; ?></td>
                <td>
                    <form action="index.php?act=updateUserRole" method="post">
                        <input type="hidden" name="userId" value="<?php echo $user['id']; ?>">
                        <select name="role">
                            <option value="user" <?php if ($user['role'] == 'user')
                                echo 'selected'; ?>>User</option>
                            <option value="admin" <?php if ($user['role'] == 'admin')
                                echo 'selected'; ?>>Admin</option>
                        </select>
                        <input type="submit" value="Cập nhật">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>