<footer>
                    <?= $thongtinwebsite['ten_website'] ?>
                </footer>
            </main>
        </div>

    </body>

    <style>
               thead th{
                            text-align: center;
                        }
                        
                        tbody tr td{
                            text-align: center;
                          
                        }
                        /* CSS cho phần phân trang */
                        .pagination {
    display: none; /* Ẩn phân trang ban đầu */
    justify-content: center;
    margin-top: 20px;
}

.pagination button {
    background-color: #4CAF50;
    color: white;
    border: 1px solid #4CAF50;
    padding: 8px 16px;
    margin: 0 5px;
    cursor: pointer;
}

.pagination button:hover {
    background-color: #45a049;
}

.pagination span {
    padding: 8px 16px;
    margin: 0 5px;
    font-weight: bold;
}

/* CSS để làm cho nút Previous và Next khác biệt */
#prevPage {
    background-color: #f1f1f1;
    color: black;
    border: 1px solid #ddd;
}

#nextPage {
    background-color: #4CAF50;
    color: white;
    border: 1px solid #4CAF50;
}

    </style>
<script>
       document.addEventListener("DOMContentLoaded", function () {
        var searchButton = document.querySelector(".form button");

        searchButton.addEventListener("click", function (event) {
            event.preventDefault();

            // Lấy giá trị từ các ô tìm kiếm
            var productName = document.querySelector(".form input").value.trim().toLowerCase();

            // Lặp qua danh sách sản phẩm
            var rows = document.querySelectorAll(".table tbody tr");

            for (var i = 0; i < rows.length; i++) {
                var productNameColumn = rows[i].querySelector("td:nth-child(2)").textContent.toLowerCase();
                var productPriceColumn = rows[i].querySelector("td:nth-child(4)").textContent.toLowerCase();

                // Kiểm tra xem tên sản phẩm hoặc giá có chứa giá trị tìm kiếm hay không
                var containsName = productNameColumn.includes(productName);
                
                // Ẩn hoặc hiển thị sản phẩm tùy thuộc vào kết quả tìm kiếm
                rows[i].style.display = containsName ? "table-row" : "none";
            }
        });
    });
    document.addEventListener("DOMContentLoaded", function () {
    // Số sản phẩm trên mỗi trang
    var itemsPerPage = 8;
    // Danh sách sản phẩm
    var products = document.querySelectorAll(".table tbody tr");
    // Tổng số trang
    var totalPages = Math.ceil(products.length / itemsPerPage);
    // Trang hiện tại
    var currentPage = 1;

    // Hiển thị trang đầu tiên khi trang web được tải
    showPage(currentPage);

    function showPage(page) {
    // Tính vị trí bắt đầu và kết thúc của trang hiện tại
        var startIndex = (page - 1) * itemsPerPage;
        var endIndex = startIndex + itemsPerPage;

        // Ẩn tất cả các sản phẩm
        products.forEach(function (product) {
            product.style.display = "none";
        });

        // Hiển thị sản phẩm thuộc trang hiện tại
        for (var i = startIndex; i < endIndex && i < products.length; i++) {
            products[i].style.display = "table-row";
        }

        // Cập nhật chỉ số trang
        document.getElementById("currentPage").textContent = page;
    }

    function changePage(offset) {
        var newPage = currentPage + offset;

        // Đảm bảo trang mới nằm trong khoảng từ 1 đến totalPages
        if (newPage >= 1 && newPage <= totalPages) {
            currentPage = newPage;
            showPage(currentPage);
        }
    }

    // Hiển thị phân trang nếu có nhiều hơn 1 trang
    if (totalPages > 1) {
        var pagination = document.querySelector(".pagination");
        pagination.style.display = "flex";
        
        // Thêm sự kiện click cho nút Previous và Next
        document.getElementById("prevPage").addEventListener("click", function () {
            changePage(-1);
        });

        document.getElementById("nextPage").addEventListener("click", function () {
            changePage(1);
        });

        // Tạo nút trang
        for (var i = 1; i <= totalPages; i++) {
            var pageButton = document.createElement("button");
            pageButton.textContent = i;
            pageButton.addEventListener("click", function () {
                showPage(parseInt(this.textContent));
            });
            pagination.appendChild(pageButton);
        }
    }
});
</script>
</html>