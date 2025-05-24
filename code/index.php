    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Store</title>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    </head>

    <body>
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 ">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">All Product </h1>

                </div>
            </div>
        </header>
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center"></div>
                <?php

                require_once "vendor/autoload.php";
                require_once "config/database.php";

                use App\Database;
                use App\Product;

                $db = Database::get_instance($config)->get_connection();

                // $new_product= Product::create($db,"phone",100,200,20);
                //$product=Product::find_by_id($db,1);
                //var_dump($product);

                foreach (Product::get_All($db) as $product) :
                    // echo $value->get_name()."      ".$value->get_price();

                    // var_dump(Product::get_All($db));


                ?>

                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><?= $product->get_name() ?></h5>
                                    <!-- Product reviews-->
                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                    </div>
                                    <!-- Product price-->
                                    <span
                                        class="text-muted text-decoration-line-through">$<?= $product->price_before_discount() ?></span>
                                    <?= $product->get_price() ?>
                                </div>
                            </div>
                        </div>
                    </div>
        </section>
    </body>
    <?php endforeach; ?>