<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    |
    | For detailed instructions you can look the title section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'title' => 'AdminLTE 3',
    'title_prefix' => '',
    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Here you can activate the favicon.
    |
    | For detailed instructions you can look the favicon section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_ico_only' => false,
    'use_full_favicon' => true,

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    | For detailed instructions you can look the logo section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'logo' => '<b>Daraguma</b> RS', // Titulo del sidebar
    // 'logo_img' => 'vendor/adminlte/dist/img/AdminLTELogo.png', // Imagen del sidebar
    'logo_img' => 'images/daraguma-icon.png', // Imagen del sidebar
    'logo_img_class' => 'brand-image img-circle elevation-3',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'Logo del proyecto',

    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    |
    | Here you can activate and change the user menu.
    |
    | For detailed instructions you can look the user menu section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'usermenu_enabled' => true,
    'usermenu_header' => false,
    'usermenu_header_class' => 'bg-primary',
    'usermenu_image' => false,
    'usermenu_desc' => false,
    'usermenu_profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Here we change the layout of your admin panel.
    |
    | For detailed instructions you can look the layout section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => true,
    'layout_fixed_navbar' => true,
    'layout_fixed_footer' => null,
    'layout_dark_mode' => false,

    /*
    |--------------------------------------------------------------------------
    | Authentication Views Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the authentication views.
    |
    | For detailed instructions you can look the auth classes section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'classes_auth_card' => 'card-outline card-primary',
    'classes_auth_header' => '',
    'classes_auth_body' => '',
    'classes_auth_footer' => '',
    'classes_auth_icon' => '',
    'classes_auth_btn' => 'btn-flat btn-primary',

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For detailed instructions you can look the admin panel classes here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'classes_body' => '',
    'classes_brand' => '',
    'classes_brand_text' => '',
    'classes_content_wrapper' => '',
    'classes_content_header' => '',
    'classes_content' => '',
    'classes_sidebar' => 'sidebar-dark-primary elevation-4',
    'classes_sidebar_nav' => 'nav-child-indent',
    'classes_topnav' => 'navbar-white navbar-light',
    'classes_topnav_nav' => 'navbar-expand',
    'classes_topnav_container' => 'container',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar of the admin panel.
    |
    | For detailed instructions you can look the sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'sidebar_mini' => 'lg',
    'sidebar_collapse' => false,
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => false,
    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme' => 'os-theme-light',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 300,

    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    |
    | Here we can modify the right sidebar aka control sidebar of the admin panel.
    |
    | For detailed instructions you can look the right sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'right_sidebar' => false,
    'right_sidebar_icon' => 'fas fa-cogs',
    'right_sidebar_theme' => 'dark',
    'right_sidebar_slide' => true,
    'right_sidebar_push' => true,
    'right_sidebar_scrollbar_theme' => 'os-theme-light',
    'right_sidebar_scrollbar_auto_hide' => 'l',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Here we can modify the url settings of the admin panel.
    |
    | For detailed instructions you can look the urls section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_route_url' => false,
    'dashboard_url' => 'dashboard',
    'logout_url' => 'logout',
    'login_url' => 'login',
    'register_url' => 'register',
    'password_reset_url' => 'password/reset',
    'password_email_url' => 'password/email',
    'profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Laravel Mix
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Laravel Mix option for the admin panel.
    |
    | For detailed instructions you can look the laravel mix section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'enabled_laravel_mix' => false,
    'laravel_mix_css_path' => 'css/app.css',
    'laravel_mix_js_path' => 'js/app.js',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

    'menu' => [

        /*-----------
            NAVBAR
        -------------*/

        // ESTA ES LA BARRA DE BUSQUEDA //
        [
            'type'         => 'navbar-search',
            'text'         => 'search',
            'topnav_right' => true,
        ],

        // ESTA ES LA FUNCION DE PANTALLA COMPLETA DEL NAVBAR //
        [
            'type'         => 'fullscreen-widget',
            'topnav_right' => true,
        ],

        /*------------
            SIDEBAR
        --------------*/

        // ESTE ES LA BARRA DE BUSQUEDA DEL SIDEBAR //
        [
            'type' => 'sidebar-menu-search',
            'text' => 'search',
        ],

        // TITULO //
        ['header' => 'Men??'],

        // DASHBOARD //
        [
            'text' => 'Dashboard',
            'url'  => 'dashboard',
            'icon' => 'fas fa-fw fa-utensils',
        ],

        // CAJA/MESERO //
        [
            'text'    => 'Caja/Mesero',
            'icon'    => 'fas fa-fw fa-cash-register',
            'submenu' => [
                [
                    'text' => 'Ventas',
                    'url'  => 'caja/create',
                    'icon' => 'fas fa-fw fa-receipt'
                ],
                [
                    'text' => 'Cuadre de caja',
                    'url'  => 'caja/cuadre',
                    'icon' => 'fas fa-fw fa-cash-register'
                ],
                [
                    'text' => 'Control de propinas',
                    'url'  => '#',
                    'icon' => 'fas fa-fw fa-piggy-bank'
                ],
                [
                    'text' => 'Tipo de orden',
                    'icon' => 'fas fa-bags-shopping',
                    'submenu' => [
                        [
                          'text' => 'Tipo de orden',
                            'url' => 'order-type/',
                            'icon' => 'far fa-bags-shopping',
                        ],
                        [
                            'text' => 'Agregar',
                            'url' => 'order-type/create',
                            'icon' => 'far fa-shopping-bag',
                        ],
                    ],
                ],
                [
                    'text' => 'Metodos de pago',
                    'icon' => 'fas fa-money-check-alt',
                    'submenu' => [
                        [
                            'text' => 'Metodos de pago',
                            'url' => 'payment-method/',
                            'icon' => 'fal fa-sack-dollar',
                        ],
                        [
                            'text' => 'Agregar',
                            'url' => 'payment-method/create',
                            'icon' => 'far fa-coins',
                        ],
                    ],
                ],
            ],
        ],

        // Cocina
        [
            'text' => 'Cocina',
            'url'  => 'cocina',
            'icon' => 'fas fa-fw fa-utensil-spoon',
        ],

        // Recepci??n
        [
            'text'    => 'Recepci??n',
            'icon'    => 'fas fa-fw fa-concierge-bell',
            'submenu' => [
                [
                    'text' => 'Recepci??n',
                    'icon'    => 'fas fa-fw fa-concierge-bell',
                    'url'  => 'recepcion',
                ],
                [
                    'text' => 'Reservaciones',
                    'icon' => 'fas fa-fw fa-calendar-day',
                    'submenu' => [
                        [
                          'text' => 'Tipo reservaciones',
                          'icon' => 'fas fa-fw fa-calendar-day',
                          'submenu' => [
                              [
                                  'text' => 'Tipo reservaciones',
                                  'icon' => 'fas fa-fw fa-calendar-day',
                                  'url' => 'type-reservation/',
                              ],
                              [
                                  'text' => 'Registrar',
                                  'icon' => 'fas fa-fw fa-clipboard',
                                  'url' => 'type-reservation/create'
                              ],
                          ]
                        ],
                        [
                            'text' => 'Reservaciones',
                            'url'  => 'reservation',
                            'icon'    => 'fas fa-fw fa-calendar-alt',
                        ],
                        [
                            'text' => 'Reservar',
                            'url'  => 'reservation/create',
                            'icon'    => 'fas fa-fw fa-calendar-plus',
                        ],
                    ],
                ],
                [
                    'text' => 'Clientes',
                    'icon'    => 'fas fa-fw fa-address-card',
                    'submenu'  => [
                        [
                            'text' => 'Clientes',
                            'url'  => 'customer',
                            'icon'    => 'far fa-fw fa-address-card',
                        ],
                        [
                            'text' => 'Registrar',
                            'url'  => 'customer/create',
                            'icon'    => 'fas fa-fw fa-clipboard',
                        ],
                        [
                            'text' => 'Tipo de cliente',
                            'icon' => 'fas fa-user',
                            'submenu' => [
                                [
                                    'text' => 'Tipo de cliente',
                                    'url' => 'customer-type',
                                    'icon' => 'far fa-user',
                                ],
                                [
                                    'text' => 'Agregar',
                                    'url' => 'customer-type/create',
                                    'icon' => 'fas fa-user-plus',
                                ],
                            ],
                        ],
                    ]
                ],

                // [
                //     'text' => 'Eventos',
                //     'url'  => '#',
                // ],
            ],
        ],

        // Bar
        [
            'text' => 'Bar',
            'url'  => '#',
            'icon' => 'fas fa-fw fa-beer',
        ],

        // Mesas
        [
            'text' => 'Mesas',
            // 'url'  => 'mesas',
            'icon' => 'fas fa-chair',
            'submenu' => [
                [
                    'text' => 'Gestionar Mesas',
                    'url'  => 'tables',
                    'icon' => 'fas fa-table'
                ],
                [
                    'text' => 'Agregar Mesa',
                    'url'  => 'tables/create',
                    'icon' => 'fas fa-save'
                ],
                [
                    'text' => 'Salones',
                    'icon' => 'fas fa-person-booth',
                    'submenu' => [
                        [
                            'text' => 'Gestionar Salones',
                            'url'  => 'livingrooms',
                            'icon' => 'fas fa-table'
                        ],
                        [
                            'text' => 'Agregar Salon',
                            'url'  => 'livingrooms/create',
                            'icon' => 'fas fa-save'
                        ]
                    ]
                ],
            ]
        ],

        // Men??
        [
            'text' => 'Men??',
            'url'  => 'menu',
            'icon' => 'fas fa-fw fa-border-all',
        ],

        // Productos
        [
            'text' => 'Productos',
            // 'url'  => '#',
            'icon' => 'fas fa-fw fa-utensils',
            'submenu' => [
                [
                    'text' => 'Gestionar Productos',
                    'url'  => 'products',
                    'icon' => 'fas fa-table'
                ],
                [
                    'text' => 'Agregar Productos',
                    'url'  => 'products/create',
                    'icon' => 'fas fa-hotdog'
                ],
                [
                    'text' => 'Categorias',
                    'icon' => 'fas fa-tags',
                    'submenu' => [
                        [
                            'text' => 'Gestionar Categorias',
                            'url'  => 'product_category',
                            'icon' => 'fas fa-tags'
                        ],
                        [
                            'text' => 'Agregar Categoria',
                            'url'  => 'product_category/create',
                            'icon' => 'fas fa-save'
                        ]
                    ]
                ]
            ]
        ],

        // Inventario
        [
            'text' => 'Inventario',
            'icon' => 'fas fa-fw fa-warehouse',
            'submenu' => [
                [
                    'text' => 'Gestionar Ingredientes',
                    'icon' => 'fas fa-dolly-flatbed',
                    'submenu' => [
                        [
                            'text' => 'Ingredientes',
                            'url'  => 'ingredients/',
                            'icon' => 'fas fa-pallet'
                        ],
                        [
                            'text' => 'Agregar Ingrediente',
                            'url'  => 'ingredients/create',
                            'icon' => 'fas fa-pallet'
                        ],
                        [
                            'text' => 'Control de stock',
                            'url'  => 'ingredients-stock/create',
                            'icon' => 'fas fa-pallet'
                        ],
                        [
                            'text' => 'Unidades de medida',
                            'icon' => 'fas fa-pallet',
                            'submenu' => [
                                [
                                    'text' => 'Unidades',
                                    'url' => 'units-measurement',
                                    'icon' => 'fas fa-pallet'
                                ],
                                [
                                    'text' => 'Agregar',
                                    'url' => 'units-measurement/create',
                                    'icon' => 'fas fa-pallet'
                                ],
                            ]
                        ]
                    ]
                ],
                [
                    'text' => 'Gestionar Recetas',
                    'icon' => 'fas fa-dolly-flatbed',
                    'submenu' => [
                        [
                            'text' => 'Recetas',
                            'url'  => 'recipes/',
                            'icon' => 'fas fa-pallet'
                        ],
                        [
                            'text' => 'Agregar Receta',
                            'url'  => 'recipes/create',
                            'icon' => 'fas fa-pallet'
                        ]
                    ]
                ],
                [
                    'text' => 'Gestionar Almacenes',
                    'icon' => 'fas fa-dolly-flatbed',
                    'submenu' => [
                        [
                            'text' => 'Almacenes',
                            'url'  => 'warehouse',
                            'icon' => 'fas fa-pallet'
                        ],
                        [
                            'text' => 'Agregar',
                            'url'  => 'warehouse/create',
                            'icon' => 'far fa-pallet'
                        ]
                    ]
                ]
            ]
        ],

        // Terminales
        [
            'text' => 'Terminales',
            // 'url'  => '#',
            'icon' => 'fas fa-fw fa-network-wired',
            'submenu' => [
                [
                    'text' => 'Gestionar Terminales',
                    'url'  => 'box',
                    'icon' => 'fas fa-fw fa-network-wired'
                ],
                [
                    'text' => 'Agregar Terminal',
                    'url'  => 'box/create',
                    'icon' => 'fas fa-laptop-medical'
                ]
            ]
        ],

        // Compras
        [
            'text' => 'Compras',
            'icon' => 'fas fa-fw fa-shopping-cart',
            'submenu' => [
                [
                    'text' => 'Historial de Compras',
                    'url'  => 'compras/',
                    'icon' => 'fas fa-shopping-cart'
                ],
                [
                    'text' => 'Realizar Entrada',
                    'url'  => 'compras/create',
                    'icon' => 'fas fa-shopping-cart'
                ],
                [
                    'text' => 'Suplidores',
                    'icon' => 'fas fa-shopping-cart',
                    'submenu' => [
                        [
                            'text' => 'Suplidores',
                            'icon' => 'fas fa-users',
                            'url' => '#'
                        ],
                        [
                            'text' => 'Agregar suplidor',
                            'icon' => 'fas fa-user',
                            'url' => '#'
                        ],
                    ]
                ]
            ]
        ],

        // Reportes
        [
            'text' => 'Reportes',
            'url'  => 'reportes',
            'icon' => 'fas fa-fw fa-print',
        ],

        // Seguridad
        [
            'text' => 'Seguridad',
            'icon' => 'fas fa-fw fa-fingerprint',
            'submenu' => [
                [
                    'text' => 'Adminsitrar usuarios',
                    'icon' => 'fas fa-users',
                    'submenu' => [
                        [
                            'text' => 'Usuarios',
                            'url'  => '#',
                            'icon' => 'fas fa-users'
                        ],
                        [
                            'text' => 'Registrar usuarios',
                            'url'  => 'registrarse',
                            'icon' => 'fas fa-user-plus'
                        ]
                    ]
                ]
            ]
        ],

        // Empleados
        [
            'text' => 'Empleados',
            'url'  => '#',
            'icon' => 'fas fa-fw fa-user-friends',
        ],
        [
            'text' => 'Info',
            'url'  => 'info',
            'icon' => 'fas fa-fw fa-info-circle',
        ]

        // -------------------------------
        // EJEMPLOS PARA EL SIDEBAR
        // -------------------------------
            // Un solo link
        /*
        [
            'text' => 'blog',
            'url'  => 'admin/blog',
            'can'  => 'manage-blog',
        ],
        */
            // Label
        /*
        [
            'text'        => 'pages',
            'url'         => 'admin/pages',
            'icon'        => 'far fa-fw fa-file',
            'label'       => 4,
            'label_color' => 'success',
        ],
        */

            // Titulo
        /*
        ['header' => 'Account Settings'],
        */

            // Un solo link
        /*
        [
            'text' => 'profile',
            'url'  => 'admin/settings',
            'icon' => 'fas fa-fw fa-user',
        ],

        [
            'text' => 'change_password',
            'url'  => 'admin/settings',
            'icon' => 'fas fa-fw fa-lock',
        ],
        */

            // Multilevel
        /*
        [
            'text'    => 'multilevel',
            'icon'    => 'fas fa-fw fa-share',
            'submenu' => [
                [
                    'text' => 'level_one',
                    'url'  => '#',
                ],
                [
                    'text'    => 'level_one',
                    'url'     => '#',
                    'submenu' => [
                        [
                            'text' => 'level_two',
                            'url'  => '#',
                        ],
                        [
                            'text'    => 'level_two',
                            'url'     => '#',
                            'submenu' => [
                                [
                                    'text' => 'level_three',
                                    'url'  => '#',
                                ],
                                [
                                    'text' => 'level_three',
                                    'url'  => '#',
                                ],
                            ],
                        ],
                    ],
                ],
                [
                    'text' => 'level_one',
                    'url'  => '#',
                ],
            ],
        ],
        */

        // ['header' => 'labels'],
        // [
        //     'text'       => 'important',
        //     'icon_color' => 'red',
        //     'url'        => '#',
        // ],
        // [
        //     'text'       => 'warning',
        //     'icon_color' => 'yellow',
        //     'url'        => '#',
        // ],
        // [
        //     'text'       => 'information',
        //     'icon_color' => 'cyan',
        //     'url'        => '#',
        // ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For detailed instructions you can look the menu filters section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Here we can modify the plugins used inside the admin panel.
    |
    | For detailed instructions you can look the plugins section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Plugins-Configuration
    |
    */

    'plugins' => [
        'Datatables' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css',
                ],
            ],
        ],
        'Select2' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css',
                ],
            ],
        ],
        'Chartjs' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
                ],
            ],
        ],
        'Sweetalert2' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '//cdn.jsdelivr.net/npm/sweetalert2@11',
                ]
            ],
        ],
        'Pace' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-center-radar.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
                ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | IFrame
    |--------------------------------------------------------------------------
    |
    | Here we change the IFrame mode configuration. Note these changes will
    | only apply to the view that extends and enable the IFrame mode.
    |
    | For detailed instructions you can look the iframe mode section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/IFrame-Mode-Configuration
    |
    */

    'iframe' => [
        'default_tab' => [
            'url' => null,
            'title' => null,
        ],
        'buttons' => [
            'close' => true,
            'close_all' => true,
            'close_all_other' => true,
            'scroll_left' => true,
            'scroll_right' => true,
            'fullscreen' => true,
        ],
        'options' => [
            'loading_screen' => 1000,
            'auto_show_new_tab' => true,
            'use_navbar_items' => true,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Livewire
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Livewire support.
    |
    | For detailed instructions you can look the livewire here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'livewire' => false,
];
