<?php

class Categories extends Controller {
    private $model = "Category";

    public function index() {
        $this->view("admin/partials/categories_show");
        $categories = $this->model($this->model)->getAllCategories();

        return $this->view("admin/index",[
            'page' => 'categories',
            'content' => 'categories/index',
            'categories' => $categories
        ]);
    }

    public function edit($category_id) {
        $this->view("admin/partials/categories_options");
        $categories = $this->model($this->model)->getAllCategories();
        $category = $this->model($this->model)->getCategoryById($category_id);

        return $this->view("admin/index",[
            'page' => 'categories',
            'content' => 'categories/edit',
            'category' => $category,
            'categories' => $categories
        ]);
    }

    public function create() {
        $this->view("admin/partials/categories_options");
        $categories = $this->model($this->model)->getAllCategories();

        return $this->view("admin/index",[
            'page' => 'categories',
            'content' => 'categories/create',
            'categories' => $categories
        ]);
    }

    public function store() {
        if(isset($_POST['createCategory'])) {
            // Connection To Database
            $categoryDb = $this->model($this->model);

            // Get All Categories
            $categories = $categoryDb->getAllCategories();

            // Get Information From Form
            $category_parent = isset($_POST['category_parent']) ? $_POST['category_parent'] : '';
            $category_name = isset($_POST['category_name']) ? $_POST['category_name'] : '';

            $error = '';

            // Validate Category Parent
            if(!empty($category_parent)) {
                if($categories < 0) {
                    $error = 'Invalid Parent Category!!!';
                } else {
                    // Validate Category Name
                    if(!empty($category_name)) {
                        if(!preg_match('/^[a-zA-Z][a-zA-Z\s]*$/', $category_name)) {
                            $error = 'Invalid Category Name!!!';
                        } else {
                            $checkExistedCategory = $categoryDb->checkExistedCategory($category_name,$category_parent);
                            if(!empty($checkExistedCategory)) {
                                $error = 'This Category Is Already Existed!!!';
                            }
                        }
                    } else $error = 'Category Name Can not Be Empty!!!';
                }
            } else {
                $error = 'Please Choose A Parent Category!!!';
            }

            // Insert Category Into Database
            if(empty($error)) {
                $request = [
                    'category_name' => $category_name,
                    'category_parent' => $category_parent
                ];
                $categoryDb->create($request);

                // Redirect To Categories
                $redirect = $_SESSION['mainUrl'] . '/admin/categories';
                header("location:$redirect");
                exit();
                return;
            } else {
                // Return Categories Create With Error
                $this->view("admin/partials/categories_options");
                
                return $this->view("admin/index",[
                    'content' => 'categories/create',
                    'page' => 'categories',
                    'error' => $error,
                    'post' => $_POST,
                    'categories' => $categories
                ]);
            }
        }
    }

    public function update() {
        if(isset($_POST['updateCategory'])) {
            // Connection To Database
            $categoryDb = $this->model($this->model);

            // Get All Categories
            $categories = $categoryDb->getAllCategories();

            // Get Information From Form
            $category_id = isset($_POST['category_id']) ? $_POST['category_id'] : '';
            $category_parent = isset($_POST['category_parent']) ? $_POST['category_parent'] : '';
            $category_name = isset($_POST['category_name']) ? $_POST['category_name'] : '';

            $error = '';

            // Validate Category Parent
            if(!empty($category_parent)) {
                if($categories < 0) {
                    $error = 'Invalid Parent Category!!!';
                } else {
                    // Validate Category Name
                    if(!empty($category_name)) {
                        if(!preg_match('/^[a-zA-Z][a-zA-Z\s]*$/', $category_name)) {
                            $error = 'Invalid Category Name!!!';
                        } else {
                            $checkExistedCategory = $categoryDb->checkExistedCategoryForUpdate($category_name,$category_parent,$category_id);
                            if(!empty($checkExistedCategory)) {
                                $error = 'This Category Is Already Existed!!!';
                            }
                        }
                    } else $error = 'Category Name Can not Be Empty!!!';
                }
            } else {
                $error = 'Please Choose A Parent Category!!!';
            }

            // Insert Category Into Database
            if(empty($error)) {
                $request = [
                    'category_id' => $category_id,
                    'category_name' => $category_name,
                    'category_parent' => $category_parent
                ];
                $categoryDb->update($request);

                // Redirect To Categories
                $redirect = $_SESSION['mainUrl'] . '/admin/categories';
                header("location:$redirect");
                exit();
                return;
            } else {
                // Return Categories Edit With Error
                $this->view("admin/partials/categories_options");
                
                return $this->view("admin/index",[
                    'content' => 'categories/edit',
                    'page' => 'categories',
                    'error' => $error,
                    'post' => $_POST,
                    'categories' => $categories
                ]);
            }
        }
    }

    public function delete($category_id, $reg_date) {
        $this->model($this->model)->destroy([
            'category_id' => $category_id,
            'reg_date' => $reg_date
        ]);
        // Delete All Sub Categories
        // $categories = $this->model($this->model)->getAllCategories();
        // for($i = 1; $i < 1000; $i++) {
        //     if(!isset($categories[$i][$i]) != $i) {
        //         echo $i . "<br>";
        //     }
        // }
        // $i = 1;
        // foreach($categories as $category) {
        //     if($category['category_id'] != $i++) {
        //         echo $i . "<br>";
        //     }
        // }
        // exit();
        // Redirect To Categories Index
        $redirect = $_SESSION['mainUrl'] . '/admin/categories';
        header("location:$redirect");
        exit();
        return;
    }
}