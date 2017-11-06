<!-- Main content -->
<div class="container-fluid">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><?php echo __('LABEL_PRODUCT_INFO');?></h3>
        </div>
        <div class="box-body">
            <div class="col-md-6 order_wrapper">
                <div class="search_wrapper">
                    <!--                    <div class="form-group">
                                            <select id="cateList" class="form-control">
                                                <option value="">Tất cả danh mục</option>
                                                <option value="1">aa</option>
                                                <option value="2">bb</option>
                                                <option value="3">cc</option>
                                            </select>
                                        </div>-->
                    <input id="search_product_name" class="form-control" value="" placeholder="<?php echo __('LABEL_PLACEHOLDER_SEARCH_PRODUCT');?>"/>
                </div>
                <div class="product_wrapper">
                    <?php if (!empty($products)): ?>
                        <?php foreach ($products as $p): ?>
                        <?php
                        $pName = !empty($p['name']) ? $p['name'] : '';
                        $pId = !empty($p['id']) ? $p['id'] : '';
                        $pCateId = !empty($p['cate_id']) ? $p['cate_id'] : '';
                        $pPrice = !empty($p['price']) ? $p['price'] : '';
                        $pImage = !empty($p['avatar']) ? $p['avatar'] : '';
                        ?>
                            <div data-cate-id="<?php echo $pCateId; ?>"
                                 data-search="<?php echo strtolower($pName).'-'.$this->Common->convertURL($pName); ?>"
                                 data-id="<?php echo $pId; ?>" 
                                 data-name="<?php echo $pName; ?>"
                                 data-price="<?php echo $pPrice; ?>" class="col-xs-6 col-md-4 product_detail">
                                <img src="<?php echo $pImage; ?>" alt=""/>
                                <h4 class="product_name"><?php echo $pName; ?></h4>
                                <p><?php echo $pPrice; ?></p>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>

            </div>
            <div class="col-md-6 order_wrapper">
                <div class="cart_wrapper">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="45%"><?php echo __('LABEL_PRODUCT'); ?></th>
                                <th width="15%"><?php echo __('LABEL_QTY'); ?></th>
                                <th width="20%"><?php echo __('LABEL_PRICE'); ?></th>
                                <th width="20%"><?php echo __('LABEL_CART_SUB_TOTAL'); ?></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="cart_content"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row" style="margin-top: 20px;">
        <div class="col-sm-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo __('LABEL_ORDER_INFO');?></h3>
                    <button class="btn btn-primary pull-right" id="add_new_customer" title="<?php echo __('LABEL_ADD_NEW_CUSTOMER');?>">+</button>
                </div>
                <div class="box-body">
                    <div class="customer_search form-group">
                        <input class="form-control" id="customer_input" placeholder="<?php echo __('LABEL_PLACEHOLDER_CUSTOMER_INPUT');?>" value=""/>
                        <ul class="customer_search_result">
                            <?php if (!empty($customers)): ?>
                                <?php foreach ($customers as $c): ?>
                                <?php
                                $cId = !empty($c['id']) ? $c['id'] : '';
                                $cName = !empty($c['name']) ? $c['name'] : '';
                                $cAddress = !empty($c['address']) ? $c['address'] : '';
                                $cTel = !empty($c['tel']) ? $c['tel'] : '';
                                ?>
                                    <li class="customer_search_item" 
                                        data-name="<?php echo $cName; ?>" 
                                        data-address="<?php echo $cAddress; ?>" 
                                        data-tel="<?php echo $cTel; ?>" data-value="<?php echo $cName.' - '.$cTel; ?>" data-id="<?php echo $cId; ?>"><?php echo $cName.' - '.$cTel; ?></li>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            <li class="customer_search_no_item"><?php echo __('MESSAGE_SEARCH_NO_RESULT');?></li>
                        </ul>
                    </div>
                    <div class="customer_info">
                        <div class="form-group">
                            <label><?php echo __('LABEL_FULL_NAME'); ?></label>
                            <input class="form-control customer_info_input" placeholder="<?php echo __('LABEL_PLACEHOLDER_FULL_NAME');?>" id="o_customer_name" value="" disabled="disabled"/>
                        </div>
                        <div class="form-group">
                            <label><?php echo __('LABEL_TEL'); ?></label>
                            <input class="form-control customer_info_input" placeholder="<?php echo __('LABEL_PLACEHOLDER_TEL');?>" id="o_customer_tel" value="" disabled="disabled"/>
                        </div>
                        <div class="form-group">
                            <label><?php echo __('LABEL_ADDRESS');?></label>
                            <input class="form-control customer_info_input" placeholder="<?php echo __('LABEL_PLACEHOLDER_ADDRESS');?>" id="o_customer_address" value="" disabled="disabled"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label><?php echo __('LABEL_NOTE');?></label>
                        <textarea class="form-control" rows="3" id="o_order_note" placeholder="<?php echo __('LABEL_PLACEHOLDER_NOTE');?>"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo __('LABEL_PAYMENT_INFO');?></h3>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th style="width:40%"><?php echo __('LABEL_PAYMENT_METHOD');?>:</th>
                                    <td>
                                        <div class="form-group">
                                            <label class="radio-inline">
                                                <input name="rdoPaymentMethod" value="1" type="radio"><?php echo __('LABEL_PAYMENT_METHOD_CASH_ON_DELIVERY');?>
                                            </label>
                                            <label class="radio-inline">
                                                <input name="rdoPaymentMethod" value="2" type="radio"><?php echo __('LABEL_PAYMENT_METHOD_BANK_TRANFER');?>
                                            </label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th><?php echo __('LABEL_QTY');?>:</th>
                                    <td class="order_qty">0</td>
                                </tr>
                                <tr>
                                    <th><?php echo __('LABEL_ORDER_TOTAL');?></th>
                                    <td class="order_total">0</td>
                                </tr>
                                <tr>
                                    <th><?php echo __('LABEL_PAY_TOTAL');?>:</th>
                                    <td><input type="text" id="o_pay_total" class="form-control" value="0"/></td>
                                </tr>
                                <tr>
                                    <th><?php echo __('LABEL_PAY_DEBT');?>:</th>
                                    <td class="order_binding">0</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="form-group">
                        <input type="hidden" id="o_product_ids" value=""/>
                        <input type="hidden" id="o_payment_method" value=""/>
                        <input type="hidden" id="o_total_price" value=""/>
                        <input type="hidden" id="o_pay_debt" value=""/>
                        <div class="btn btn-primary pull-right"><?php echo __('LABEL_ORDER_SAVE');?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.content -->
<div class="clearfix"></div>
