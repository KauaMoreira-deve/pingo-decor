<?php

namespace App\Support;

/** Static examples for the administrative preview; no database writes. */
final class DemoContent
{
    /** @return array<string, mixed> */
    public static function section(string $name): array
    {
        $data = json_decode(file_get_contents(database_path('demo/admin.json')), true, 512, JSON_THROW_ON_ERROR);

        return $data[$name] ?? abort(404);
    }
}
