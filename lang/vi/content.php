<?php
    return [
        'common' => [
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