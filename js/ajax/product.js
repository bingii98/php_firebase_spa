$(document).on("click", ".btn-del-product", function() {
    const r = confirm('Bạn có chắc chắn muốn ngừng bán ' + $(this).attr('name') + ' không ?');
    if (r == true) {
        $.ajax({
            url: "a-product-delete.php",
            data: {
                'id': $(this).attr('data')
            },
            type: "POST",
            beforeSend: function () {
                $('#loaded').show();
            },
            success: function (data) {
                $('#loaded').hide();
                if (data == 'true')
                    createAlert("success", "Ngưng hoạt đông sản phẩm thành công!")
                else
                    createAlert("warning", "Ngưng hoạt đông sản phẩm thất bại!")
            }
        })
    }
})

$(document).on("click", ".btn-reactive-product", function() {
    const r = confirm('Bạn có chắc chắn muốn bán lại ' + $(this).attr('name') + ' không ?');
    if (r == true) {
        $.ajax({
            url: "a-product-reactive.php",
            data: {
                'id': $(this).attr('data')
            },
            type: "POST",
            beforeSend: function () {
                $('#loaded').show();
            },
            success: function (data) {
                $('#loaded').hide();
                if (data == 'true')
                    createAlert("success", "Sản phẩm đã mở bán lại thành công!")
                else
                    createAlert("warning", "Sản phẩm đã được bán lại thất bại!")
            }
        })
    }
})

$(document).on("click", ".btn-edit-product", function () {
    $.ajax({
        url: "a-product-load-detail.php",
        data: {
            'id': $(this).attr('data')
        },
        type: "POST",
        beforeSend: function () {
            $('#loaded').show();
        },
        success: function (data) {
            $('#loaded').hide();
            if (data == 'false')
                createAlert("warning", "Lấy thông tin sản phẩm thất bại!")
            else {
                $('#model-edit-content').html(data)
                $("#editProductModal").modal('toggle')
            }
        }
    })
})

$(document).on("click", "#btn-edit-product", function () {
    const $pr_name = $('#txt-name')
    const $pr_price = $('#txt-price')
    const $pr_isSale = $('#switch1')
    const $pr_sale = $('#txt-range-sale')

    /*Event change value input name - check*/
    $pr_name.on('input change', function() {
        if (isValidName($pr_name.val())) {
            $('#name-preview').html($pr_name.val())
            $('#error-name').html('')
        } else {
            $('#error-name').html('Tên là ký tự chữ số dài từ 2 - 200 ký tự')
        }
    })

    /*Event change value input price - check*/
    $pr_price.on('input change', function() {
        if (isNaturalNumber($pr_price.val())) {
            if (Number($pr_price.val()) > 500000) {
                $('#error-price').html('Tiền có giá trị 0 - 500.000')
            } else {
                changePrice()
                $('#error-price').html('')
            }
        } else {
            $('#error-price').html('Tiền là giá trị số dương')
        }
    })

    /*Event change value input price - check*/
    $pr_sale.on('input change', function() {
        changePrice()
    })

    /*Event change value input checkbox - check*/
    $pr_isSale.on('input change', function() {
        changePrice()
    })

    /*Function check value price - check*/
    function changePrice() {
        if ($('#switch1').is(":checked")) {
            if ($pr_sale.val() != 0 && $pr_price.val() != '') {
                $('#price-sale-preview').html(formatNumber($pr_price.val()) + "  ₫")
                $('#price-preview').html(formatNumber($pr_price.val() - $pr_price.val() / 100 * $pr_sale.val()) + "  ₫")
                $('#sale-preview').show()
                $('#sale-preview').html($pr_sale.val() + "%")
            } else {
                $('#price-preview').html(formatNumber($pr_price.val()) + "  ₫")
                $('#price-sale-preview').html('')
                $('#sale-preview').hide()
            }
        } else {
            $('#price-preview').html(formatNumber($pr_price.val()) + "  ₫")
            $('#price-sale-preview').html('')
            $('#sale-preview').hide()
        }
    }

    /*Empty error label*/
    function emptyError() {
        $('#error-price').html('')
        $('#error-name').html('')
        $('#error-description').html('')
        $('#error-issale').html('')
    }

    /*Function check value form*/
    function checkForm() {
        var a = true
        if (isNaturalNumber($pr_price.val())) {
            if (Number($pr_price.val()) > 500000) {
                $('#error-price').html('Tiền có giá trị 0 - 500.000')
                a = false
            } else {
                $('#error-price').html('')
            }
        } else {
            $('#error-price').html('Tiền là giá trị số dương')
            a = false
        }

        if (isValidName($pr_name.val())) {
            $('#error-name').html('')
        } else {
            $('#error-name').html('Tên là ký tự chữ số dài từ 2 - 200 ký tự')
            a = false
        }
        if (a) emptyError()
        return a;
    }

    function formatNumber(n) {
        n = Number(n)
        return n.toFixed(0).replace(/./g, function (c, i, a) {
            return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "." + c : c;
        });
    }

    /*Ajax event submit*/
    if (checkForm()) {
        const data = new FormData();
        const isSale = ($('#switch1').is(":checked")) ? true : false;
        data.append('id', $(this).attr('data'));
        data.append('name', $('#txt-name').val());
        data.append('description', $('#txt-description').val());
        data.append('isSale', isSale);
        data.append('price', $('#txt-price').val());
        data.append('rangeSale', $('#txt-range-sale').val());

        $.ajax({
            url: 'a-product-edit.php',
            data: data,
            type: "POST",
            contentType: false,
            processData: false,
            beforeSend: function () {
                $('#loaded').show();
            },
            success: function (data) {
                $('#loaded').hide();
                if (data == 'true') {
                    $("#editProductModal").modal('toggle')
                    createAlert("success", "Chỉnh sửa sản phẩm thành công!")
                } else if (data == 'double') {
                    createAlert("warning", "Tên đã tồn tại!")
                } else {
                    createAlert("warning", "Xử lý lỗi!")
                    checkForm();
                }
            }
        })
    }
})