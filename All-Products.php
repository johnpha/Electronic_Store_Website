<?php
include_once 'inc/header.php';
?>
<!-- Thanh sile truot theo time -->
<div class="container all-info">
    <div class="gird">
        <div class="gird__row app-content">
        <div class="col span-2-of-12">
                        <nav class="category">

                            <h3 class="category_heading">
                                <i class="category_heading-icon fas fa-list-ul"></i>
                                Danh mục
                            </h3>
                            <ul class="category-list">
                                <li class="category-item">
                                    <a href="All-Products.php" class="category-item-link">Tất cả sản Phẩm</a>
                                </li>
                                <li class="category-item category-item-active">
                                    <a href="#" class="category-item-link">Thiết Bị Điện Tử</a>
                                </li>
                                <li class="category-item">
                                    <a href="All-product-phone.php" class="category-item-link">Điện Thoại</a>
                                </li>
                                <li class="category-item">
                                    <a href="#" class="category-item-link">Đồng hồ thông minh</a>
                                </li>
                                
                                <li class="category-item">
                                    <a href="#" class="category-item-link">Laptop</a>
                                </li>
                                <li class="category-item">
                                    <a href="#" class="category-item-link">Tivi</a>
                                </li>
                            </ul>
                        </nav>

                        <nav class="category" style="margin-top: 15px;">

                            <h3 class="category_heading">
                                <!-- <i class="category_heading-icon fas fa-list-ul"></i> -->
                                <i class="category_heading-icon fas fa-search"></i>
                                Bộ lọc tìm  kiếm
                            </h3>
                           <div style="border-bottom: 2px solid rgba(0,0,0,0.1);">
                           <div style="font-size: 15px; padding-top: 20px; padding-bottom: 5px;">Thương Hiệu</div>
                            <ul class="category-list">
                                <li class="category-item">
                                    <div class="checkbox" style="font-size: 14px; padding-left: 5px;padding-bottom: 10px; ">
                                        <input type="checkbox">
                                        <span style="padding-left: 7px; cursor: pointer; ">Iphone</span>
                                    </div>
                                </li>
                                <li class="category-item" style="font-size: 14px; padding-left: 5px;padding-bottom: 10px;">
                                    <div class="checkbox">
                                        <input type="checkbox">
                                        <span style="padding-left: 7px; cursor: pointer;">Samsung</span>
                                    </div>
                                </li>
                                <li class="category-item"style="font-size: 14px; padding-left: 5px;padding-bottom: 10px;">
                                    <div class="checkbox">
                                        <input type="checkbox">
                                        <span style="padding-left: 7px; cursor: pointer;">Oppo</span>
                                    </div>
                                </li>
                                <li class="category-item"style="font-size: 14px; padding-left: 5px;padding-bottom: 10px;">
                                    <div class="checkbox">
                                        <input type="checkbox">
                                        <span style="padding-left: 7px; cursor: pointer;">Vivo</span>
                                    </div>
                                </li>
                                

                            </ul>
                           </div>
                           <div style="border-bottom: 2px solid rgba(0,0,0,0.1);">
                           <div style="font-size: 15px; padding-top: 20px; padding-bottom: 22px; ">Khoảng Giá</div>
                            <div class="price-range" style="display: flex;">
                            <input type="number" maxlength="13" class="price-range-input" placeholder="₫ TỪ" value="">
                            <div class="price-range-line"></div>
                            <input type="number" maxlength="13" class="price-range-input" placeholder="₫ ĐẾN" value="">    
                            
                            </div>
                           <div style="margin: 22px 0px; text-align: center;">
                           <button style="width: 100%;" class="btn btn-primary">Áp Dụng</button>
                           </div>
                           </div>
                        </nav>
                    </div>
            <div class="col span-10-of-12">
                <div class="home-filter hide-on-mobile-tablet">
                    <span class="home-filter-label">Sắp xếp theo</span>
                    <button class="home-filter-btn btn">Phổ biến</button>
                    <button class="home-filter-btn btn btn-primary">Mới nhất</button>
                    <button class="home-filter-btn btn">Bán chạy</button>
                    <div class="select-input">
                        <span class="select-input-label">Giá</span>
                        <i class="select-input-icon fas fa-chevron-down"></i>
                        <ul class="select-input-list">
                            <li class="select-input-item">
                                <a href="#" class="select-input-link">Giá: Thấp đến cao</a>
                                <a href="#" class="select-input-link">Giá: Cao đến thấp</a>
                            </li>
                        </ul>
                    </div>
                    <div class="home-filter-page">
                        <span class="home-filter-page-number">
                            <span class="home-filter-page-current">1</span>
                            /14
                        </span>
                        <div class="home-filter-page-control">
                            <a href="#" class="home-filter-page-btn home-filter-page-btn-disabled">
                                <i class="home-filter-page-icon fas fa-chevron-left"></i>
                            </a>
                            <a href="#" class="home-filter-page-btn">
                                <i class="home-filter-page-icon fas fa-chevron-right"></i>
                            </a>
                        </div>
                    </div>

                </div>

                <nav class="mobile-category">
                    <ul class="mobile-category-list">
                        <li class="mobile-category-item">
                            <a class="mobile-category-link" href="#">Điện Tử</a>
                        </li>
                        <li class="mobile-category-item">
                            <a class="mobile-category-link" href="#">Điện Thoại</a>
                        </li>
                        <li class="mobile-category-item">
                            <a class="mobile-category-link" href="#">Đồng hồ</a>
                        </li>
                        <li class="mobile-category-item">
                            <a class="mobile-category-link" href="#">Laptop</a>
                        </li>
                    </ul>
                </nav>

                <div class="home-product">
                    <div class="gird__row">
                        <div class="col span-2-of-10 info-product">
                            <!-- Product item -->
                            <a href="products-details.php" class="home-product-item">
                                <div class="home-product-item-img" style="background-image: url(https://cf.shopee.vn/file/8c2f8d5b2554618fc2166ee68da53e7e_tn)">
                                </div>
                                <h4 class="home-product-item-name">Điện thoại thông minh Samsung Galaxy Note 20
                                    Ultra/ Note 20 Ultra 5G FULLBOX NGUYÊN SEAL Hàng chính hãng.</h4>
                                <div class="home-product-item-price">
                                    <span class="home-product-item-price-old">₫29.990.000</span>
                                    <span class="home-product-item-price-current">₫23.650.000</span>
                                </div>
                                <div class="home-product-item-action">
                                    <input type="checkbox" hidden id="like-id1" class="like-animation1">
                                    <span class="home-product-item-like home-product-item-like-liked">
                                        <label for="like-id1"><i class="home-product-item-like-icon-empty far fa-heart"></i></label>
                                        <label for="like-id1"><i class="home-product-item-like-icon-liked fas fa-heart"></i></label>
                                    </span>
                                    <div class="home-product-item-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                    </div>
                                    <span class="home-product-item-sold">Đã bán 121</span>
                                </div>
                                <div class="home-product-item-origin">
                                    <span class="home-product-item-origin-name">
                                        TP. Hồ Chí Minh
                                    </span>
                                </div>
                                <div class="home-product-item-favourite">
                                    <i class="fas fa-check"></i>
                                    Yêu thích
                                </div>
                                <div class="home-product-item-sale-off">
                                    <span class="home-product-item-sale-off-percent">10%</span>
                                    <span class="home-product-item-sale-off-lable">GIẢM</span>
                                </div>
                            </a>
                        </div>

                        <div class="col span-2-of-10 info-product">
                            <!-- Product item -->
                            <a href="products-details.php" class="home-product-item">
                                <div class="home-product-item-img" style="background-image: url(https://cf.shopee.vn/file/590fbab9a79a9be6e4d992db3d5fe9e8)">
                                </div>
                                <h4 class="home-product-item-name">ANDROID Đồng Hồ Thông Minh Ky11 1.3 Inch Theo
                                    Dõi Sức Khỏe Kèm Phụ Kiện</h4>
                                <div class="home-product-item-price">
                                    <span class="home-product-item-price-old">₫609.895</span>
                                    <span class="home-product-item-price-current">₫360.000
                                    </span>
                                </div>
                                <div class="home-product-item-action">
                                    <input type="checkbox" hidden id="like-id2" class="like-animation2">
                                    <span class="home-product-item-like home-product-item-like-liked">
                                        <label for="like-id2"><i class="home-product-item-like-icon-empty far fa-heart"></i></label>
                                        <label for="like-id2"><i class="home-product-item-like-icon-liked fas fa-heart"></i></label>
                                    </span>
                                    <div class="home-product-item-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                    </div>
                                    <span class="home-product-item-sold">Đã bán 15</span>
                                </div>
                                <div class="home-product-item-origin">
                                    <span class="home-product-item-origin-name">
                                        TP. Hồ Chí Minh
                                    </span>
                                </div>
                                <div class="home-product-item-favourite">
                                    <i class="fas fa-check"></i>
                                    Yêu thích
                                </div>
                                <div class="home-product-item-sale-off">
                                    <span class="home-product-item-sale-off-percent">41%</span>
                                    <span class="home-product-item-sale-off-lable">GIẢM</span>
                                </div>
                            </a>
                        </div>
                        <div class="col span-2-of-10 info-product">
                            <!-- Product item -->
                            <a href="products-details.php" class="home-product-item">
                                <div class="home-product-item-img" style="background-image: url(https://cf.shopee.vn/file/19280789f95562f92e6045ded80dfd0a_tn)">
                                </div>
                                <h4 class="home-product-item-name">Điện Thoại Apple iPhone 11 Pro Max 256GB ( LL
                                    1 sim) - Hàng mới 100%</h4>
                                <div class="home-product-item-price">
                                    <span class="home-product-item-price-old">₫31.500.000</span>
                                    <span class="home-product-item-price-current">₫28.450.000</span>
                                </div>
                                <div class="home-product-item-action">
                                    <span class="home-product-item-like home-product-item-like-liked">
                                        <i class="home-product-item-like-icon-empty far fa-heart"></i>
                                        <i class="home-product-item-like-icon-liked fas fa-heart"></i>
                                    </span>
                                    <div class="home-product-item-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                    </div>
                                    <span class="home-product-item-sold">Đã bán 101</span>
                                </div>
                                <div class="home-product-item-origin">
                                    <span class="home-product-item-origin-name">
                                        TP. Hồ Chí Minh
                                    </span>
                                </div>
                                <div class="home-product-item-favourite">
                                    <i class="fas fa-check"></i>
                                    Yêu thích
                                </div>
                                <div class="home-product-item-sale-off">
                                    <span class="home-product-item-sale-off-percent">29%</span>
                                    <span class="home-product-item-sale-off-lable">GIẢM</span>
                                </div>
                            </a>
                        </div>
                        <div class="col span-2-of-10">
                            <!-- Product item -->
                            <a href="#" class="home-product-item">
                                <div class="home-product-item-img" style="background-image: url(https://cf.shopee.vn/file/8731249a4ff438c2df713c47d5e7aa0a)">
                                </div>
                                <h4 class="home-product-item-name">Điện thoại OPPO Reno3 Pro 8GB RAM/ 256GB ROM
                                    chính hãng, tặng kèm tai nghe Bluetooth Tekin và ốp lưng thời trang</h4>
                                <div class="home-product-item-price">
                                    <span class="home-product-item-price-old">₫11.490.000
                                    </span>
                                    <span class="home-product-item-price-current">₫9.990.000
                                    </span>
                                </div>
                                <div class="home-product-item-action">
                                    <span class="home-product-item-like home-product-item-like-liked">
                                        <i class="home-product-item-like-icon-empty far fa-heart"></i>
                                        <i class="home-product-item-like-icon-liked fas fa-heart"></i>
                                    </span>
                                    <div class="home-product-item-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                    </div>
                                    <span class="home-product-item-sold">Đã bán 111</span>
                                </div>
                                <div class="home-product-item-origin">
                                    <span class="home-product-item-origin-name">
                                        TP. Hồ Chí Minh
                                    </span>
                                </div>
                                <div class="home-product-item-favourite">
                                    <i class="fas fa-check"></i>
                                    Yêu thích
                                </div>
                                <div class="home-product-item-sale-off">
                                    <span class="home-product-item-sale-off-percent">13%</span>
                                    <span class="home-product-item-sale-off-lable">GIẢM</span>
                                </div>
                            </a>
                        </div>
                        <div class="col span-2-of-10">
                            <!-- Product item -->
                            <a href="#" class="home-product-item">
                                <div class="home-product-item-img" style="background-image: url(https://cf.shopee.vn/file/e162b7aa7915986f037e522b9812f42f)">
                                </div>
                                <h4 class="home-product-item-name">Đồng Hồ Đeo Tay Thông Minh Fly-dtno.i G12 Bt
                                    4.2 Chống Nước Ip67 Theo Dõi Sức Khỏe Kèm Phụ Kiện</h4>
                                <div class="home-product-item-price">
                                    <span class="home-product-item-price-old">₫1.643.000</span>
                                    <span class="home-product-item-price-current">₫1.065.500</span>
                                </div>
                                <div class="home-product-item-action">
                                    <span class="home-product-item-like home-product-item-like-liked">
                                        <i class="home-product-item-like-icon-empty far fa-heart"></i>
                                        <i class="home-product-item-like-icon-liked fas fa-heart"></i>
                                    </span>
                                    <div class="home-product-item-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                    </div>
                                    <span class="home-product-item-sold">Đã bán 12</span>
                                </div>
                                <div class="home-product-item-origin">
                                    <span class="home-product-item-origin-name">
                                        TP. Hồ Chí Minh
                                    </span>
                                </div>
                                <div class="home-product-item-favourite">
                                    <i class="fas fa-check"></i>
                                    Yêu thích
                                </div>
                                <div class="home-product-item-sale-off">
                                    <span class="home-product-item-sale-off-percent">35%</span>
                                    <span class="home-product-item-sale-off-lable">GIẢM</span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="gird__row">
                        <div class="col span-2-of-10">
                            <!-- Product item -->
                            <a href="#" class="home-product-item">
                                <div class="home-product-item-img" style="background-image: url(https://cf.shopee.vn/file/8c2f8d5b2554618fc2166ee68da53e7e_tn)">
                                </div>
                                <h4 class="home-product-item-name">Điện thoại thông minh Samsung Galaxy Note 20
                                    Ultra/ Note 20 Ultra 5G FULLBOX NGUYÊN SEAL Hàng chính hãng.</h4>
                                <div class="home-product-item-price">
                                    <span class="home-product-item-price-old">₫29.990.000</span>
                                    <span class="home-product-item-price-current">₫23.650.000</span>
                                </div>
                                <div class="home-product-item-action">
                                    <span class="home-product-item-like home-product-item-like-liked">
                                        <i class="home-product-item-like-icon-empty far fa-heart"></i>
                                        <i class="home-product-item-like-icon-liked fas fa-heart"></i>
                                    </span>
                                    <div class="home-product-item-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                    </div>
                                    <span class="home-product-item-sold">Đã bán 121</span>
                                </div>
                                <div class="home-product-item-origin">
                                    <span class="home-product-item-origin-name">
                                        TP. Hồ Chí Minh
                                    </span>
                                </div>
                                <div class="home-product-item-favourite">
                                    <i class="fas fa-check"></i>
                                    Yêu thích
                                </div>
                                <div class="home-product-item-sale-off">
                                    <span class="home-product-item-sale-off-percent">10%</span>
                                    <span class="home-product-item-sale-off-lable">GIẢM</span>
                                </div>
                            </a>
                        </div>
                        <div class="col span-2-of-10">
                            <!-- Product item -->
                            <a href="#" class="home-product-item">
                                <div class="home-product-item-img" style="background-image: url(https://cf.shopee.vn/file/19280789f95562f92e6045ded80dfd0a_tn)">
                                </div>
                                <h4 class="home-product-item-name">Điện Thoại Apple iPhone 11 Pro Max 256GB ( LL
                                    1 sim) - Hàng mới 100%</h4>
                                <div class="home-product-item-price">
                                    <span class="home-product-item-price-old">₫31.500.000</span>
                                    <span class="home-product-item-price-current">₫28.450.000</span>
                                </div>
                                <div class="home-product-item-action">
                                    <span class="home-product-item-like home-product-item-like-liked">
                                        <i class="home-product-item-like-icon-empty far fa-heart"></i>
                                        <i class="home-product-item-like-icon-liked fas fa-heart"></i>
                                    </span>
                                    <div class="home-product-item-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                    </div>
                                    <span class="home-product-item-sold">Đã bán 101</span>
                                </div>
                                <div class="home-product-item-origin">
                                    <span class="home-product-item-origin-name">
                                        TP. Hồ Chí Minh
                                    </span>
                                </div>
                                <div class="home-product-item-favourite">
                                    <i class="fas fa-check"></i>
                                    Yêu thích
                                </div>
                                <div class="home-product-item-sale-off">
                                    <span class="home-product-item-sale-off-percent">29%</span>
                                    <span class="home-product-item-sale-off-lable">GIẢM</span>
                                </div>
                            </a>
                        </div>
                        <div class="col span-2-of-10">
                            <!-- Product item -->
                            <a href="#" class="home-product-item">
                                <div class="home-product-item-img" style="background-image: url(https://cf.shopee.vn/file/590fbab9a79a9be6e4d992db3d5fe9e8)">
                                </div>
                                <h4 class="home-product-item-name">ANDROID Đồng Hồ Thông Minh Ky11 1.3 Inch Theo
                                    Dõi Sức Khỏe Kèm Phụ Kiện</h4>
                                <div class="home-product-item-price">
                                    <span class="home-product-item-price-old">₫609.895</span>
                                    <span class="home-product-item-price-current">₫360.000
                                    </span>
                                </div>
                                <div class="home-product-item-action">
                                    <span class="home-product-item-like home-product-item-like-liked">
                                        <i class="home-product-item-like-icon-empty far fa-heart"></i>
                                        <i class="home-product-item-like-icon-liked fas fa-heart"></i>
                                    </span>
                                    <div class="home-product-item-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                    </div>
                                    <span class="home-product-item-sold">Đã bán 15</span>
                                </div>
                                <div class="home-product-item-origin">
                                    <span class="home-product-item-origin-name">
                                        TP. Hồ Chí Minh
                                    </span>
                                </div>
                                <div class="home-product-item-favourite">
                                    <i class="fas fa-check"></i>
                                    Yêu thích
                                </div>
                                <div class="home-product-item-sale-off">
                                    <span class="home-product-item-sale-off-percent">41%</span>
                                    <span class="home-product-item-sale-off-lable">GIẢM</span>
                                </div>
                            </a>
                        </div>
                        <div class="col span-2-of-10">
                            <!-- Product item -->
                            <a href="#" class="home-product-item">
                                <div class="home-product-item-img" style="background-image: url(https://cf.shopee.vn/file/8731249a4ff438c2df713c47d5e7aa0a)">
                                </div>
                                <h4 class="home-product-item-name">Điện thoại OPPO Reno3 Pro 8GB RAM/ 256GB ROM
                                    chính hãng, tặng kèm tai nghe Bluetooth Tekin và ốp lưng thời trang</h4>
                                <div class="home-product-item-price">
                                    <span class="home-product-item-price-old">₫11.490.000
                                    </span>
                                    <span class="home-product-item-price-current">₫9.990.000
                                    </span>
                                </div>
                                <div class="home-product-item-action">
                                    <span class="home-product-item-like home-product-item-like-liked">
                                        <i class="home-product-item-like-icon-empty far fa-heart"></i>
                                        <i class="home-product-item-like-icon-liked fas fa-heart"></i>
                                    </span>
                                    <div class="home-product-item-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                    </div>
                                    <span class="home-product-item-sold">Đã bán 111</span>
                                </div>
                                <div class="home-product-item-origin">
                                    <span class="home-product-item-origin-name">
                                        TP. Hồ Chí Minh
                                    </span>
                                </div>
                                <div class="home-product-item-favourite">
                                    <i class="fas fa-check"></i>
                                    Yêu thích
                                </div>
                                <div class="home-product-item-sale-off">
                                    <span class="home-product-item-sale-off-percent">13%</span>
                                    <span class="home-product-item-sale-off-lable">GIẢM</span>
                                </div>
                            </a>
                        </div>
                        <div class="col span-2-of-10">
                            <!-- Product item -->
                            <a href="#" class="home-product-item">
                                <div class="home-product-item-img" style="background-image: url(https://cf.shopee.vn/file/e162b7aa7915986f037e522b9812f42f)">
                                </div>
                                <h4 class="home-product-item-name">Đồng Hồ Đeo Tay Thông Minh Fly-dtno.i G12 Bt
                                    4.2 Chống Nước Ip67 Theo Dõi Sức Khỏe Kèm Phụ Kiện</h4>
                                <div class="home-product-item-price">
                                    <span class="home-product-item-price-old">₫1.643.000</span>
                                    <span class="home-product-item-price-current">₫1.065.500</span>
                                </div>
                                <div class="home-product-item-action">
                                    <span class="home-product-item-like home-product-item-like-liked">
                                        <i class="home-product-item-like-icon-empty far fa-heart"></i>
                                        <i class="home-product-item-like-icon-liked fas fa-heart"></i>
                                    </span>
                                    <div class="home-product-item-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                    </div>
                                    <span class="home-product-item-sold">Đã bán 12</span>
                                </div>
                                <div class="home-product-item-origin">
                                    <span class="home-product-item-origin-name">
                                        TP. Hồ Chí Minh
                                    </span>
                                </div>
                                <div class="home-product-item-favourite">
                                    <i class="fas fa-check"></i>
                                    Yêu thích
                                </div>
                                <div class="home-product-item-sale-off">
                                    <span class="home-product-item-sale-off-percent">35%</span>
                                    <span class="home-product-item-sale-off-lable">GIẢM</span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="gird__row">
                        <div class="col span-2-of-10">
                            <!-- Product item -->
                            <a href="#" class="home-product-item">
                                <div class="home-product-item-img" style="background-image: url(https://cf.shopee.vn/file/8c2f8d5b2554618fc2166ee68da53e7e_tn)">
                                </div>
                                <h4 class="home-product-item-name">Điện thoại thông minh Samsung Galaxy Note 20
                                    Ultra/ Note 20 Ultra 5G FULLBOX NGUYÊN SEAL Hàng chính hãng.</h4>
                                <div class="home-product-item-price">
                                    <span class="home-product-item-price-old">₫29.990.000</span>
                                    <span class="home-product-item-price-current">₫23.650.000</span>
                                </div>
                                <div class="home-product-item-action">
                                    <span class="home-product-item-like home-product-item-like-liked">
                                        <i class="home-product-item-like-icon-empty far fa-heart"></i>
                                        <i class="home-product-item-like-icon-liked fas fa-heart"></i>
                                    </span>
                                    <div class="home-product-item-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                    </div>
                                    <span class="home-product-item-sold">Đã bán 121</span>
                                </div>
                                <div class="home-product-item-origin">
                                    <span class="home-product-item-origin-name">
                                        TP. Hồ Chí Minh
                                    </span>
                                </div>
                                <div class="home-product-item-favourite">
                                    <i class="fas fa-check"></i>
                                    Yêu thích
                                </div>
                                <div class="home-product-item-sale-off">
                                    <span class="home-product-item-sale-off-percent">10%</span>
                                    <span class="home-product-item-sale-off-lable">GIẢM</span>
                                </div>
                            </a>
                        </div>
                        <div class="col span-2-of-10">
                            <!-- Product item -->
                            <a href="#" class="home-product-item">
                                <div class="home-product-item-img" style="background-image: url(https://cf.shopee.vn/file/19280789f95562f92e6045ded80dfd0a_tn)">
                                </div>
                                <h4 class="home-product-item-name">Điện Thoại Apple iPhone 11 Pro Max 256GB ( LL
                                    1 sim) - Hàng mới 100%</h4>
                                <div class="home-product-item-price">
                                    <span class="home-product-item-price-old">₫31.500.000</span>
                                    <span class="home-product-item-price-current">₫28.450.000</span>
                                </div>
                                <div class="home-product-item-action">
                                    <span class="home-product-item-like home-product-item-like-liked">
                                        <i class="home-product-item-like-icon-empty far fa-heart"></i>
                                        <i class="home-product-item-like-icon-liked fas fa-heart"></i>
                                    </span>
                                    <div class="home-product-item-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                    </div>
                                    <span class="home-product-item-sold">Đã bán 101</span>
                                </div>
                                <div class="home-product-item-origin">
                                    <span class="home-product-item-origin-name">
                                        TP. Hồ Chí Minh
                                    </span>
                                </div>
                                <div class="home-product-item-favourite">
                                    <i class="fas fa-check"></i>
                                    Yêu thích
                                </div>
                                <div class="home-product-item-sale-off">
                                    <span class="home-product-item-sale-off-percent">29%</span>
                                    <span class="home-product-item-sale-off-lable">GIẢM</span>
                                </div>
                            </a>
                        </div>
                        <div class="col span-2-of-10">
                            <!-- Product item -->
                            <a href="#" class="home-product-item">
                                <div class="home-product-item-img" style="background-image: url(https://cf.shopee.vn/file/590fbab9a79a9be6e4d992db3d5fe9e8)">
                                </div>
                                <h4 class="home-product-item-name">ANDROID Đồng Hồ Thông Minh Ky11 1.3 Inch Theo
                                    Dõi Sức Khỏe Kèm Phụ Kiện</h4>
                                <div class="home-product-item-price">
                                    <span class="home-product-item-price-old">₫609.895</span>
                                    <span class="home-product-item-price-current">₫360.000
                                    </span>
                                </div>
                                <div class="home-product-item-action">
                                    <span class="home-product-item-like home-product-item-like-liked">
                                        <i class="home-product-item-like-icon-empty far fa-heart"></i>
                                        <i class="home-product-item-like-icon-liked fas fa-heart"></i>
                                    </span>
                                    <div class="home-product-item-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                    </div>
                                    <span class="home-product-item-sold">Đã bán 15</span>
                                </div>
                                <div class="home-product-item-origin">
                                    <span class="home-product-item-origin-name">
                                        TP. Hồ Chí Minh
                                    </span>
                                </div>
                                <div class="home-product-item-favourite">
                                    <i class="fas fa-check"></i>
                                    Yêu thích
                                </div>
                                <div class="home-product-item-sale-off">
                                    <span class="home-product-item-sale-off-percent">41%</span>
                                    <span class="home-product-item-sale-off-lable">GIẢM</span>
                                </div>
                            </a>
                        </div>
                        <div class="col span-2-of-10">
                            <!-- Product item -->
                            <a href="#" class="home-product-item">
                                <div class="home-product-item-img" style="background-image: url(https://cf.shopee.vn/file/8731249a4ff438c2df713c47d5e7aa0a)">
                                </div>
                                <h4 class="home-product-item-name">Điện thoại OPPO Reno3 Pro 8GB RAM/ 256GB ROM
                                    chính hãng, tặng kèm tai nghe Bluetooth Tekin và ốp lưng thời trang</h4>
                                <div class="home-product-item-price">
                                    <span class="home-product-item-price-old">₫11.490.000
                                    </span>
                                    <span class="home-product-item-price-current">₫9.990.000
                                    </span>
                                </div>
                                <div class="home-product-item-action">
                                    <span class="home-product-item-like home-product-item-like-liked">
                                        <i class="home-product-item-like-icon-empty far fa-heart"></i>
                                        <i class="home-product-item-like-icon-liked fas fa-heart"></i>
                                    </span>
                                    <div class="home-product-item-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                    </div>
                                    <span class="home-product-item-sold">Đã bán 111</span>
                                </div>
                                <div class="home-product-item-origin">
                                    <span class="home-product-item-origin-name">
                                        TP. Hồ Chí Minh
                                    </span>
                                </div>
                                <div class="home-product-item-favourite">
                                    <i class="fas fa-check"></i>
                                    Yêu thích
                                </div>
                                <div class="home-product-item-sale-off">
                                    <span class="home-product-item-sale-off-percent">13%</span>
                                    <span class="home-product-item-sale-off-lable">GIẢM</span>
                                </div>
                            </a>
                        </div>
                        <div class="col span-2-of-10">
                            <!-- Product item -->
                            <a href="#" class="home-product-item">
                                <div class="home-product-item-img" style="background-image: url(https://cf.shopee.vn/file/e162b7aa7915986f037e522b9812f42f)">
                                </div>
                                <h4 class="home-product-item-name">Đồng Hồ Đeo Tay Thông Minh Fly-dtno.i G12 Bt
                                    4.2 Chống Nước Ip67 Theo Dõi Sức Khỏe Kèm Phụ Kiện</h4>
                                <div class="home-product-item-price">
                                    <span class="home-product-item-price-old">₫1.643.000</span>
                                    <span class="home-product-item-price-current">₫1.065.500</span>
                                </div>
                                <div class="home-product-item-action">
                                    <span class="home-product-item-like home-product-item-like-liked">
                                        <i class="home-product-item-like-icon-empty far fa-heart"></i>
                                        <i class="home-product-item-like-icon-liked fas fa-heart"></i>
                                    </span>
                                    <div class="home-product-item-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                    </div>
                                    <span class="home-product-item-sold">Đã bán 12</span>
                                </div>
                                <div class="home-product-item-origin">
                                    <span class="home-product-item-origin-name">
                                        TP. Hồ Chí Minh
                                    </span>
                                </div>
                                <div class="home-product-item-favourite">
                                    <i class="fas fa-check"></i>
                                    Yêu thích
                                </div>
                                <div class="home-product-item-sale-off">
                                    <span class="home-product-item-sale-off-percent">35%</span>
                                    <span class="home-product-item-sale-off-lable">GIẢM</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <ul class="pagination">
                    <li class="pagination-item">
                        <a href="" class="pagination-item-link">
                            <i class="pagination-item-icon fas fa-chevron-left"></i>
                        </a>
                    </li>
                    <li class="pagination-item pagination-item-active">
                        <a href="" class="pagination-item-link">
                            1
                        </a>
                    </li>
                    <li class="pagination-item">
                        <a href="" class="pagination-item-link">
                            2
                        </a>
                    </li>
                    <li class="pagination-item">
                        <a href="" class="pagination-item-link">
                            3
                        </a>
                    </li>
                    <li class="pagination-item">
                        <a href="" class="pagination-item-link">
                            4
                        </a>
                    </li>
                    <li class="pagination-item">
                        <a href="" class="pagination-item-link">
                            ...
                        </a>
                    </li>
                    <li class="pagination-item">
                        <i class="far fa-chevron-left"></i>
                        <a href="" class="pagination-item-link">
                            <i class="pagination-item-icon fas fa-chevron-right"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php
include_once 'inc/footer.php';
?>