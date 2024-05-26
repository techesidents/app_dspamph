<?php if($_settings->chk_flashdata('success')): ?>
<script>
    alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
</script>
<?php endif;?>

<style>
    .btn-filter.active {
        background-color: #20c997 !important;
        color: white !important;
		border-right: 10px;
		
    }

    .user-search-filter {
        display: flex;
        align-items: center;
		
    }

</style>

<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">List of System Users</h3>
        <div class="card-tools">
		<div>
		<a href="?page=user/manage_user" class="btn btn-flat btn-primary">
                    <span class="fas fa-plus"></span> Create New
                </a>
            <div class="user-search-filter">
                <select class="form-control" id="userTypeFilter">
                    <option value="all">All User Types</option>
                    <option value="admin_manager">Admin Managers</option>
                    <option value="administrator">Administrators</option>
                    <option value="client">Clients</option>
                </select>
                
            </div>
		</div>
        </div>
    </div>
    <div class="card-body">
        <div class="container-fluid">
            <div class="container-fluid">
                <table class="table table-hover table-striped" id="user-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>User Type</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $i = 1;
                            $qry = $conn->query("SELECT *,concat(firstname,' ',lastname) as name from `users` where id != '1' order by concat(firstname,' ',lastname) asc ");
                            while($row = $qry->fetch_assoc()):
                        ?>
                            <tr data-type="<?php echo ($row['type'] == 1) ? 'admin_manager' : (($row['type'] == 2) ? 'client' : 'administrator'); ?>">
                                <td class="text-center"><?php echo $i++; ?></td>
                                <td><?php echo ucwords($row['name']) ?></td>
                                <td><p class="m-0 truncate-1"><?php echo $row['username'] ?></p></td>
                                <td align="left">
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

<script>
    $(document).ready(function(){
        // Initialize filter functions
        $('#userTypeFilter').on('change', function () {
            var selectedType = $(this).val();
            if (selectedType === 'all') {
                $('#user-table tbody tr').show();
            } else {
                $('#user-table tbody tr').hide().filter('[data-type="' + selectedType + '"]').show();
            }
        });

        $('.btn-filter').on('click', function () {
            var type = $('#userTypeFilter').val();
            if (type === 'all') {
                $('#user-table tbody tr').show();
            } else {
                $('#user-table tbody tr').hide().filter('[data-type="' + type + '"]').show();
            }
        });

        $('.delete_data').click(function(){
            _conf("Are you sure to delete this User permanently?","delete_user",[$(this).attr('data-id')])
        });

        $('.table td,.table th').addClass('py-1 px-2 align-middle');
        $('.table').dataTable();

        $('#search').on('keyup', function () {
            var searchText = $(this).val().toLowerCase();
            $('#user-table tbody tr').filter(function () {
                var text = $(this).text().toLowerCase();
                $(this).toggle(text.indexOf(searchText) > -1);
            });
        });
    });

    function delete_user($id){
        start_loader();
        $.ajax({
            url:_base_url_+"classes/Users.php?f=delete",
            method:"POST",
            data:{id: $id},
            dataType:"json",
            error:err=>{
                console.log(err);
                alert_toast("An error occurred.",'error');
                end_loader();
            },
            success:function(resp){
                if(typeof resp== 'object' && resp.status == 'success'){
                    location.reload();
                } else {
                    alert_toast("An error occurred.",'error');
                    end_loader();
                }
            }
        });
    }
</script>
