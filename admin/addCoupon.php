<?php include "header.php"; ?>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Add Coupon</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Add Coupon</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <form action="addCP.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">General</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                            title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="inputName">Coupon code</label>
                                        <input type="text" id="inputName" class="form-control" name="coupon_code">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputStatus">Coupon type</label>
                                        <select id="inputStatus" class="form-control custom-select" name="coupon_type"
                                            required>
                                            <option selected disabled>Select one</option>
                                            <?php
                                            $getCoupon = $coupon->getCouponTypeName();
                                            foreach ($getCoupon as $values):
                                                ?>
                                                <option value=<?php echo $values['coupon_type'] ?>>
                                                    <?php echo $values['type_name'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Coupon discount</label>
                                        <input type="text" id="inputName" class="form-control" name="coupon_discount"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputDescription">Min order</label>
                                        <input type="text" id="inputMinOrder" class="form-control" name="min_order"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPrice">Coupon quantity</label>
                                        <input type="text" id="inputPrice" class="form-control" name="coupon_quantity"
                                            onblur="checkPrice(this)">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputExpired">Expired date</label>
                                        <input type="text" id="inputExpired" class="form-control" name="coupon_expired"
                                            placeholder="Example: 2023-31-12" required>
                                    </div>
                                    <script>
                                        document.addEventListener('DOMContentLoaded', function () {
                                            const input = document.getElementById('inputExpired');
                                            input.addEventListener('blur', function () {
                                                const enteredDate = input.value;
                                                const parsedDate = new Date(enteredDate);
                                                if (!isNaN(parsedDate.getTime())) {
                                                    const formattedDate = parsedDate.toISOString().split('T')[0];
                                                    input.value = formattedDate;
                                                } else {
                                                    alert('Invalid date! Please enter in Year-Month-Day format.');
                                                    input.value = '';
                                                }
                                            });
                                        });
                                    </script>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <input type="submit" name="submit" value="Create Coupon" class="btn btn-success float-right"
                                style="margin-bottom:9px">
                        </div>
                    </div>
                </form>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <?php include "footer.php" ?>