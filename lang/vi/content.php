<?php
return [
    'common' => [
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
        ],
        'link' => [
            'forgot_password' => 'Quên mật khẩu',
        ],
        'logout_success' => 'Đăng xuất thành công',
        'notify_message' => [
            'success' => [
                'add' => 'Thêm mới thành công',
                'update' => 'Cập nhật thành công',
                'delete' => 'Xóa thành công',
                'active' => 'Khóa thành công',
            ],
            'error' => [
                'add' => 'Thêm mới thất bại',
                'update' => 'Cập nhật thất bại',
                'delete' => 'Xóa thất bại',
                'active' => 'Khóa thất bại',
            ],
        ],
    ],

    'validate' => [
        'frontend' => [],
        'backend' => [
            'login_form' => [
                'email' => [
                    'required' => 'Vui lòng nhập lại email',
                    'max' => 'Vui lòng nhập lại email không quá :max ký tự',
                ],
                'password' => [
                    'required' => 'Vui lòng nhập lại mật khẩu',
                    'max' => 'Vui lòng nhập lại mật khẩu không quá :max ký tự',
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
        ],
    ],

    'create_user_form' => [
        'message' => [
            'error' => 'Thêm mới thất bại',
            'success' => 'Đăng nhập thành công',
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
            'name' => 'Họ tên',
        ],
        'placeholder' => [
            'email' => 'Địa chỉ email',
            'password' => 'Mật khẩu',
            'name' => 'Họ tên',
        ],
        'message' => [
            'error' => 'Vui lòng nhập lại tài khoản và mật khẩu',
            'success' => 'Đăng nhập thành công',
        ],
    ],
];
