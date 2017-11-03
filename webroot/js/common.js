/**
 * Main Javascript process
 */

$(document).ajaxStart(function () {
    Pace.restart();
});

$(document).on('submit', '.box-search form, .box-update form', function () {
    Pace.restart();
});

$(document).ready(function ($) {
    // Disable button toggle
    $('.toggle').show();
    $('.toggle-event').change(function () {
        toggleChange(this);
    });

    // Buttons action
    $(".btn-disable").click(function () {
        return disableEnableMulti('disable');
    });
    $(".btn-enable").click(function () {
        return disableEnableMulti('enable');
    });
    $(".btn-addnew").click(function () {
        location.href = baseUrl + '/' + controller + '/update';
        return false;
    });

    // Order
    init_order();
});

/**
 * Update multi (enable/disable)
 * @param {string} type
 * @returns {Boolean}
 */
function disableEnableMulti(type) {
    var items = getItemsChecked('items[]', ',');
    if (items == '') {
        showAlertModal('Vui lòng chọn');
        return false;
    }
    $("#action").val(type);
    return true;
}

/**
 * Get list item checked
 * @param {type} strItemName
 * @param {type} sep
 * @returns {String}
 */
function getItemsChecked(strItemName, sep) {
    var x = document.getElementsByName(strItemName);
    var p = "";
    for (var i = 0; i < x.length; i++) {
        if (x[i].checked) {
            p += x[i].value + sep;
        }
    }
    var result = (p != '' ? p.substr(0, p.length - 1) : '');
    return result;
}

/**
 * Check all item in data search result
 */
function checkAll(strItemName, value) {
    var x = document.getElementsByName(strItemName);
    for (var i = 0; i < x.length; i++) {
        if (value == 1 && !x[i].disabled) {
            if (!x[i].checked) {
                x[i].checked = 'checked';
            }
        } else {
            if (x[i].checked) {
                x[i].checked = '';
            }
        }
    }
}

/**
 * On change toggle
 * 
 * @param {object} item
 */
function toggleChange(item) {
    var revertClassFlg = 'reverted';
    if ($(item).hasClass(revertClassFlg)) {
        return false;
    }

    // Init
    var _this = $(item);
    var id = _this.val();
    var data_field = _this.attr('data-field');
    var data_controller = controller;
    var classList = _this.attr('class').split(/\s+/);//get controller in case there are multi-controllers on a screen
    if (classList.length == 2) {
        data_controller = classList[1];
    }

    // Select action
    if (data_field == 'disable') {
        var disable = $(item).prop('checked') ? 1 : 0;
        var data = {
            controller: data_controller,
            action: action,
            id: id,
            disable: disable
        };
        $.ajax({
            type: "POST",
            url: baseUrl + '/ajax/disable',
            data: data,
            success: function (response) {
                if (response) {
                    // Revert checkbox
                    $(item).addClass(revertClassFlg);
                    $(item).prop('checked', disable == 0).change();
                    $(item).removeClass(revertClassFlg);

                    // Show error
                    showAlertModal(response);
                }
            },
            complete: function () {
                location.reload();
            }
        });
    }

    return false;
}

/**
 * Show alert using bootstrap modal
 * @param {string} message
 */
function showAlertModal(message) {
    $('#modal_alert_body').html(message);
    $('#modal_alert').modal('show');
}

/**
 * Go back
 */
function back(redirect) {
    if (typeof redirect !== 'undefined' && redirect !== '') {
        location.href = redirect;
    } else if (referer.indexOf(url) === -1) {
        location.href = referer;
    } else {
        location.href = '/' + controller;
    }
    return false;
}

/**
 * Check input file is Image
 * @param {Object} input
 * @returns {Boolean}
 */
function is_image_type(input) {
    var image_types = ['image/jpg', 'image/jpeg', 'image/png'];
    return $.inArray(input['type'], image_types) >= 0;
}

/*
 * only value array
 * @param {type} value
 * @param {type} index
 * @param {type} self
 * @returns {Boolean}
 */
function onlyUnique(value, index, self) {
    return self.indexOf(value) === index;
}

/*
 * order functions
 */
function init_order() {
    var product = $('.product_detail');
    var cartContent = $('#cart_content');
    var delBtn = $('.c_item .btn-danger');
    var pItem = $('.product_detail');
    
    $('#cateList').on('change', function(){
        var value = $(this).val();
        if (value == '') {
            pItem.show();
        } else {
            pItem.hide();
            $('.product_wrapper').find("[data-cate-id='" + value + "']").show();
        }
    });
    
    $('#search_product_name').on('keyup', function(){
        var value = $(this).val();
        if (value == '') {
            pItem.show();
        } else {
            pItem.hide();
            $('.product_wrapper').find("[data-name*='" + value + "']").show();
        }
    });
    
    product.unbind('click').bind('click', function () {
        var id = $(this).attr('data-id');
        var name = $(this).attr('data-name');
        var price = $(this).attr('data-price');
        var existItem = $("#cart_content").find("[data-p-id='" + id + "']");
        if (existItem.length > 0) {
            var qty = parseInt(existItem.find('.input_number').val());
            existItem.find('.input_number').val(qty + 1);
            existItem.find('.item_total_price').html(price*(qty + 1));
        } else {
            var item = item_render(id, name, price);
            cartContent.prepend(item);
        }
    });
    
    delBtn.unbind('click').bind('click', function () {
        $(this).parents('.c_item').remove();
    });
}

/*
 * Render item
 */
function item_render(id, name, price) {
    return '<tr class="c_item" data-p-id="' + id + '"><td>' + name + '</td><td><input type="number" class="form-control input_number" value="1" min="1"/></td><td>'+price+'</td><td class="item_total_price">'+price+'</td><td><button onclick="remove_item($(this))" class="btn btn-xs btn-danger"><i class="fa fa-trash-o"></i></button></td></tr>';
}

/*
 * Remove item
 */
function remove_item(btn) {
    btn.parents('.c_item').remove();
}