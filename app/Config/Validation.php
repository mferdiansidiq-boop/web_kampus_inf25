<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var list<string>
     */
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------

    /**
     * Validation rules for User registration/insertion
     */
    public array $user_insert = [
        'nama_user'  => 'required|string|min_length[3]|max_length[100]',
        'username'   => 'required|string|min_length[3]|max_length[50]|is_unique[tbl_user.username]',
        'password'   => 'required|string|min_length[6]|max_length[100]',
        'level'      => 'required|in_list[admin,user]',
    ];

    public array $user_insert_errors = [
        'nama_user' => [
            'required'   => 'Nama user harus diisi',
            'string'     => 'Nama user harus berupa teks',
            'min_length' => 'Nama user minimal 3 karakter',
            'max_length' => 'Nama user maksimal 100 karakter',
        ],
        'username' => [
            'required'   => 'Username harus diisi',
            'string'     => 'Username harus berupa teks',
            'min_length' => 'Username minimal 3 karakter',
            'max_length' => 'Username maksimal 50 karakter',
            'is_unique'  => 'Username sudah terdaftar',
        ],
        'password' => [
            'required'   => 'Password harus diisi',
            'string'     => 'Password harus berupa teks',
            'min_length' => 'Password minimal 6 karakter',
            'max_length' => 'Password maksimal 100 karakter',
        ],
        'level' => [
            'required'  => 'Level harus dipilih',
            'in_list'   => 'Level hanya boleh admin atau user',
        ],
    ];

    /**
     * Validation rules for User update
     */
    public array $user_update = [
        'nama_user' => 'required|string|min_length[3]|max_length[100]',
        'username'  => 'required|string|min_length[3]|max_length[50]',
        'level'     => 'required|in_list[admin,user]',
    ];

    public array $user_update_errors = [
        'nama_user' => [
            'required'   => 'Nama user harus diisi',
            'string'     => 'Nama user harus berupa teks',
            'min_length' => 'Nama user minimal 3 karakter',
            'max_length' => 'Nama user maksimal 100 karakter',
        ],
        'username' => [
            'required'   => 'Username harus diisi',
            'string'     => 'Username harus berupa teks',
            'min_length' => 'Username minimal 3 karakter',
            'max_length' => 'Username maksimal 50 karakter',
        ],
        'level' => [
            'required'  => 'Level harus dipilih',
            'in_list'   => 'Level hanya boleh admin atau user',
        ],
    ];

    /**
     * Validation rules for Password change
     */
    public array $user_password = [
        'password'             => 'required|string|min_length[6]|max_length[100]',
        'password_confirmation' => 'required|matches[password]',
    ];

    public array $user_password_errors = [
        'password' => [
            'required'   => 'Password harus diisi',
            'string'     => 'Password harus berupa teks',
            'min_length' => 'Password minimal 6 karakter',
            'max_length' => 'Password maksimal 100 karakter',
        ],
        'password_confirmation' => [
            'required' => 'Konfirmasi password harus diisi',
            'matches'  => 'Konfirmasi password tidak sesuai dengan password',
        ],
    ];
}
