<?php

declare(strict_types=1);

namespace App\Resource;

use App\Model\User;
use Hyperf\Resource\Json\JsonResource;

/**
 * @mixin User
 */
class UserResource extends JsonResource
{
	public function toArray(): array
	{
		return [
			'id' => $this->id,
			'name' => $this->name,
			'email' => $this->email,
			'document' => $this->document,
			'type' => $this->type,
		];
	}
}
