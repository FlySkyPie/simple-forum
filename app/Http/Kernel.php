<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
        \App\Http\Middleware\TrustProxies::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            // \Illuminate\Session\Middleware\AuthenticateSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            'throttle:60,1',
            'bindings',
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \Illuminate\Auth\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'topic.title'   => \App\Http\Middleware\Forum\TopicTitle::class,
        'post.exist'    => \App\Http\Middleware\Forum\TopicExist::class,
        'post.message'  => \App\Http\Middleware\Forum\PostMessage::class,
        'post.title'    => \App\Http\Middleware\Forum\PostTitle::class,
        'post.owner'    =>  \App\Http\Middleware\Forum\PostOwner::class,
        'post.content'  => \App\Http\Middleware\Forum\PostContentFilter::class,
        'comment.content'   => \App\Http\Middleware\Forum\CommentContentFilter::class,
        'comment.message'   => \App\Http\Middleware\Forum\CommentMessage::class,
        'comment.owner' =>  \App\Http\Middleware\Forum\CommentOwner::class,
        'comment.exist' => \App\Http\Middleware\Forum\CommentExist::class,
        'reply.topic.exist' => \App\Http\Middleware\Forum\ReplyTopicExist::class,
    ];
}
