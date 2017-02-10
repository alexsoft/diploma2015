<?php

namespace App\Models;

use Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class Message extends BaseModel
{
    protected $table = 'messages';

    protected $fillable = ['from_id', 'to_id', 'message'];

    public function getMessageAttribute($message)
    {
        try {
            $decrypt = Crypt::decrypt($message);

            return $decrypt;
        } catch (DecryptException $e) {
            $this->delete();

            return 'Ошибка! Сообщение было повреждено, расшифровка невозможна. Сообщение будет удалено!';
        }
    }

    public function setMessageAttribute($value)
    {
        $this->attributes['message'] = Crypt::encrypt($value);
    }

    public function from()
    {
        return $this->belongsTo(User::class, 'from_id');
    }

    public function to()
    {
        return $this->belongsTo(User::class, 'to_id');
    }
}
