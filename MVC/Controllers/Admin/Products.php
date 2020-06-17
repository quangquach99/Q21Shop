<?php

class Products extends Controller {
    private $model = "Product";
    private $relatedModel = "Category";

    public function index($page = 0) {
        // Number Of Products Per Page
        $numberOfUsersPerPage = 4;

        // Get Max Page
        $numberOfPages = count($this->model($this->model)->getAllProducts());
        $lastPage = 0;
        if($numberOfPages % $numberOfUsersPerPage > 0) {
            $lastPage = $numberOfPages / $numberOfUsersPerPage;
        } else {
            $lastPage = $numberOfPages / $numberOfUsersPerPage - 1;
        }

        // Get Products From Database
        $allProducts = $this->model($this->model)->getProducts($page * $numberOfUsersPerPage,$numberOfUsersPerPage);
        
        // Get The Pagination
        $this->view("admin/partials/pagination");

        // Return View With All Users
        return $this->view("admin/index",[
            'content' => 'products/index',
            'page' => 'products',
            'products' => $allProducts,
            'pagination' => $page,
            'lastPage' => $lastPage
        ]);
    }

    public function create() {
        // Get Sub Categories
        $this->view("admin/partials/categories_options");
        $categories = $this->model($this->relatedModel)->getAllCategories();

        return $this->view("admin/index",[
            'page' => 'products',
            'content' => 'products/create',
            'categories' => $categories
        ]);
    }

    public function edit($product_id) {
        //Get Sub Categories
        $this->view("admin/partials/categories_options");
        $categories = $this->model($this->relatedModel)->getAllCategories();

        // Get Product By Product Id
        $product = $this->model($this->model)->getProductById($product_id);

        return $this->view("admin/index",[
            'page' => 'products',
            'content' => 'products/edit',
            'product' => $product,
            'categories' => $categories
        ]);
    }

    public function store() {
        if(isset($_POST['createProduct'])) {
            // Connection
            $productDb = $this->model($this->model);

            $error = '';

            // Validate Category
            $product_category = isset($_POST['product_category']) ? $_POST['product_category'] : '';
            if($product_category < 0 || empty($product_category)) {
                $error = 'Invalid Category!!!';
            }

            // Validate Product Code
            $product_code = isset($_POST['product_code']) ? $_POST['product_code'] : '';
            if(!empty($product_code)) {
                if(preg_match('/^[a-zA-Z0-9-]{1,10}$/', $product_code)) {
                    $checkExistedProductCode = $productDb->getProductByCode($product_code);
                    if(!empty($checkExistedProductCode)) $error = 'Product Already Existed!!!';
                } else {
                    $error = 'Invalid Product Code!!!';
                }
            } else {
                $error = 'Product Code Can Not Be Empty!!!';
            }

            // Validate Product Name
            $product_name = isset($_POST['product_name']) ? $_POST['product_name'] : '';
            if(!empty($product_name)) {
                if(!preg_match("/^([a-zA-Z0-9'-_ ]+)$/",$product_name)) {
                    $error = 'Invalid Product Name!!!';
                }
            } else {
                $error = 'Product Name Can Not Be Empty!!!';
            }

            // Validate Price
            $product_price = isset($_POST['product_price']) ? $_POST['product_price'] : '';
            if($product_price <= 0) {
                $error = 'Invalid Price!!!';
            } else if(empty($product_price)) {
                $error = 'Price Can Not Be Empty!!!';
            }

            // Product Highlight
            $product_highlight = isset($_POST['product_highlight']) ? $_POST['product_highlight'] : 0;

            // Product Quantity
            $product_quantity = isset($_POST['product_quantity']) ? $_POST['product_quantity'] : '';
            if($product_quantity <= 0) {
                $error = 'Invalid Quantity!!!';
            } else if(empty($product_quantity)) {
                $error = 'Quantity Can Not Be Empty!!!';
            }

            // Details And Description Of The Product
            $product_details = isset($_POST['product_details']) ? $_POST['product_details'] : '';
            $product_description = isset($_POST['product_description']) ? $_POST['product_description'] : '';

            // Validate Product Image
            $product_image = $_FILES['product_image'];
            $fileName = $_FILES['product_image']['name'];
            $fileType = $_FILES['product_image']['type'];
            $fileTmpName = $_FILES['product_image']['tmp_name'];
            $fileError = $_FILES['product_image']['error'];
            $fileSize = $_FILES['product_image']['size'];
            // Get The File Extension
            $fileExt = explode('.', $fileName); 
            // make sure the extension of the file is always lowercase, just a lowercase version of $fileExt
            $fileActualExt = strtolower(end($fileExt)); 
            // create an array with all types of the file you want to add and then compare if it suits
            $allowedTypes = array('jpg','png','jpeg','pdf'); 
            // Where To Upload Product Image
            $fileNameNew = '';
            $fileDestination = '';


            if(in_array($fileActualExt, $allowedTypes)) {
                if ($fileError === 0) {
                    if ($fileSize < 1000000) {
                        $fileNameNew = $product_code . "." . $fileActualExt;
                        $fileDestination = "./public/img/".$fileNameNew;
                    } else {
                        $error = "Your image is to large!";
                    }
                } else {
                    $error = "There was an error uploading your image!!!";
                }
            } else {
                $error = "You can not upload files of this type!!!";
            }
            //the reason you need $fileActualExt because of the file's name "5cbc5d1bcbbba4.62456754.jpg" has 2 dots in it

            if($error === '') {
                $request = [
                    'product_category' => $product_category,
                    'product_code' => $product_code,
                    'product_name' => $product_name,
                    'product_price' => $product_price,
                    'product_highlight' => $product_highlight,
                    'product_quantity' => $product_quantity,
                    'product_details' => $product_details,
                    'product_description' => $product_description,
                    'product_image' => $fileNameNew
                ];

                $productDb->store($request);

                // Upload Product Image
                move_uploaded_file($fileTmpName, $fileDestination);
    
                // Get All Products From Database
                $allProducts = $this->model($this->model)->getAllProducts();
    
                // Return Products View With All Products And Result
                return $this->view("admin/index",[
                    'content' => 'products/index',
                    'page' => 'products',
                    'products' => $allProducts,
                    'result' => 'Added Successfully!!!'
                ]);
            } else {
                // Return Products Create With Error
                $this->view("admin/partials/categories_options");
                $categories = $this->model($this->relatedModel)->getAllCategories();

                return $this->view("admin/index",[
                    'content' => 'products/create',
                    'page' => 'products',
                    'error' => $error,
                    'post' => $_POST,
                    'categories' => $categories
                ]);
            }
        }
    }

    public function update() {
        if(isset($_POST['editProduct'])) {
            // Connection
            $productDb = $this->model($this->model);

            $error = '';

            // Get Product Id And Reg Date
            $product_id = isset($_POST['product_id']) ? $_POST['product_id'] : '';
            $reg_date = isset($_POST['reg_date']) ? $_POST['reg_date'] : '';

            // Validate Category
            $product_category = isset($_POST['product_category']) ? $_POST['product_category'] : '';
            if($product_category < 0 || empty($product_category)) {
                $error = 'Invalid Category!!!';
            }

            // Validate Product Code
            $product_code = isset($_POST['product_code']) ? $_POST['product_code'] : '';
            if(!empty($product_code)) {
                if(preg_match('/^[a-zA-Z0-9-]{1,10}$/', $product_code)) {
                    $checkExistedProductCode = $productDb->checkExistedProductCode($product_code, $product_id);
                    if(!empty($checkExistedProductCode)) $error = 'Product Code Already Existed!!!';
                } else {
                    $error = 'Invalid Product Code!!!';
                }
            } else {
                $error = 'Product Code Can Not Be Empty!!!';
            }

            // Validate Product Name
            $product_name = isset($_POST['product_name']) ? $_POST['product_name'] : '';
            if(!empty($product_name)) {
                if(!preg_match("/^([a-zA-Z0-9'-_ ]+)$/",$product_name)) {
                    $error = 'Invalid Product Name!!!';
                }
            } else {
                $error = 'Product Name Can Not Be Empty!!!';
            }

            // Validate Price
            $product_price = isset($_POST['product_price']) ? $_POST['product_price'] : '';
            if($product_price <= 0) {
                $error = 'Invalid Price!!!';
            } else if(empty($product_price)) {
                $error = 'Price Can Not Be Empty!!!';
            }

            // Product Highlight
            $product_highlight = isset($_POST['product_highlight']) ? $_POST['product_highlight'] : 0;

            // Product Quantity
            $product_quantity = isset($_POST['product_quantity']) ? $_POST['product_quantity'] : '';
            if($product_quantity <= 0) {
                $error = 'Invalid Quantity!!!';
            } else if(empty($product_quantity)) {
                $error = 'Quantity Can Not Be Empty!!!';
            }

            // Details And Description Of The Product
            $product_details = isset($_POST['product_details']) ? $_POST['product_details'] : '';
            $product_description = isset($_POST['product_description']) ? $_POST['product_description'] : '';

            // Get Old Image
            $product_old_image = isset($_POST['product_old_image']) ? $_POST['product_old_image'] : '';

            // Validate Product Image
            $product_image = $_FILES['product_image'];
            $fileName = $_FILES['product_image']['name'];
            $fileType = $_FILES['product_image']['type'];
            $fileTmpName = $_FILES['product_image']['tmp_name'];
            $fileError = $_FILES['product_image']['error'];
            $fileSize = $_FILES['product_image']['size'];
            // Get The File Extension
            $fileExt = explode('.', $fileName); 
            // make sure the extension of the file is always lowercase, just a lowercase version of $fileExt
            $fileActualExt = strtolower(end($fileExt)); 
            // create an array with all types of the file you want to add and then compare if it suits
            $allowedTypes = array('jpg','png','jpeg','pdf'); 
            // Where To Upload Product Image
            $fileNameNew = '';
            $fileDestination = '';

            if(in_array($fileActualExt, $allowedTypes)) {
                if ($fileError === 0) {
                    if ($fileSize < 1000000) {
                        $fileNameNew = $product_code . "." . $fileActualExt;
                        $fileDestination = "./public/img/".$fileNameNew;
                    } else {
                        $error = "Your image is to large!";
                    }
                } else {
                    $error = "There was an error uploading your image!!!";
                }
            } else {
                if(!empty($product_old_image)) {
                    $fileNameNew = $product_old_image;
                } else {
                    $error = "You can not upload files of this type!!!";
                }
            }
            //the reason you need $fileActualExt because of the file's name "5cbc5d1bcbbba4.62456754.jpg" has 2 dots in it

            if($error === '') {
                $request = [
                    'product_id' => $product_id,
                    'product_category' => $product_category,
                    'product_code' => $product_code,
                    'product_name' => $product_name,
                    'product_price' => $product_price,
                    'product_highlight' => $product_highlight,
                    'product_quantity' => $product_quantity,
                    'product_details' => $product_details,
                    'product_description' => $product_description,
                    'product_image' => $fileNameNew,
                    'reg_date' => $reg_date
                ];

                $productDb->update($request);

                // Upload Product Image
                move_uploaded_file($fileTmpName, $fileDestination);
    
                // Get All Products From Database
                $allProducts = $this->model($this->model)->getAllProducts();
    
                // Return Products View With All Products And Result
                return $this->view("admin/index",[
                    'content' => 'products/index',
                    'page' => 'products',
                    'products' => $allProducts,
                    'result' => 'Updated Successfully!!!'
                ]);
            } else {
                // Return Products Create With Error
                $this->view("admin/partials/categories_options");
                $categories = $this->model($this->relatedModel)->getAllCategories();

                $product = $this->model($this->model)->getProductById($product_id);

                return $this->view("admin/index",[
                    'content' => 'products/edit',
                    'page' => 'products',
                    'error' => $error,
                    'post' => $_POST,
                    'categories' => $categories,
                    'product' => $product
                ]);
            }
        }
    }

    public function delete($product_id, $reg_date) {
        $this->model($this->model)->destroy([
            'product_id' => $product_id,
            'reg_date' => $reg_date
        ]);

        $redirect = $_SESSION['mainUrl'] . '/admin/products';
        header("location:$redirect");
        exit();
        return;
    }
}