<div class="sidebar">
    <div class="sidebar-inner">
        <div class="sidebar-logo">
            <a href="{{ setRoute('admin.dashboard') }}" class="sidebar-main-logo">
                <img src="{{ get_logo($basic_settings,'dark') }}" data-white_img="{{ get_logo($basic_settings,'white') }}"
                data-dark_img="{{ get_logo($basic_settings,'dark') }}" alt="logo">
            </a>
            <button class="sidebar-menu-bar">
                <i class="fas fa-exchange-alt"></i>
            </button>
        </div>
        <div class="sidebar-user-area">
            <div class="sidebar-user-thumb">
                <a href="{{ setRoute('admin.profile.index') }}"><img src="{{ get_image(Auth::user()->image,'admin-profile','profile') }}" alt="user"></a>
            </div>
            <div class="sidebar-user-content">
                <h6 class="title">{{ Auth::user()->fullname }}</h6>
                <span class="sub-title">{{ Auth::user()->getRolesString() }}</span>
            </div>
        </div>
        @php
            $current_route = Route::currentRouteName();
        @endphp
        <div class="sidebar-menu-wrapper">
            <ul class="sidebar-menu">

                @include('admin.components.side-nav.link',[
                    'route'     => 'admin.dashboard',
                    'title'     => "Dashboard",
                    'icon'      => "menu-icon las la-rocket",
                ])
                
                {{-- Section Default --}}
                @include('admin.components.side-nav.link-group',[
                    'group_title'       => "Default",
                    'group_links'       => [
                        [
                            'title'     => "Setup Currency",
                            'route'     => "admin.currency.index",
                            'icon'      => "menu-icon las la-coins",
                        ],
                        [
                            'title'     => "Fees & Charges",
                            'route'     => "admin.trx.settings.index",
                            'icon'      => "menu-icon las la-wallet",
                        ],
                        [
                            'title'     => "Subscribers",
                            'route'     => "admin.subscriber.index",
                            'icon'      => "menu-icon las la-bell",
                        ],
                        [
                            'title'     => "Contact Messages",
                            'route'     => "admin.contact.messages.index",
                            'icon'      => "menu-icon las la-sms",
                        ],
                        [
                            'title'     => "Investment Plan",
                            'route'     => "admin.invest.plan.index",
                            'icon'      => "menu-icon las la-hand-holding-usd",
                        ],
                    ]
                ])

                {{-- Section Transaction & Logs --}}
                @include('admin.components.side-nav.link-group',[
                    'group_title'       => "Transactions & Logs",
                    'group_links'       => [
                        'dropdown'      => [
                            [
                                'title'     => "Add Money Logs",
                                'icon'      => "menu-icon las la-calculator",
                                'links'     => [
                                    [
                                        'title'     => "Pending Logs",
                                        'route'     => "admin.add.money.pending",
                                    ],
                                    [
                                        'title'     => "Completed Logs",
                                        'route'     => "admin.add.money.complete",
                                    ],
                                    [
                                        'title'     => "Canceled Logs",
                                        'route'     => "admin.add.money.canceled", 
                                    ],
                                    [
                                        'title'     => "All Logs",
                                        'route'     => "admin.add.money.index", 
                                    ]
                                ],
                            ],
                            [
                                'title'             => "Money Out Logs",
                                'icon'              => "menu-icon las la-sign-out-alt",
                                'links'     => [
                                    [
                                        'title'     => "Pending Logs",
                                        'route'     => "admin.money.out.pending",
                                    ],
                                    [
                                        'title'     => "Completed Logs",
                                        'route'     => "admin.money.out.complete",
                                    ],
                                    [
                                        'title'     => "Canceled Logs",
                                        'route'     => "admin.money.out.canceled", 
                                    ],
                                    [
                                        'title'     => "All Logs",
                                        'route'     => "admin.money.out.index", 
                                    ]
                                ],
                            ],
                            [
                                'title'             => "Money Transfer Logs",
                                'icon'              => "menu-icon las la-exchange-alt",
                                'links'     => [
                                    [
                                        'title'     => "All Logs",
                                        'route'     => "admin.money.transfer.index", 
                                    ]
                                ],
                            ],
                            [
                                'title'             => "Invest Profit Logs",
                                'icon'              => "menu-icon las la-coins",
                                'links'     => [
                                    [
                                        'title'     => "All Logs",
                                        'route'     => "admin.invest.profit.index", 
                                    ]
                                ],
                            ],
                        ],

                    ]
                ])
                {{-- Interface Panel --}}
                @include('admin.components.side-nav.link-group',[
                    'group_title'       => "Interface Panel",
                    'group_links'       => [
                        'dropdown'      => [
                            [
                                'title'     => "User Care",
                                'icon'      => "menu-icon las la-user-edit",
                                'links'     => [
                                    [
                                        'title'     => "Active Users",
                                        'route'     => "admin.users.active",
                                    ],
                                    [
                                        'title'     => "Email Unverified",
                                        'route'     => "admin.users.email.unverified",
                                    ],
                                    [
                                        'title'     => "KYC Unverified",
                                        'route'     => "admin.users.kyc.unverified", 
                                    ],
                                    [
                                        'title'     => "All Users",
                                        'route'     => "admin.users.index",
                                    ],
                                    [
                                        'title'     => "Email To Users",
                                        'route'     => "admin.users.email.users",
                                    ],
                                    [
                                        'title'     => "Banned Users",
                                        'route'     => "admin.users.banned",
                                    ]
                                ],
                            ],
                            [
                                'title'             => "Admin Care",
                                'icon'              => "menu-icon las la-user-shield",
                                'links'     => [
                                    [
                                        'title'     => "All Admin",
                                        'route'     => "admin.admins.index",
                                    ],
                                    [
                                        'title'     => "Admin Role",
                                        'route'     => "admin.admins.role.index",
                                    ],
                                    [
                                        'title'     => "Role Permission",
                                        'route'     => "admin.admins.role.permission.index", 
                                    ],
                                    [
                                        'title'     => "Email To Admin",
                                        'route'     => "admin.admins.email.admins",
                                    ]
                                ],
                            ],
                        ],

                    ]
                ])

                {{-- Section Settings --}}
                @include('admin.components.side-nav.link-group',[
                    'group_title'       => "Settings",
                    'group_links'       => [
                        'dropdown'      => [
                            [
                                'title'     => "Web Settings",
                                'icon'      => "menu-icon lab la-safari",
                                'links'     => [
                                    [
                                        'title'     => "Basic Settings",
                                        'route'     => "admin.web.settings.basic.settings",
                                    ],
                                    [
                                        'title'     => "Image Assets",
                                        'route'     => "admin.web.settings.image.assets",
                                    ],
                                    [
                                        'title'     => "Setup SEO",
                                        'route'     => "admin.web.settings.setup.seo", 
                                    ]
                                ],
                            ],
                            [
                                'title'             => "App Settings",
                                'icon'              => "menu-icon las la-mobile",
                                'links'     => [
                                    [
                                        'title'     => "Splash Screen",
                                        'route'     => "admin.app.settings.splash.screen",
                                    ],
                                    [
                                        'title'     => "Onboard Screen",
                                        'route'     => "admin.app.settings.onboard.screens",
                                    ],
                                    [
                                        'title'     => "App URLs",
                                        'route'     => "admin.app.settings.urls", 
                                    ],
                                ],
                            ],
                        ],
                    ]
                ])
                
                @include('admin.components.side-nav.link',[
                    'route'     => 'admin.languages.index',
                    'title'     => "Languages",
                    'icon'      => "menu-icon las la-language",
                ])

                @include('admin.components.side-nav.link',[
                    'route'     => 'admin.settings.money.out.index',
                    'title'     => "Money Out Settings",
                    'icon'      => "menu-icon las la-cog",
                ])

                @include('admin.components.side-nav.link',[
                    'route'     => 'admin.settings.referral.index',
                    'title'     => "Referral Settings",
                    'icon'      => "menu-icon las la-network-wired",
                ])

                {{-- Verification Center --}}
                @include('admin.components.side-nav.link-group',[
                    'group_title'       => "Verification Center",
                    'group_links'       => [
                        'dropdown'      => [
                            [
                                'title'     => "Setup Email",
                                'icon'      => "menu-icon las la-envelope-open-text",
                                'links'     => [
                                    [
                                        'title'     => "Email Method",
                                        'route'     => "admin.setup.email.config",
                                    ],
                                    // [
                                    //     'title'     => "Default Template",
                                    //     'route'     => "admin.setup.email.template.default",
                                    // ]
                                ],
                            ]
                        ],

                    ]
                ])

                @include('admin.components.side-nav.link',[
                    'route'     => 'admin.setup.kyc.index',
                    'title'     => "Setup KYC",
                    'icon'      => "menu-icon las la-clipboard-list",
                ])

                @if (admin_permission_by_name("admin.setup.sections.section"))
                    <li class="sidebar-menu-header">{{ __("Setup Web Content") }}</li>
                    @php
                        $current_url = URL::current();

                        $setup_section_childs  = [
                            setRoute('admin.setup.sections.section','banner'),
                            setRoute('admin.setup.sections.section','brand'),
                            setRoute('admin.setup.sections.section','about-us'),
                            setRoute('admin.setup.sections.section','services'),
                            setRoute('admin.setup.sections.section','feature'),
                            setRoute('admin.setup.sections.section','clients-feedback'),
                            setRoute('admin.setup.sections.section','announcement'),
                            setRoute('admin.setup.sections.section','how-it-work'),
                            setRoute('admin.setup.sections.section','contact-us'),
                            setRoute('admin.setup.sections.section','footer'),
                        ];
                    @endphp

                    <li class="sidebar-menu-item sidebar-dropdown @if (in_array($current_url,$setup_section_childs)) active @endif">
                        <a href="javascript:void(0)">
                            <i class="menu-icon las la-terminal"></i>
                            <span class="menu-title">{{ __("Setup Section") }}</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li class="sidebar-menu-item">
                                <a href="{{ setRoute('admin.setup.sections.section','banner') }}" class="nav-link @if ($current_url == setRoute('admin.setup.sections.section','banner')) active @endif">
                                    <i class="menu-icon las la-ellipsis-h"></i>
                                    <span class="menu-title">{{ __("Banner Section") }}</span>
                                </a>
                                <a href="{{ setRoute('admin.setup.sections.section','brand') }}" class="nav-link @if ($current_url == setRoute('admin.setup.sections.section','brand')) active @endif">
                                    <i class="menu-icon las la-ellipsis-h"></i>
                                    <span class="menu-title">{{ __("Brand Section") }}</span>
                                </a>
                                <a href="{{ setRoute('admin.setup.sections.section','about-us') }}" class="nav-link @if ($current_url == setRoute('admin.setup.sections.section','about-us')) active @endif">
                                    <i class="menu-icon las la-ellipsis-h"></i>
                                    <span class="menu-title">{{ __("About Us Section") }}</span>
                                </a>
                                <a href="{{ setRoute('admin.setup.sections.section','services') }}" class="nav-link @if ($current_url == setRoute('admin.setup.sections.section','services')) active @endif">
                                    <i class="menu-icon las la-ellipsis-h"></i>
                                    <span class="menu-title">{{ __("Services Section") }}</span>
                                </a>
                                <a href="{{ setRoute('admin.setup.sections.section','feature') }}" class="nav-link @if ($current_url == setRoute('admin.setup.sections.section','feature')) active @endif">
                                    <i class="menu-icon las la-ellipsis-h"></i>
                                    <span class="menu-title">{{ __("Feature Section") }}</span>
                                </a>
                                <a href="{{ setRoute('admin.setup.sections.section','clients-feedback') }}" class="nav-link @if ($current_url == setRoute('admin.setup.sections.section','clients-feedback')) active @endif">
                                    <i class="menu-icon las la-ellipsis-h"></i>
                                    <span class="menu-title">{{ __("Clients Feedback") }}</span>
                                </a>
                                <a href="{{ setRoute('admin.setup.sections.section','announcement') }}" class="nav-link @if ($current_url == setRoute('admin.setup.sections.section','announcement')) active @endif">
                                    <i class="menu-icon las la-ellipsis-h"></i>
                                    <span class="menu-title">{{ __("Announcements") }}</span>
                                </a>
                                <a href="{{ setRoute('admin.setup.sections.section','how-it-work') }}" class="nav-link @if ($current_url == setRoute('admin.setup.sections.section','how-it-work')) active @endif">
                                    <i class="menu-icon las la-ellipsis-h"></i>
                                    <span class="menu-title">{{ __("How It Work Section") }}</span>
                                </a>
                                <a href="{{ setRoute('admin.setup.sections.section','about-page') }}" class="nav-link @if ($current_url == setRoute('admin.setup.sections.section','about-page')) active @endif">
                                    <i class="menu-icon las la-ellipsis-h"></i>
                                    <span class="menu-title">{{ __("About Page Section") }}</span>
                                </a>
                                <a href="{{ setRoute('admin.setup.sections.section','contact-us') }}" class="nav-link @if ($current_url == setRoute('admin.setup.sections.section','contact-us')) active @endif">
                                    <i class="menu-icon las la-ellipsis-h"></i>
                                    <span class="menu-title">{{ __("Contact US Section") }}</span>
                                </a>
                                <a href="{{ setRoute('admin.setup.sections.section','footer') }}" class="nav-link @if ($current_url == setRoute('admin.setup.sections.section','footer')) active @endif">
                                    <i class="menu-icon las la-ellipsis-h"></i>
                                    <span class="menu-title">{{ __("Footer Section") }}</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif

                @include('admin.components.side-nav.link',[
                    'route'     => 'admin.setup.pages.index',
                    'title'     => "Setup Pages",
                    'icon'      => "menu-icon las la-file-alt",
                ])

                @include('admin.components.side-nav.link',[
                    'route'     => 'admin.extensions.index',
                    'title'     => "Extensions",
                    'icon'      => "menu-icon las la-puzzle-piece",
                ])

                @include('admin.components.side-nav.link',[
                    'route'     => 'admin.useful.links.index',
                    'title'     => "Useful Links",
                    'icon'      => "menu-icon las la-link",
                ])

                @if (admin_permission_by_name("admin.payment.gateway.view"))
                    <li class="sidebar-menu-header">{{ __("Payment Methods") }}</li>
                    @php
                        $payment_add_money_childs  = [
                            setRoute('admin.payment.gateway.view',['add-money','automatic']),
                            setRoute('admin.payment.gateway.view',['add-money','manual']),
                        ]
                    @endphp
                    <li class="sidebar-menu-item sidebar-dropdown @if (in_array($current_url,$payment_add_money_childs)) active @endif">
                        <a href="javascript:void(0)">
                            <i class="menu-icon las la-funnel-dollar"></i>
                            <span class="menu-title">{{ __("Add Money") }}</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li class="sidebar-menu-item">
                                <a href="{{ setRoute('admin.payment.gateway.view',['add-money','automatic']) }}" class="nav-link @if ($current_url == setRoute('admin.payment.gateway.view',['add-money','automatic'])) active @endif">
                                    <i class="menu-icon las la-ellipsis-h"></i>
                                    <span class="menu-title">{{ __("Automatic") }}</span>
                                </a>
                                <a href="{{ setRoute('admin.payment.gateway.view',['add-money','manual']) }}" class="nav-link @if ($current_url == setRoute('admin.payment.gateway.view',['add-money','manual'])) active @endif">
                                    <i class="menu-icon las la-ellipsis-h"></i>
                                    <span class="menu-title">{{ __("Manual") }}</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-menu-item @if ($current_url == setRoute('admin.payment.gateway.view',['money-out','manual'])) active @endif">
                        <a href="{{ setRoute('admin.payment.gateway.view',['money-out','manual']) }}">
                            <i class="menu-icon las la-print"></i>
                            <span class="menu-title">{{ __("Money Out") }}</span>
                        </a>
                    </li>
                @endif

                {{-- Notifications --}}
                @include('admin.components.side-nav.link-group',[
                    'group_title'       => "Notification",
                    'group_links'       => [
                        'dropdown'      => [
                            [
                                'title'     => "Push Notification",
                                'icon'      => "menu-icon las la-bell",
                                'links'     => [
                                    [
                                        'title'     => "Setup Notification",
                                        'route'     => "admin.push.notification.config",
                                    ],
                                    [
                                        'title'     => "Send Notification",
                                        'route'     => "admin.push.notification.index",
                                    ]
                                ],
                            ]
                        ],

                    ]
                ])

                @php
                    $bonus_routes = [
                        'admin.cookie.index',
                        'admin.server.info.index',
                        'admin.cache.clear',
                    ];
                @endphp 

                @if (admin_permission_by_name_array($bonus_routes))   
                    <li class="sidebar-menu-header">{{ __("Bonus") }}</li>
                @endif

                @include('admin.components.side-nav.link',[
                    'route'     => 'admin.cookie.index',
                    'title'     => "GDPR Cookie",
                    'icon'      => "menu-icon las la-cookie-bite",
                ])

                @include('admin.components.side-nav.link',[
                    'route'     => 'admin.server.info.index',
                    'title'     => "Server Info",
                    'icon'      => "menu-icon las la-sitemap",
                ])

                @include('admin.components.side-nav.link',[
                    'route'     => 'admin.cache.clear',
                    'title'     => "Clear Cache",
                    'icon'      => "menu-icon las la-broom",
                ])
            </ul>
        </div>
    </div>
</div>
