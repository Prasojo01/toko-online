<?php
// controllers/Controller.php
// Main Controller dengan Routing

session_start();

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../models/Product.php';

class Controller {
    private $db;
    private $user;
    private $product;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->user = new User($this->db);
        $this->product = new Product($this->db);
    }

    // Handle routing
    public function handleRequest() {
        $action = isset($_GET['action']) ? $_GET['action'] : 'home';
        
        switch($action) {
            case 'home':
                $this->showHome();
                break;
            case 'login':
                $this->showLogin();
                break;
            case 'logout':
                $this->logout();
                break;
            case 'register':
                $this->showRegister();
                break;
            case 'admin':
                $this->showAdmin();
                break;
            case 'add_product':
                $this->addProduct();
                break;
            case 'edit_product':
                $this->editProduct();
                break;
            case 'delete_product':
                $this->deleteProduct();
                break;
            case 'search':
                $this->searchProducts();
                break;
            default:
                $this->showHome();
        }
    }

    // Show home page
    private function showHome() {
        $stmt = $this->product->readAll();
        include __DIR__ . '/../views/home.php';
    }

    // Show login page
    private function showLogin() {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->user->username = $_POST['username'];
            $this->user->password = $_POST['password'];
            
            if($this->user->login()) {
                $_SESSION['user_id'] = $this->user->id;
                $_SESSION['username'] = $this->user->username;
                $_SESSION['full_name'] = $this->user->full_name;
                $_SESSION['role'] = $this->user->role;
                
                if($this->user->role === 'admin') {
                    header("Location: index.php?action=admin");
                } else {
                    header("Location: index.php?action=home");
                }
                exit();
            } else {
                $error = "Username atau password salah!";
            }
        }
        include __DIR__ . '/../views/login.php';
    }

    // Show register page
    private function showRegister() {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->user->username = $_POST['username'];
            $this->user->email = $_POST['email'];
            $this->user->password = $_POST['password'];
            $this->user->full_name = $_POST['full_name'];
            $this->user->role = 'customer';
            
            if($this->user->create()) {
                $success = "Registrasi berhasil! Silakan login.";
            } else {
                $error = "Registrasi gagal. Username atau email mungkin sudah digunakan.";
            }
        }
        include __DIR__ . '/../views/register.php';
    }

    // Logout
    private function logout() {
        session_destroy();
        header("Location: index.php?action=home");
        exit();
    }

    // Show admin panel
    private function showAdmin() {
        if(!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
            header("Location: index.php?action=login");
            exit();
        }
        $stmt = $this->product->readAll();
        include __DIR__ . '/../views/admin.php';
    }

    // Add product
    private function addProduct() {
        if(!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
            header("Location: index.php?action=login");
            exit();
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->product->name = $_POST['name'];
            $this->product->description = $_POST['description'];
            $this->product->price = $_POST['price'];
            $this->product->stock = $_POST['stock'];
            $this->product->category = $_POST['category'];
            $this->product->image_url = $_POST['image_url'];
            
            if($this->product->create()) {
                header("Location: index.php?action=admin&success=added");
                exit();
            }
        }
    }

    // Edit product
    private function editProduct() {
        if(!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
            header("Location: index.php?action=login");
            exit();
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->product->id = $_POST['id'];
            $this->product->name = $_POST['name'];
            $this->product->description = $_POST['description'];
            $this->product->price = $_POST['price'];
            $this->product->stock = $_POST['stock'];
            $this->product->category = $_POST['category'];
            $this->product->image_url = $_POST['image_url'];
            
            if($this->product->update()) {
                header("Location: index.php?action=admin&success=updated");
                exit();
            }
        }
    }

    // Delete product
    private function deleteProduct() {
        if(!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
            header("Location: index.php?action=login");
            exit();
        }

        if(isset($_GET['id'])) {
            $this->product->id = $_GET['id'];
            if($this->product->delete()) {
                header("Location: index.php?action=admin&success=deleted");
                exit();
            }
        }
    }

    // Search products
    private function searchProducts() {
        $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
        $stmt = $this->product->search($keyword);
        include __DIR__ . '/../views/home.php';
    }
}
?>
