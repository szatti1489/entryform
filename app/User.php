<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'surname', 'email', 'phone', 'birth', 'comments',
    ];
}

/*CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `firstname` varchar(128) NOT NULL,
  `surname` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `birth` date NOT NULL,
  `comments` varchar(2048) NOT NULL
  `created_at` timestamp NULL,
  `updated_at` timestamp NULL
) ENGINE='InnoDB';*/