

<?php
include_once 'inc/header.php';
include_once 'inc/sidebar.php';
include_once 'classes/brand.php';
include_once('classes/product.php');

global $trangcurr;
global $catNose;

$sodong = 2;
$sospanphamtrenDong = 5;
$soSphamTrenTrang  = $sospanphamtrenDong * $sodong;

?>
<style>
.category-item input{
    width: auto;
    height: auto;

}

</style>

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
                        <!-- <li class="category-item category-item-active">
                            <a href="All-Products.php" class="category-item-link">Tất cả sản Phẩm</a>
                        </li> -->
                        <?php

                        if (isset($_GET['cat'])) {
                            // nose mui ten
                            $catNose = $_GET['cat'];
                        }else{
                            $catNose = 17;
                        }

                        if (isset($_GET['page'])) {
                            // nose mui ten
                            $page = $_GET['page'];
                        }
                        include_once 'classes/category.php';
                        $cat = new category();
                        $listCat = $cat->show_category();
                        if ($listCat) {
                            $check = true;
                            while ($result = $listCat->fetch_assoc()) {
                        ?>
                                <li class="category-item">
                                    <?php
                                    $catName = $result['catName'];
                                    $catID =  $result['catID'];
                                    if (isset($catNose) && $catID == $catNose) {
                                        // var_dump($catNose);exit;

                                        echo " <li class='category-item category-item-active'> 
                                                <a href='index.php?cat=$catID'  id='tl_$catID' class='category-item-link'>$catName</a>
                                            </li>";
                                    } else {

                                        if (!isset($catNose) && $check == true) {
                                            $check = false;
                                            echo " <li class='category-item category-item-active'>
                                            <a href='index.php?cat=17' id='tl_$catID' class='category-item-link'>$catName</a>
                                        </li>";
                                        } else
                                            echo " <li class='category-item'>
                                            <a href='index.php?cat=$catID' id='tl_$catID' class='category-item-link'>$catName</a>
                                            </li>";


                                        //     echo " <li class='category-item'>
                                        //     <a href='index.php?cat=17?cat=$catID' class='category-item-link'>$catName</a>
                                        // </li>"; 
                                    }
                                    ?>
                                </li>
                        <?php
                            }
                        }
                        ?>
                    </ul>
                </nav>

                <nav class="category" style="margin-top: 15px;">

                    <h3 class="category_heading">
                        <!-- <i class="category_heading-icon fas fa-list-ul"></i> -->
                        <i class="category_heading-icon fas fa-search"></i>
                        Tìm Nâng Cao
                    </h3>

                    <form id="searchAdvended">
                        <div style="border-bottom: 2px solid rgba(0,0,0,0.1);">
                            <div class="search">Tên Sản Phẩm</div>
                            <div class="nameClass">
                                <input name="nameAdvanced" type="text" >
                            </div>
                            
                        </div>
                        <div style="border-bottom: 2px solid rgba(0,0,0,0.1);">
                            <div class="search">Thương Hiệu</div>
                            <ul class="category-list">
                                
                                <?php

                                $product=new product();
                                
                                $sql="SELECT * FROM tbl_category";

                                $result=$product->Select($sql);

                                while($row=$result->fetch_array()){
                                    if($row[0]!=17){
                                

                                ?>
                                <div style="padding-bottom: 20px";>
                                    <div class="nameCat"><?php echo $row['catName'] ?></div>
                                    <?php 
                                        $sql="SELECT * FROM tbl_brand WHERE catID=$row[catID]";

                                        if($result1=$product->Select($sql)){

                                        while($row1=$result1->fetch_array()){

                                    ?>
                                        <li class="category-item">
                                            <div class="checkbox category">
                                                <input type="checkbox" name="brand[]" value=<?php echo $row1['brandID']  ?>>
                                                <span style="padding-left: 7px; cursor: pointer; "><?php echo $row1['brandName'] ?></span>
                                            </div>
                                        </li>
                                    <?php 
                                        }
                                    }
                                    
                                    ?>
                                </div>

                                <?php
                                }}
                                /*
                                $brand = new brand();
                                $listBrand = $brand->show_brand();
                                if (isset($listBrand)) {
                                    while ($result = $listBrand->fetch_assoc()) {


                                ?>
                                        <li class="category-item">
                                            <div class="checkbox" style="font-size: 14px; padding-left: 5px;padding-bottom: 10px; ">
                                                <input type="checkbox" name="brand[]" value=<?php echo $result['brandID']  ?>>
                                                <span style="padding-left: 7px; cursor: pointer; "><?php echo $result['brandName'] ?></span>
                                            </div>
                                        </li>
                                <?php
                                    }
                                }
                                */
                                ?>
                                

                            </ul>
                        </div>
                        <div style="border-bottom: 2px solid rgba(0,0,0,0.1);">
                            <div class="search">Khoảng Giá</div>
                            <div class="price-range" style="display: flex;">
                                <input type="number" maxlength="13" class="price-range-input" name="min" placeholder="₫ TỪ" value="" min="0">
                                <div class="price-range-line"></div>
                                <input type="number" maxlength="13" class="price-range-input" name="max" placeholder="₫ ĐẾN" value="" min="0">

                            </div>
                            <div style="margin: 22px 0px; text-align: center;">
                                <button type="submit" style="width: 100%;" class="btn btn-primary">Áp Dụng</button>
                            </div>
                        </div>


                    </form>
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
                        <?php 
                            $sql="SELECT * FROM tbl_category";
                            if($result=$product->Select($sql)){
                                while($row=$result->fetch_array()){
                            
                        
                        ?>
                        <li class="mobile-category-item">
                            <a class="mobile-category-link" href="index.php?cat=<?php echo $row['catID']?>"><?php echo $row['catName'] ?></a>
                        </li>
                        
                        <?php 
                            }
                        }
                        ?>
                    </ul>
                </nav>
                <?php 
                    
                    if((isset($_POST['min'])&&isset($_POST['max']))||isset($_POST['name'])){
                        
                        if($_POST['min']!=""&&$_POST['max']!=""){
                        
                        $min=$_POST['min'];
                        $max=$_POST['max'];
                    
                        if($_POST['brand']!=""&&$_POST['nameAdvanced']!=""){
                            $nameAdvanced=$_POST['nameAdvanced'];
                            $brands="";
                            foreach($_POST['brand'] as $key=>$value){
                                $brands.=$value.",";
                            }

                            $brands=substr($brands,0,-1);
                            $sql="SELECT * FROM tbl_product WHERE brandID IN ($brands) AND productName LIKE '%$nameAdvanced%' AND cost BETWEEN $min AND $max";
                        }
                        else if($_POST['brand']!=""){
                            $brands="";
                            foreach($_POST['brand'] as $key=>$value){
                                $brands.=$value.",";
                            }
                            $brands=substr($brands,0,-1);
                            $sql="SELECT * FROM tbl_product WHERE brandID IN ($brands) AND cost BETWEEN $min AND $max";
                        }
                        else if($_POST['nameAdvanced']!=""){
                            $name=$_POST['nameAdvanced'];
                            $sql="SELECT * FROM tbl_product WHERE productName LIKE '%$name%' AND cost BETWEEN $min AND $max";
                        }
                        else
                            $sql="SELECT * FROM tbl_product WHERE cost BETWEEN $min AND $max";
                    }
                    else if($_POST['brand']!=""&&$_POST['nameAdvanced']!=""){
                        
                            $name=$_POST['nameAdvanced'];
                            $brands="";
                            foreach($_POST['brand'] as $key=>$value)
                                $brands.=$value.",";
                            
                            $brands=substr($brands,0,-1);
                            
                            $sql="SELECT * FROM tbl_product WHERE brandID IN ($brands) AND productName LIKE '%$name%'";
                    }
                    else if($_POST['brand']!=""){
                        $brands="";
                        foreach($_POST['brand'] as $key=>$value)
                        $brands.=$value.",";
                    
                        $brands=substr($brands,0,-1);
                        $sql="SELECT * FROM tbl_product WHERE brandID IN ($brands)";
                    }

                    
                    else if(isset($_POST['name'])||isset($_POST['nameAdvanced'])){
                        if($_POST['name']!="")
                            $name=$_POST['name'];
                        else if($_POST['nameAdvanced']!="")
                            $name=$_POST['nameAdvanced'];
                        if(isset($name))
                            $sql="SELECT * FROM tbl_product WHERE productName LIKE '%$name%'";

                    }
                    
                    else 
                        $sql="SELECT * FROM tbl_product";


                    
                        $product=new product();
                        $result=$product->Select($sql);

                        $totalrecord=$result->num_rows;

                        

                        $numpage=ceil($totalrecord/$soSphamTrenTrang);

                
                ?>
                <div id="content">
                   
                    
                    <div id="all_product" class="home-product">
                        <div id="target-content"></div>
                       
                        <ul class="pagination" id="<?php if(isset($brands)) echo $brands; else echo ""; ?>">
                            <?php 
                                if(!empty($numpage)){
                                    for($i=1;$i<=$numpage;$i++){
                                        if($i==1){
                            ?>
                            <li class="pagination-item pagination-item-active" id="<?php echo $i ?>">
                            
                            <div  style='cursor: pointer;' class='pagination-item-link'><?php echo $i ?></div>
                            
                            </li>
                            <?php 
                                        }
                                        else{
                            ?>

                            <li class="pagination-item" id="<?php echo $i ?>">
                            
                            <div style='cursor: pointer;' class='pagination-item-link'><?php echo $i ?></div>
                            
                            </li>
                            <?php
                            
                                        }
                                    }
                                }
                            
                            
                            ?>
                        </ui>

                    </div>
                    <script>
                        $(document).ready(function(){

                        var min="<?php echo isset($_POST['min'])?$_POST['min']:-1?>";

                        var max="<?php echo isset($_POST['max'])?$_POST['max']:-1?>";

                        var brands=$(".pagination").attr("id");
                        
                        var nameAdvanced="<?php echo isset($_POST['nameAdvanced'])?$_POST['nameAdvanced']:"" ?>";

                        var nameAdvancedClear=nameAdvanced.replace(/\s/g, ',');

                        var name="<?php echo isset($_POST['name'])?$_POST['name']:"" ?>";

                        var nameclear=name.replace(/\s/g, ',');

                        if(min!=-1&&max!=-1){

                            $("#target-content").load("phantrang.php?trang=1&min="+min+"&max="+max+"&brand="+brands+"&nameAdvanced="+nameAdvancedClear);

                        }
                        else if(nameclear!=""){

                            $("#target-content").load("phantrang.php?trang=1&name="+nameclear);

                        }

                        $("div.pagination-item-link").click(function(e){


                            e.preventDefault();


                            var id=$(this).parent().attr("id");



                            $.ajax({

                            url: "phantrang.php",
                            type: "GET",
                            data: {

                                trang:id,
                                nameAdvanced:nameAdvancedClear,
                                name:nameclear,
                                min:min,
                                max:max,
                                brand:brands

                            },

                            cache: false,
                            success: function(dataResult){
                                
                                $("#target-content").html(dataResult);
                                $(".pagination li").removeClass("pagination-item-active");
                                $("#"+id+".pagination-item").addClass("pagination-item-active");
                            }

                            })

                        })
                        })
                    
                    </script>
                </div>


                <?php } ?>
                    
                
                <div id="content">

                    <div id="all_product" class="home-product">


                    </div>
                    <!-- <div id="click">click</div> -->
                    <ul class="pagination">
                    <?php 
                    
                    $product = new product();
                    global $sotrang;
                    if(isset($catNose) && $catNose!=17){
                    $count = $product->show_product_by_category($catNose)->num_rows;
                    }else{
                    $count = $product->show_product()->num_rows;
                    }
                    
                    $sotrang = ceil($count/$soSphamTrenTrang);
                    ?>
                        <li class="pagination-item">
                            <div id="trang_0" onclick='phantrang(0, <?php echo $catNose ?>,<?php echo $sotrang ?>)' class="pagination-item-link">
                                <i class="pagination-item-icon fas fa-chevron-left"></i>
                            </div>
                        </li>

                        <!-- <li class='pagination-item pagination-item-active'>
                            <a href='index.php?cat=$catNose' class='pagination-item-link'>$j
                            </a>
                        </li> -->
                    
                        <!--  pagination-item-active -->
                        <?php
                        
                        for($i = 1;$i<=$sotrang;$i++){
                            echo" <li class='pagination-item'>
                            <div id='trang_$i' onclick='phantrang($i,$catNose,$sotrang)' style='cursor: pointer;' class='pagination-item-link'>$i
                            </div>
                        </li>";
                        }
                

                        
                        // var_dump($count);exit;
                        ?>

                        <!-- <li class="pagination-item">
                            <div class="pagination-item-link" style="cursor: pointer;">
                                ...
                            </div>
                        </li> -->
                        <li class="pagination-item">
                            <!-- <i class="far fa-chevron-left"></i> -->
                            <div id="trang_10" onclick='phantrang(10,<?php echo $catNose ?>,<?php echo $sotrang ?>)' class="pagination-item-link">
                                <i class="pagination-item-icon fas fa-chevron-right"></i>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include_once 'inc/footer.php'
?>
<script>
    
    $(document).ready(function(){

        $('#searchAdvended').on("submit",function(e){
            
            e.preventDefault();

            $.ajax({
                
                url: "index.php",
                type: "post",
                data: $('#searchAdvended').serialize(),
                success: function(dataResult){
                        var result = $('<div />').append(dataResult).find("#content").html();
                        $("#content").html(result);
                        $("#searchAdvended")[0].reset();
                        $('html, body').scrollTop(550);
                    }
            })
            

           

        })
        $('#searchName').on("submit",function(e){

        e.preventDefault();

        $.ajax({
            
            url: "index.php",
            type: "post",
            data: $('#searchName').serialize(),
            success: function(dataResult){
                    var result = $('<div />').append(dataResult).find("#content").html();
                    $("#content").html(result);
                    $("#searchName")[0].reset();
                }
        })



        })
    

    })
    

</script>