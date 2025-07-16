<?php

declare(strict_types=1);

namespace App\Model;

use App\Exception\InvalidCredentialsException;
use Carbon\Carbon;
use Hyperf\Collection\Collection;
use Hyperf\Database\Model\Builder;
use Hyperf\Database\Model\Relations\HasMany;
use Hyperf\DbConnection\Model\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $document
 * @property string $password
 * @property string $type
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Collection $cards
 * @property Collection $heldCards
 * @property Collection $transactions
 */
class User extends Model
{
    protected ?string $table = 'users';

    protected array $fillable = [
        'name',
        'email',
        'document',
        'password',
        'type',
    ];

    protected array $casts = [
        'id' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public static function findByEmail(string $email): Builder|User
    {
        $user = self::where('email', $email)->first();

        if (!$user) {
            throw new InvalidCredentialsException();
        }

        return $user;
    }
}
