
    protected $middlewareAliases = [
        'auth'     => \App\Http\Middleware\Authenticate::class,
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,

        // custom admin
        'admin.auth' => \App\Http\Middleware\AdminAuth::class,
    ];
