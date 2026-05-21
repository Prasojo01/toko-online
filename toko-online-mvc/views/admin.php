<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - EliteStore</title>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;600;700&family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
            background-attachment: fixed;
            color: #f8f9fa;
            min-height: 100vh;
        }

        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                radial-gradient(circle at 20% 50%, rgba(212, 175, 55, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(83, 52, 131, 0.1) 0%, transparent 50%);
            pointer-events: none;
            animation: backgroundPulse 15s ease-in-out infinite;
        }

        @keyframes backgroundPulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.8; }
        }

        .header {
            background: rgba(26, 26, 46, 0.95);
            backdrop-filter: blur(20px);
            padding: 1.5rem 5%;
            border-bottom: 1px solid rgba(212, 175, 55, 0.2);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .header-content {
            max-width: 1400px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-family: 'Cormorant Garamond', serif;
            font-size: 2rem;
            font-weight: 700;
            background: linear-gradient(135deg, #d4af37 0%, #f4d03f 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .admin-actions {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        .btn {
            padding: 0.7rem 1.5rem;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-primary {
            background: linear-gradient(135deg, #d4af37 0%, #f4d03f 100%);
            color: #1a1a2e;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(212, 175, 55, 0.4);
        }

        .btn-secondary {
            background: rgba(255, 255, 255, 0.1);
            color: #f8f9fa;
            border: 1px solid rgba(212, 175, 55, 0.3);
        }

        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.15);
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 3rem 5%;
            position: relative;
            z-index: 1;
        }

        .page-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 3rem;
            text-align: center;
            margin-bottom: 1rem;
            background: linear-gradient(135deg, #d4af37 0%, #f4d03f 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .page-subtitle {
            text-align: center;
            color: rgba(248, 249, 250, 0.7);
            margin-bottom: 3rem;
        }

        .alert {
            padding: 1rem 1.5rem;
            border-radius: 15px;
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            gap: 0.8rem;
            animation: slideDown 0.5s ease;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .alert-success {
            background: rgba(40, 167, 69, 0.2);
            border: 1px solid rgba(40, 167, 69, 0.4);
            color: #51cf66;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
        }

        .stat-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(212, 175, 55, 0.2);
            border-radius: 20px;
            padding: 2rem;
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            border-color: #d4af37;
        }

        .stat-icon {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            background: linear-gradient(135deg, #d4af37 0%, #f4d03f 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .stat-value {
            font-size: 2.5rem;
            font-weight: 700;
            color: #d4af37;
            margin-bottom: 0.5rem;
        }

        .stat-label {
            color: rgba(248, 249, 250, 0.7);
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .section-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 2rem;
            background: linear-gradient(135deg, #d4af37 0%, #f4d03f 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .table-container {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(212, 175, 55, 0.2);
            border-radius: 20px;
            padding: 2rem;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: rgba(212, 175, 55, 0.1);
            color: #d4af37;
            padding: 1rem;
            text-align: left;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 0.85rem;
            border-bottom: 2px solid rgba(212, 175, 55, 0.3);
        }

        td {
            padding: 1rem;
            border-bottom: 1px solid rgba(212, 175, 55, 0.1);
            color: rgba(248, 249, 250, 0.9);
        }

        tr:hover {
            background: rgba(212, 175, 55, 0.05);
        }

        .product-img {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 10px;
            border: 2px solid rgba(212, 175, 55, 0.3);
        }

        .action-buttons {
            display: flex;
            gap: 0.5rem;
        }

        .btn-small {
            padding: 0.5rem 1rem;
            font-size: 0.85rem;
            border-radius: 8px;
        }

        .btn-edit {
            background: rgba(13, 110, 253, 0.2);
            color: #4dabf7;
            border: 1px solid rgba(13, 110, 253, 0.4);
        }

        .btn-edit:hover {
            background: rgba(13, 110, 253, 0.3);
        }

        .btn-delete {
            background: rgba(220, 53, 69, 0.2);
            color: #ff6b6b;
            border: 1px solid rgba(220, 53, 69, 0.4);
        }

        .btn-delete:hover {
            background: rgba(220, 53, 69, 0.3);
        }

        /* Modal */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(10px);
            z-index: 2000;
            align-items: center;
            justify-content: center;
            animation: fadeIn 0.3s ease;
        }

        .modal.active {
            display: flex;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .modal-content {
            background: rgba(26, 26, 46, 0.95);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(212, 175, 55, 0.3);
            border-radius: 25px;
            padding: 2.5rem;
            width: 90%;
            max-width: 600px;
            max-height: 90vh;
            overflow-y: auto;
            animation: slideUp 0.3s ease;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .modal-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 2rem;
            background: linear-gradient(135deg, #d4af37 0%, #f4d03f 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .close-btn {
            background: none;
            border: none;
            color: #d4af37;
            font-size: 2rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .close-btn:hover {
            transform: rotate(90deg);
            color: #f4d03f;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            color: #d4af37;
            margin-bottom: 0.5rem;
            font-weight: 500;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 0.9rem 1.2rem;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(212, 175, 55, 0.3);
            border-radius: 12px;
            color: #f8f9fa;
            font-size: 1rem;
            font-family: 'Montserrat', sans-serif;
            transition: all 0.3s ease;
        }

        .form-group textarea {
            resize: vertical;
            min-height: 100px;
        }

        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            outline: none;
            border-color: #d4af37;
            background: rgba(255, 255, 255, 0.1);
        }

        @media (max-width: 768px) {
            .page-title {
                font-size: 2rem;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .section-header {
                flex-direction: column;
                gap: 1rem;
                align-items: flex-start;
            }

            .table-container {
                padding: 1rem;
            }

            table {
                font-size: 0.85rem;
            }

            th, td {
                padding: 0.7rem 0.5rem;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <div class="header-content">
            <div class="logo">ELITESTORE ADMIN</div>
            <div class="admin-actions">
                <a href="index.php?action=home" class="btn btn-secondary">
                    <i class="fas fa-home"></i> Back to Store
                </a>
                <a href="index.php?action=logout" class="btn btn-secondary">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container">
        <h1 class="page-title">Admin Dashboard</h1>
        <p class="page-subtitle">Manage your products and inventory</p>

        <?php if(isset($_GET['success'])): ?>
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i>
                <?php 
                    if($_GET['success'] === 'added') echo 'Product successfully added!';
                    elseif($_GET['success'] === 'updated') echo 'Product successfully updated!';
                    elseif($_GET['success'] === 'deleted') echo 'Product successfully deleted!';
                ?>
            </div>
        <?php endif; ?>

        <!-- Statistics -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon"><i class="fas fa-box"></i></div>
                <div class="stat-value"><?php echo $stmt->rowCount(); ?></div>
                <div class="stat-label">Total Products</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon"><i class="fas fa-chart-line"></i></div>
                <div class="stat-value">
                    <?php 
                    $total_value = 0;
                    foreach($stmt->fetchAll() as $row) {
                        $total_value += $row['price'] * $row['stock'];
                    }
                    $stmt = $this->product->readAll(); // Reset for table
                    echo 'Rp ' . number_format($total_value, 0, ',', '.');
                    ?>
                </div>
                <div class="stat-label">Inventory Value</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon"><i class="fas fa-warehouse"></i></div>
                <div class="stat-value">
                    <?php 
                    $total_stock = 0;
                    foreach($stmt->fetchAll() as $row) {
                        $total_stock += $row['stock'];
                    }
                    $stmt = $this->product->readAll(); // Reset for table
                    echo $total_stock;
                    ?>
                </div>
                <div class="stat-label">Total Stock</div>
            </div>
        </div>

        <!-- Products Table -->
        <div class="section-header">
            <h2 class="section-title">Product Management</h2>
            <button class="btn btn-primary" onclick="openAddModal()">
                <i class="fas fa-plus"></i> Add New Product
            </button>
        </div>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if($stmt->rowCount() > 0) {
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            extract($row);
                            echo '
                            <tr>
                                <td><img src="' . htmlspecialchars($image_url) . '" class="product-img" alt="' . htmlspecialchars($name) . '"></td>
                                <td><strong>' . htmlspecialchars($name) . '</strong></td>
                                <td>' . htmlspecialchars($category) . '</td>
                                <td>Rp ' . number_format($price, 0, ',', '.') . '</td>
                                <td>' . $stock . '</td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="btn btn-small btn-edit" onclick=\'openEditModal(' . json_encode($row) . ')\'>
                                            <i class="fas fa-edit"></i> Edit
                                        </button>
                                        <button class="btn btn-small btn-delete" onclick="deleteProduct(' . $id . ')">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </div>
                                </td>
                            </tr>';
                        }
                    } else {
                        echo '<tr><td colspan="6" style="text-align: center;">No products found.</td></tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Add/Edit Modal -->
    <div id="productModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="modalTitle">Add New Product</h2>
                <button class="close-btn" onclick="closeModal()">&times;</button>
            </div>
            <form id="productForm" method="POST">
                <input type="hidden" name="id" id="productId">
                
                <div class="form-group">
                    <label>Product Name</label>
                    <input type="text" name="name" id="productName" required>
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" id="productDescription" required></textarea>
                </div>

                <div class="form-group">
                    <label>Price (Rp)</label>
                    <input type="number" name="price" id="productPrice" min="0" step="1000" required>
                </div>

                <div class="form-group">
                    <label>Stock</label>
                    <input type="number" name="stock" id="productStock" min="0" required>
                </div>

                <div class="form-group">
                    <label>Category</label>
                    <select name="category" id="productCategory" required>
                        <option value="">Select Category</option>
                        <option value="Electronics">Electronics</option>
                        <option value="Accessories">Accessories</option>
                        <option value="Fashion">Fashion</option>
                        <option value="Home & Living">Home & Living</option>
                        <option value="Sports">Sports</option>
                        <option value="Books">Books</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Image URL</label>
                    <input type="url" name="image_url" id="productImage" required>
                </div>

                <button type="submit" class="btn btn-primary" style="width: 100%; justify-content: center;">
                    <i class="fas fa-save"></i> Save Product
                </button>
            </form>
        </div>
    </div>

    <script>
        function openAddModal() {
            document.getElementById('modalTitle').textContent = 'Add New Product';
            document.getElementById('productForm').action = 'index.php?action=add_product';
            document.getElementById('productForm').reset();
            document.getElementById('productId').value = '';
            document.getElementById('productModal').classList.add('active');
        }

        function openEditModal(product) {
            document.getElementById('modalTitle').textContent = 'Edit Product';
            document.getElementById('productForm').action = 'index.php?action=edit_product';
            document.getElementById('productId').value = product.id;
            document.getElementById('productName').value = product.name;
            document.getElementById('productDescription').value = product.description;
            document.getElementById('productPrice').value = product.price;
            document.getElementById('productStock').value = product.stock;
            document.getElementById('productCategory').value = product.category;
            document.getElementById('productImage').value = product.image_url;
            document.getElementById('productModal').classList.add('active');
        }

        function closeModal() {
            document.getElementById('productModal').classList.remove('active');
        }

        function deleteProduct(id) {
            if(confirm('Are you sure you want to delete this product?')) {
                window.location.href = 'index.php?action=delete_product&id=' + id;
            }
        }

        // Close modal when clicking outside
        document.getElementById('productModal').addEventListener('click', function(e) {
            if(e.target === this) {
                closeModal();
            }
        });

        // Auto-hide success alert
        setTimeout(() => {
            const alert = document.querySelector('.alert');
            if(alert) {
                alert.style.animation = 'fadeOut 0.5s ease forwards';
                setTimeout(() => alert.remove(), 500);
            }
        }, 3000);
    </script>
</body>
</html>
