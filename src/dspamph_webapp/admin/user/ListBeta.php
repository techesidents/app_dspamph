<!-- ... Your previous PHP code ... -->

<style>
    .img-avatar {
        width: 45px;
        height: 45px;
        object-fit: cover;
        object-position: center center;
        border-radius: 100%;
    }

    .card-tools {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
    }

    .btn-group {
        margin-left: auto;
    }

    .user-type-filter {
        margin-left: 10px;
        margin-top: 10px;
    }
</style>

<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">List of System Users</h3>
        <div class="card-tools d-flex align-items-center">
            <a href="?page=user/manage_user" class="btn btn-flat btn-primary">
                <span class="fas fa-plus"></span> Create New
            </a>
            <div class="user-type-filter">
                <select class="form-control" id="userTypeFilter">
                    <option value="all">All User Types</option>
                    <option value="admin_manager">Admin Managers</option>
                    <option value="administrator">Administrators</option>
                    <option value="client">Clients</option>
                </select>
            </div>
            <input type="text" name="search" id="search" class="form-control" placeholder="Search by username, first name, or last name">
        </div>
    </div>
    <div class="card-body">
        <div class="container-fluid">
            <div class="container-fluid">
                <table class="table table-hover table-striped" id="user-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Avatar</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>User Type</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        $qry = $conn->query("SELECT *, concat(firstname,' ',lastname) as name from `users` where id != '1' order by concat(firstname,' ',lastname) asc ");
                        while ($row = $qry->fetch_assoc()):
                        ?>
                            <tr data-type="<?php echo ($row['type'] == 1) ? 'admin_manager' : (($row['type'] == 2) ? 'client' : 'administrator'); ?>">
                                <td class="text-center"><?php echo $i++; ?></td>
                                <td class="text-center"><img src="<?php echo validate_image($row['avatar']) ?>" class="img-avatar img-thumbnail p-0 border-2" alt="user_avatar"></td>
                                <td><?php echo ucwords($row['name']) ?></td>
                                <td><p class="m-0 truncate-1"><?php echo $row['username'] ?></p></td>
                                <td>
                                    <p class="m-0">
                                        <?php
                                        if ($row['type'] == 1) {
                                            echo "Admin Manager";
                                        } elseif ($row['type'] == 2) {
                                            echo "Client";
                                        } elseif ($row['type'] == 3) {
                                            echo "Administrator";
                                        } else {
                                            echo "Unknown";
                                        }
                                        ?>
                                    </p>
                                </td>
                                <td align="center">
                                    <button type="button" class="btn btn-flat btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                        Action
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div class="dropdown-menu" role="menu">
                                        <a class="dropdown-item" href="?page=user/manage_user&id=<?php echo $row['id'] ?>">
                                            <span class="fa fa-edit text-primary"></span> Edit
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item delete_data" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>">
                                            <span class="fa fa-trash text-danger"></span> Delete
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- ... Your previous HTML code ... -->

<script>
    $(function () {
        $('.btn-filter').on('click', function () {
            var type = $(this).data('type');
            if (type === 'all') {
                $('#user-table tbody tr').show();
            } else {
                $('#user-table tbody tr').hide().filter('[data-type="' + type + '"]').show();
            }

            $('.btn-filter').removeClass('active');
            $(this).addClass('active');
        });

        $('#userTypeFilter').on('change', function () {
            var selectedType = $(this).val();
            if (selectedType === 'all') {
                $('#user-table tbody tr').show();
            } else {
                $('#user-table tbody tr').hide().filter('[data-type="' + selectedType + '"]').show();
            }
        });

        $('#search').on('keyup', function () {
            var searchText = $(this).val().toLowerCase();
            $('#user-table tbody tr').filter(function () {
                var text = $(this).text().toLowerCase();
                $(this).toggle(text.indexOf(searchText) > -1);
            });
        });

        // Your existing JavaScript code...
    });
</script>

<style>
    .btn-filter.active {
        background-color: #20c997 !important;
        color: white !important;
    }
</style>
