<!-- Main content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 order_wrapper">
            <div class="search_wrapper">
                <div class="form-group">
                    <select id="cateList" class="form-control">
                        <option value="">Tất cả danh mục</option>
                        <option value="1">aa</option>
                        <option value="2">bb</option>
                        <option value="3">cc</option>
                    </select>
                </div>
                <input id="search_product_name" class="form-control" value="" placeholder="Nhập tên sản phẩm cần tìm"/>
            </div>
            <div class="product_wrapper">
                <?php for ($i = 1; $i <= 20; $i++): ?>
                <div data-cate-id="<?php echo $i;?>" 
                     data-id="<?php echo $i;?>" 
                     data-name="San pham <?php echo $i;?>"
                     data-price="<?php echo $i;?>23456" class="col-sm-6 col-md-4 product_detail">
                    <img src="<?php echo $BASE_URL;?>/img/sp.jpg" alt=""/>
                    <h4 class="product_name">San pham <?php echo $i;?></h4>
                    <p>123.456</p>
                </div>
                <?php endfor; ?>
            </div>
            
        </div>
        <div class="col-md-6 order_wrapper">
            <div class="cart_wrapper">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width="45%"><?php echo __('LABEL_PRODUCT');?></th>
                            <th width="15%"><?php echo __('LABEL_QTY');?></th>
                            <th width="20%"><?php echo __('LABEL_PRICE');?></th>
                            <th width="20%"><?php echo __('LABEL_CART_SUB_TOTAL');?></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="cart_content"></tbody>
                </table>
            </div>
            <div class="cart_payment">
                asd
            </div>
        </div>
    </div>
</div>
<!-- /.content -->
<div class="clearfix"></div>
