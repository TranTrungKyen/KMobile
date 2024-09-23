<?php

return [
    'common' => [
        'order_status' => [
            'PENDING' => 'Chờ xác nhận',
            'SHIPPING' => 'Đang giao',
            'COMPLETED' => 'Hoàn thành',
            'CANCELED' => 'Đã hủy',
        ],
        'currency_unit' => 'VND',
        'footer' => [
            'copyright' => '2024 Bản quyền thuộc về',
        ],
        'role' => [
            'admin' => 'Người quản trị',
            'employee' => 'Nhân viên',
            'user' => 'Khách hàng',
        ],
        'gender' => [
            'female' => 'Nữ',
            'male' => 'Nam',
        ],
        'name_page' => [
            'login' => [
                'user' => 'KMobile',
                'admin' => 'KMobile Admin',
            ],
        ],
        'title' => [
            'login_page' => 'Đăng nhập - Đăng ký',
        ],
        'button' => [
            'login' => 'Đăng nhập',
            'register' => 'Đăng ký',
            'next' => 'Tiếp theo',
            'add' => 'Thêm',
        ],
        'link' => [
            'forgot_password' => 'Quên mật khẩu',
        ],
        'logout_success' => 'Đăng xuất thành công',
        'logout_error' => 'Bạn chưa đăng nhập',
        'notify_message' => [
            'success' => [
                'find' => 'Tìm kiếm thành công',
                'add' => 'Thêm mới thành công',
                'update' => 'Cập nhật thành công',
                'delete' => 'Xóa thành công',
                'active' => 'Khóa thành công',
                'unlock' => 'Mở khóa thành công',
                'resetPassword' => 'Đặt lại mật khẩu thành công',
                'clear_cart' => 'Làm sạch giỏ hàng thành công',
                'order_confirm' => 'Xác nhận đơn hàng thành công',
                'order_cancel' => 'Hủy đơn hàng thành công',
                'statistical' => 'Thống kê doanh thu thành công',
            ],
            'error' => [
                'find' => 'Tìm kiếm thất bại',
                'add' => 'Thêm mới thất bại',
                'update' => 'Cập nhật thất bại',
                'delete' => 'Xóa thất bại',
                'active' => 'Khóa thất bại',
                'unlock' => 'Mở khóa thất bại',
                'resetPassword' => 'Đặt lại mật khẩu thất bại',
                'clear_cart' => 'Làm sạch giỏ hàng thất bại',
                'order_confirm' => 'Xác nhận đơn hàng thất bại',
                'order_cancel' => 'Hủy đơn hàng thất bại',
                'statistical' => 'Thống kê doanh thu thất bại',
            ],
        ],
        'icon' => [
            'lock' => 'fa-solid fa-lock',
            'unlock' => 'fa-solid fa-lock-open',
        ],
    ],

    'validate' => [
        'frontend' => [],
        'backend' => [
            'change_password_form' => [
                'password' => [
                    'required' => 'Vui lòng nhập mật khẩu hiện tại',
                ],
                'new_password' => [
                    'required' => 'Vui lòng nhập mật khẩu mới',
                    'min' => 'Vui lòng nhập mật khẩu mới ít nhất :min ký tự',
                    'different' => 'Vui lòng nhập mật khẩu mới khác với mật khẩu hiện tại',
                ],
                'new_password_confirmation' => [
                    'required' => 'Vui lòng xác nhận mật khẩu mới',
                    'same' => 'Vui lòng xác nhận mật khẩu mới không khớp',
                ],
            ],
            'confirm_order_form' => [
                'imei' => [
                    'required' => 'Vui lòng nhập imei',
                    'distinct' => 'Vui lòng nhập lại imei do đã trùng lặp',
                    'max' => 'Vui lòng nhập imei tối đa :max ký tự',
                    'array' => 'Vui lòng nhập imei là dạng mảng',
                ],
                'order_detail_id' => [
                    'required' => 'Vui lòng nhập mã chi tiết hóa đơn',
                    'array' => 'Vui lòng nhập mã chi tiết hóa đơn là dạng mảng',
                ],
            ],
            'create_color_form' => [
                'name' => [
                    'required' => 'Vui lòng nhập tên màu sắc',
                    'max' => 'Vui lòng nhập tên màu sắc tối đa :max ký tự',
                    'unique' => 'Vui lòng nhập lại tên màu sắc do đã tồn tại',
                ],
            ],
            'create_storage_form' => [
                'storage' => [
                    'required' => 'Vui lòng nhập phiên bản dung lượng',
                    'max' => 'Vui lòng nhập phiên bản dung lượng tối đa :max ký tự',
                    'unique' => 'Vui lòng nhập lại phiên bản dung lượng do đã tồn tại',
                ],
            ],
            'create_category_form' => [
                'name' => [
                    'required' => 'Vui lòng nhập tên danh mục',
                    'max' => 'Vui lòng nhập tên danh mục tối đa :max ký tự',
                    'unique' => 'Vui lòng nhập lại tên danh mục do đã tồn tại',
                ],
            ],
            'add_to_cart_form' => [
                'rowId' => [
                    'required' => 'Vui lòng cập nhật mã phần tử trong giỏ hàng',
                ],
                'product_detail_id' => [
                    'required' => 'Vui lòng chọn đủ thông tin sản phẩm',
                ],
                'qty' => [
                    'required' => 'Vui lòng nhập số lượng sản phẩm',
                    'numeric' => 'Vui lòng nhập số lượng sản phẩm là kiểu số',
                    'min' => 'Vui lòng nhập lại số lượng sản phẩm tối thiểu là :min',
                    'max' => 'Vui lòng nhập lại số lượng do sản phẩm còn là ',
                ],
            ],
            'login_form' => [
                'name' => [
                    'required' => 'Vui lòng nhập lại tên',
                    'max' => 'Vui lòng nhập lại tên không quá :max ký tự',
                ],
                'email' => [
                    'required' => 'Vui lòng nhập lại email',
                    'email' => 'Vui lòng nhập lại email đúng định dạng',
                    'max' => 'Vui lòng nhập lại email không quá :max ký tự',
                    'unique' => 'Vui lòng nhập lại email do email đã tồn tại',
                ],
                'password' => [
                    'required' => 'Vui lòng nhập lại mật khẩu',
                    'max' => 'Vui lòng nhập lại mật khẩu không quá :max ký tự',
                    'min' => 'Vui lòng nhập lại mật khẩu ít nhất :min ký tự',
                    'confirmed' => 'Vui lòng xác nhận lại mật khẩu',
                ],
            ],
            'create_order_form' => [
                'email' => [
                    'required' => 'Vui lòng nhập lại email',
                    'max' => 'Vui lòng nhập lại email không quá :max ký tự',
                    'email' => 'Vui lòng nhập lại email do sai định dạng',
                ],
                'user_name' => [
                    'required' => 'Vui lòng nhập lại họ tên',
                    'max' => 'Vui lòng nhập lại họ tên không quá :max ký tự',
                ],
                'phone' => [
                    'required' => 'Vui lòng nhập số điện thoại người nhận',
                    'numeric' => 'Vui lòng nhập lại số điện thoại là kiểu số',
                    'max' => 'Vui lòng nhập lại số điện thoại không quá :max ký tự',
                ],
                'address' => [
                    'required' => 'Vui lòng nhập địa chỉ người nhận',
                    'max' => 'Vui lòng nhập lại địa chỉ không quá :max ký tự',
                ],
                'note' => [
                    'max' => 'Vui lòng nhập lại mô tả không quá :max ký tự',
                ],
            ],
            'create_user_form' => [
                'email' => [
                    'required' => 'Vui lòng nhập lại email',
                    'max' => 'Vui lòng nhập lại email không quá :max ký tự',
                    'email' => 'Vui lòng nhập lại email do sai định dạng',
                    'unique' => 'Vui lòng nhập lại email do email đã tồn tại',
                ],
                'password' => [
                    'required' => 'Vui lòng nhập lại mật khẩu',
                    'max' => 'Vui lòng nhập lại mật khẩu không quá :max ký tự',
                ],
                'password_confirm' => [
                    'required' => 'Vui lòng nhập lại xác nhận mật khẩu',
                    'same' => 'Vui lòng nhập lại xác nhận mật khẩu do không trùng khớp',
                    'max' => 'Vui lòng nhập lại xác nhận mật khẩu không quá :max ký tự',
                ],
                'name' => [
                    'required' => 'Vui lòng nhập lại họ tên',
                    'max' => 'Vui lòng nhập lại họ tên không quá :max ký tự',
                ],
                'role_id' => [
                    'required' => 'Vui lòng chọn lại vai trò',
                ],
                'phone' => [
                    'max' => 'Vui lòng nhập lại số điện thoại không quá :max ký tự',
                ],
                'address' => [
                    'max' => 'Vui lòng nhập lại địa chỉ không quá :max ký tự',
                ],
                'description' => [
                    'max' => 'Vui lòng nhập lại mô tả không quá :max ký tự',
                ],
                'avatar' => [
                    'max' => 'Vui lòng nhập ảnh đại diện không quá :max kb',
                    'mimes' => 'Vui lòng nhập lại ảnh đại diện do sai định dạng',
                    'image' => 'Vui lòng nhập lại ảnh đại diện do sai định dạng',
                ],
            ],
            'update_brand_form' => [
                'name' => [
                    'required' => 'Vui lòng nhập lại tên hãng',
                    'max' => 'Vui lòng nhập lại tên hãng không quá :max ký tự',
                    'unique' => 'Vui lòng nhập lại tên hãng do tên đã tồn tại',
                ],
                'path' => [
                    'required' => 'Vui lòng nhập lại ảnh hãng',
                    'max' => 'Vui lòng nhập ảnh hãng không quá :max kb',
                    'mimes' => 'Vui lòng nhập lại ảnh hãng do sai định dạng',
                    'image' => 'Vui lòng nhập lại ảnh hãng do sai định dạng',
                ],
            ],
            'create_product_form' => [
                'name' => [
                    'required' => 'Vui lòng nhập lại tên sản phẩm',
                    'max' => 'Vui lòng nhập lại tên sản phẩm không quá :max ký tự',
                    'unique' => 'Vui lòng nhập lại tên sản phẩm do tên đã tồn tại',
                ],
                'title' => [
                    'required' => 'Vui lòng nhập lại tiêu đề sản phẩm',
                    'max' => 'Vui lòng nhập lại tiêu đề không quá :max ký tự',
                    'unique' => 'Vui lòng nhập lại tiêu đề sản phẩm do tiêu đề đã tồn tại',
                ],
                'description' => [
                    'required' => 'Vui lòng nhập lại mô tả sản phẩm',
                ],
                'brand_id' => [
                    'required' => 'Vui lòng nhập lại hãng sản phẩm',
                ],
                'category_id' => [
                    'required' => 'Vui lòng nhập lại danh mục sản phẩm',
                ],
            ],
            'create_product_detail_form' => [
                'color_id' => [
                    'required' => 'Vui lòng chọn màu sắc',
                ],
                'storage_id' => [
                    'required' => 'Vui lòng chọn dung lượng',
                ],
                'qty' => [
                    'required' => 'Vui lòng nhập số lượng',
                    'max' => 'Vui lòng nhập lại số lượng không quá :max sản phẩm',
                ],
                'price' => [
                    'required' => 'Vui lòng nhập giá',
                    'max' => 'Vui lòng nhập lại giá không quá :max vnđ',
                ],
                'imei' => [
                    'required' => 'Vui lòng nhập mã imei',
                ],
                'product_images' => [
                    'required' => 'Vui lòng chọn ảnh',
                    'max' => 'Vui lòng nhập chọn ảnh không quá :max kb',
                    'mimes' => 'Vui lòng nhập chọn ảnh đúng định dạng',
                    'image' => 'Vui lòng nhập chọn ảnh đúng định dạng',
                ],
                'unique_color_storage' => [
                    'unique' => 'Màu sắc và dung lượng sản phẩm đã bị trùng lặp',
                ],
            ],
            'create_sale_form' => [
                'start_at' => [
                    'required' => 'Vui lòng nhập lại ngày bắt đầu',
                ],
                'end_at' => [
                    'required' => 'Vui lòng nhập lại ngày kết thúc',
                    'after' => 'Vui lòng nhập lại ngày kết thúc phải sau ngày bắt đầu',
                ],
                'description' => [
                    'required' => 'Vui lòng nhập lại mô tả',
                ],
                'productDetailIds' => [
                    'required' => 'Vui lòng chọn ít nhất 1 sản phẩm',
                ],
                'discounts' => [
                    'required' => 'Vui lòng nhập giảm giá',
                    'min' => 'Vui lòng nhập giảm giá lớn hơn :min',
                    'max' => 'Vui lòng nhập giảm giá nhỏ hơn :max',
                ],
                'prices' => [
                    'required' => 'Vui lòng nhập giá',
                    'min' => 'Vui lòng nhập giá lớn hơn :min',
                ],
            ],
            'statistical_form' => [
                'start_date' => [
                    'required' => 'Vui lòng nhập lại ngày bắt đầu',
                ],
                'end_date' => [
                    'required' => 'Vui lòng nhập lại ngày kết thúc',
                    'after' => 'Vui lòng nhập lại ngày kết thúc phải sau ngày bắt đầu',
                ],
            ],
        ],
    ],
    'add_to_cart_form' => [
        'message' => [
            'error' => 'Thêm vào giỏ hàng thất bại',
            'success' => 'Thêm vào giỏ hàng thành công',
        ],
    ],

    'update_cart_form' => [
        'message' => [
            'error' => 'Cập nhật giỏ hàng thất bại',
            'success' => 'Cập nhật giỏ hàng thành công',
        ],
    ],

    'create_order_form' => [
        'message' => [
            'error' => 'Đặt hàng thất bại',
            'success' => 'Đặt hàng thành công',
        ],
    ],

    'login_form' => [
        'header' => [
            'login' => 'Đăng nhập',
            'register' => 'Đăng ký',
        ],
        'overlay' => [
            'login' => [
                'title' => 'Chào bạn!',
                'content' => 'Nhập thông tin cá nhân của bạn và bắt đầu hành trình với chúng tôi.',
            ],
            'register' => [
                'title' => 'Chào mừng trở lại!',
                'content' => 'Để duy trì kết nối với chúng tôi vui lòng đăng nhập bằng thông tin cá nhân của bạn.',
            ],
        ],
        'label' => [
            'email' => 'Địa chỉ email',
            'password' => 'Mật khẩu',
            'password_confirmation' => 'Xác nhận mật khẩu',
            'name' => 'Họ tên',
        ],
        'placeholder' => [
            'email' => 'Địa chỉ email',
            'password' => 'Mật khẩu',
            'password_confirmation' => 'Xác nhận mật khẩu',
            'name' => 'Họ tên',
        ],
        'message' => [
            'error' => 'Vui lòng nhập lại tài khoản và mật khẩu do không chính xác',
            'success' => 'Đăng nhập thành công',
        ],
    ],

    'register_form' => [
        'message' => [
            'error' => 'Đăng ký thất bại',
            'success' => 'Đăng ký thành công',
        ],
    ],

    'active_form' => [
        'body' => [
            'lock' => 'Bạn chắc chắn muốn khóa',
            'unlock' => 'Bạn chắc chắn muốn mở khóa',
        ],
    ],

    'delete_form' => [
        'body' => 'Bạn chắc chắn muốn xóa',
    ],

    'order_status_form' => [
        'body' => [
            'PENDING' => 'Xác nhận đơn hàng',
            'SHIPPING' => 'Xác nhận hoàn thành đơn hàng',
            'CANCELED' => 'Xác nhận hủy đơn hàng',
        ],
    ],

    'reset_password_form' => [
        'body' => 'Bạn chắc chắn muốn đặt lại mật khẩu',
    ],
];
