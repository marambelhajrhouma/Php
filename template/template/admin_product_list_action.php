<!-- list-products.php -->
<?php
include_once('../controller/productController.php');
$productController = new ProductController();

// Fetch all products
$products = $productController->listProducts();
?>
<div class="container-fluid pt-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">Just Arrived</span></h2>
    </div>
    <div class="row px-xl-5 pb-3">
        <?php foreach ($products as $product) : ?>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                    <img class="img-fluid w-100" src="img/<?php echo $product['photo']; ?>" alt="">
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
    <h6 class="text-truncate mb-3"><?php echo $product['pname']; ?></h6>
    <div class="d-flex justify-content-center">
        <h6>$<?php echo $product['price']; ?></h6>
        <!-- Remove the section related to old_price -->
    </div>
</div>
                    <div class="card-footer d-flex justify-content-between bg-light border">
                        <a href="view_product.php?id=<?php echo $product['id']; ?>" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                        <a href="edit_product.php?id=<?php echo $product['id']; ?>" class="btn btn-sm text-dark p-0"><i class="fas fa-edit text-primary mr-1"></i>Edit</a>
                        <a href="delete_product.php?id=<?php echo $product['id']; ?>" class="btn btn-sm text-dark p-0" onclick="return confirm('Are you sure you want to delete this product?')"><i class="fas fa-trash text-danger mr-1"></i>Delete</a>

                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
